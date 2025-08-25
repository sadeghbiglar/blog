<?php

// app/Http/Controllers/Learn504Controller.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserProgress, Word, UserStageResult};

class Learn504Controller extends Controller
{
    // پیکربندی
    private const WORDS_PER_STAGE = 12;   // تعداد لغت هر مرحله
    private const TOTAL_STAGES    = 42;   // کل مراحل
    private const SPECIAL_EVERY   = 6;    // هر چند مرحله یک ویژه
    private const REVIEW_WINDOW   = 6;    // چند مرحله آخر برای ویژه (اینجا = SPECIAL_EVERY)

    // وضعیت فعلی کاربر + لغات مربوطه
    public function state(Request $request)
    {
        $user = $request->user();

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0, 'in_special' => false, 'last_completed_stage' => 0]
        );

        // اگر کل دوره تمام شده باشد (آخرین مرحله عادی انجام شده و ویژه‌ای در جریان نیست)
        if (!$progress->in_special
            && (int)$progress->last_completed_stage >= self::TOTAL_STAGES
            && (int)$progress->repeat_count === 0) {

            return response()->json([
                'type'         => 'completed',
                'label'        => '🎉 تبریک! تمام مراحل را به پایان رساندید.',
                'stage'        => (int)$progress->last_completed_stage,
                'repeat_count' => 0,
                'words'        => [],
            ]);
        }

        if ($progress->in_special) {
            $last  = max(1, (int) $progress->last_completed_stage);
            $start = max(1, $last - (self::REVIEW_WINDOW - 1)); // 6 مرحله آخر

            $words = Word::whereBetween('stage', [$start, $last])
                ->inRandomOrder()
                ->take(self::WORDS_PER_STAGE)
                ->get();

            return response()->json([
                'type'          => 'special',
                'label'         => "مرحله ویژه مرور $start تا $last",
                'stage'         => (int)$progress->current_stage,
                'review_range'  => [$start, $last],
                'repeat_count'  => (int)$progress->repeat_count,
                'words'         => $words,
            ]);
        } else {
            // مرحله عادی
            $stage = max(1, min((int)$progress->current_stage, self::TOTAL_STAGES));

            $words = Word::where('stage', $stage)
                ->take(self::WORDS_PER_STAGE) // اگر بیش از 12 عدد ثبت شده بود، محدود می‌کنیم
                ->get();

            return response()->json([
                'type'         => 'normal',
                'label'        => "مرحله $stage",
                'stage'        => $stage,
                'repeat_count' => (int)$progress->repeat_count,
                'words'        => $words,
            ]);
        }
    }

    // پایان یک «پاس» کامل از 12 لغت
    public function iterationComplete(Request $request)
    {
        $user = $request->user();
        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0, 'in_special' => false, 'last_completed_stage' => 0]
        );

        // افزایش شمارنده تکرار
        $progress->repeat_count = (int)$progress->repeat_count + 1;

        // اگر هنوز به 3 نرسیده -> همان مرحله تکرار شود
        if ($progress->repeat_count < 3) {
            $progress->save();
            return response()->json([
                'action'       => 'repeat',
                'repeat_count' => (int)$progress->repeat_count,
            ]);
        }

        // بار سوم هم کامل شد
        $progress->repeat_count = 0;

        if ($progress->in_special) {
            // اتمام مرحله ویژه
            UserStageResult::create([
                'user_id'         => $user->id,
                'stage_number'    => (int)$progress->last_completed_stage, // ویژه مرتبط با این بازه
                'is_special'      => true,
                'iteration_count' => 3,
                'success'         => true,
            ]);

            $progress->in_special = false;
            $progress->save();

            // اگر آخرین مرحله عادی قبلاً پایان یافته (42)، دوره تمام است
            if ((int)$progress->last_completed_stage >= self::TOTAL_STAGES) {
                return response()->json([
                    'action'  => 'course_completed',
                    'message' => '🎉 تبریک! مرحله ویژه‌ی پایانی هم تمام شد و کل دوره را به پایان رساندید.',
                ]);
            }

            return response()->json([
                'action'  => 'special_done',
                'message' => 'مرحله ویژه با موفقیت به پایان رسید. برو به مرحله عادی بعدی.',
            ]);
        }

        // اتمام یک مرحله عادی
        $completedStage = (int)$progress->current_stage;

        UserStageResult::create([
            'user_id'         => $user->id,
            'stage_number'    => $completedStage,
            'is_special'      => false,
            'iteration_count' => 3,
            'success'         => true,
        ]);

        // ثبت آخرین مرحله عادی تمام‌شده
        $progress->last_completed_stage = $completedStage;

        $isSpecialTrigger = ($completedStage % self::SPECIAL_EVERY === 0);

        // اگر این مرحله، مرحله‌ی آخر دوره است
        if ($completedStage >= self::TOTAL_STAGES) {
            // در انتهای بلوک (42) حتماً ویژه داریم چون مضرب 6 است؛ ویژه‌ی پایانی را فعال کن
            if ($isSpecialTrigger) {
                $progress->in_special    = true;
                $progress->current_stage = self::TOTAL_STAGES; // از 43 عبور نکن!
                $progress->save();

                return response()->json([
                    'action'  => 'special_next_final',
                    'message' => '🌟 مرحله ویژه‌ی پایانی فعال شد. 12 لغت تصادفی از 6 مرحله اخیر مرور می‌شود.',
                ]);
            }

            // اگر به‌هر دلیلی در آخرین مرحله ویژه نداشته باشیم، دوره را تمام‌شده اعلام کن
            $progress->current_stage = self::TOTAL_STAGES;
            $progress->save();

            return response()->json([
                'action'  => 'course_completed',
                'message' => '🎉 تبریک! کل دوره را به پایان رساندید.',
            ]);
        }

        // مراحل میانی
        if ($isSpecialTrigger) {
            // ویژه‌ی بین‌راهی
            $progress->in_special    = true;
            $progress->current_stage = min($completedStage + 1, self::TOTAL_STAGES);
            $progress->save();

            return response()->json([
                'action'     => 'special_next',
                'next_stage' => (int)$progress->current_stage, // بعد از ویژه
                'message'    => '🌟 مرحله ویژه فعال شد. 12 لغت تصادفی از 6 مرحله اخیر مرور می‌شود.',
            ]);
        }

        // رفتن به مرحله عادی بعد
        $progress->current_stage = min($completedStage + 1, self::TOTAL_STAGES);
        $progress->save();

        return response()->json([
            'action'     => 'stage_advanced',
            'next_stage' => (int)$progress->current_stage,
            'message'    => 'مرحله بعد آماده است.',
        ]);
    }
}
