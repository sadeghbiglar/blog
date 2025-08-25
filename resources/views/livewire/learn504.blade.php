<?php
// resources/views/livewire/learn504.blade.php (یا هرجایی که Volt::route به آن اشاره می‌کند)

use Livewire\Volt\Component;
use App\Models\UserProgress;
use App\Models\Word;

new class extends Component {
    public array $initialState = [];

    public function mount() {
        $user = auth()->user();
        // در mount کامپوننت Volt مربوط به صفحه learn504
$TOTAL_STAGES = 42;


        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0, 'in_special' => false, 'last_completed_stage' => 0]
        );
if (!$progress->in_special && (int)$progress->last_completed_stage >= $TOTAL_STAGES && (int)$progress->repeat_count === 0) {
    $this->initialState = [
        'type'         => 'completed',
        'label'        => '🎉 تبریک! تمام مراحل را به پایان رساندید.',
        'stage'        => (int)$progress->last_completed_stage,
        'repeat_count' => 0,
        'words'        => [],
    ];
    return;
}

        if ($progress->in_special) {
            $last = max(1, (int) $progress->last_completed_stage);
            $start = max(1, $last - 4);
            $words = Word::whereBetween('stage', [$start, $last])->inRandomOrder()->take(10)->get();

            $this->initialState = [
                'type'         => 'special',
                'label'        => "مرحله ویژه مرور $start تا $last",
                'stage'        => (int) $progress->current_stage,
                'repeat_count' => (int) $progress->repeat_count,
                'words'        => $words->toArray(),
            ];
        } else {
            $stage = max(1, (int) $progress->current_stage);
            $words = Word::where('stage', $stage)->get();

            $this->initialState = [
                'type'         => 'normal',
                'label'        => "مرحله $stage",
                'stage'        => $stage,
                'repeat_count' => (int) $progress->repeat_count,
                'words'        => $words->toArray(),
            ];
        }
    }
};
?>

<div class="max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">آموزش 504 لغت</h1>

    <!-- Vue mount point -->
    <div id="vue-words">
        <word-cards :initial-state='@json($initialState)'></word-cards>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</div>
