<?php

// app/Http/Controllers/Learn504Controller.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserProgress, Word, UserStageResult};

class Learn504Controller extends Controller
{
    // وضعیت فعلی کاربر + 10 لغت مربوطه
    public function state(Request $request)
    {
        $user = $request->user();

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0, 'in_special' => false, 'last_completed_stage' => 0]
        );

        if ($progress->in_special) {
            $last = max(1, (int) $progress->last_completed_stage);
            $start = max(1, $last - 4); // بازه‌ی 5 مرحله‌ی آخر

            $words = Word::whereBetween('stage', [$start, $last])
                ->inRandomOrder()
                ->take(10)
                ->get();

            return response()->json([
                'type'          => 'special',
                'label'         => "مرحله ویژه مرور $start تا $last",
                'stage'         => $progress->current_stage, // مرحله عادی بعدی که در انتظار است
                'review_range'  => [$start, $last],
                'repeat_count'  => (int) $progress->repeat_count,
                'words'         => $words,
            ]);
        } else {
            $stage = max(1, (int) $progress->current_stage);

            // توصیه: در جدول words برای هر stage دقیقا 10 کلمه داشته باشیم.
            $words = Word::where('stage', $stage)->get();

            return response()->json([
                'type'         => 'normal',
                'label'        => "مرحله $stage",
                'stage'        => $stage,
                'repeat_count' => (int) $progress->repeat_count,
                'words'        => $words,
            ]);
        }
    }

    // پایان یک «بار گذر» از کل 10 لغت (یعنی کاربر یک دور همه را زد)
    public function iterationComplete(Request $request)
    {
        $user = $request->user();
        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0, 'in_special' => false, 'last_completed_stage' => 0]
        );

        // افزایش شمارنده تکرار
        $progress->repeat_count = (int) $progress->repeat_count + 1;

        // اگر هنوز به 3 نرسیده، فقط تکرار ادامه دارد
        if ($progress->repeat_count < 3) {
            $progress->save();
            return response()->json([
                'action'        => 'repeat',   // دوباره همین مرحله را تکرار کن
                'repeat_count'  => (int) $progress->repeat_count,
            ]);
        }

        // اینجا یعنی بار سوم هم کامل شد => مرحله با موفقیت به اتمام رسید
        $progress->repeat_count = 0;

        if ($progress->in_special) {
            // اتمام مرحله ویژه
            UserStageResult::create([
                'user_id'        => $user->id,
                'stage_number'   => (int) $progress->last_completed_stage, // ویژه مربوط به این بازه
                'is_special'     => true,
                'iteration_count'=> 3,
                'success'        => true,
            ]);

            $progress->in_special = false;
            $progress->save();

            return response()->json([
                'action' => 'special_done',
                'message'=> 'مرحله ویژه با موفقیت به پایان رسید. برو به مرحله عادی بعدی.',
            ]);
        } else {
            // اتمام یک مرحله عادی
            $completedStage = (int) $progress->current_stage;

            UserStageResult::create([
                'user_id'        => $user->id,
                'stage_number'   => $completedStage,
                'is_special'     => false,
                'iteration_count'=> 3,
                'success'        => true,
            ]);

            // آماده‌سازی برای مرحله بعد
            $progress->last_completed_stage = $completedStage;
            $progress->current_stage = $completedStage + 1;

            // اگر مضرب 5 بود، مرحله ویژه فعال شود
            if ($completedStage % 5 === 0) {
                $progress->in_special = true;
                $progress->save();

                return response()->json([
                    'action' => 'special_next', // اول باید مرحله ویژه انجام شود
                    'next_stage' => (int) $progress->current_stage, // بعد از ویژه
                    'message'=> 'مرحله ویژه فعال شد. 10 لغت تصادفی از 5 مرحله اخیر مرور می‌شود.',
                ]);
            }

            $progress->save();

            return response()->json([
                'action' => 'stage_advanced',
                'next_stage' => (int) $progress->current_stage,
                'message' => 'مرحله بعد آماده است.',
            ]);
        }
    }
}
