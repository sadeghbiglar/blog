<?php

use Livewire\Volt\Component;
use App\Models\Word;
use App\Models\UserProgress;

new class extends Component {
    public $words = [];
    public $stage;
    public $repeat;

    public function mount()
    {
        $user = auth()->user();

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id],
            ['current_stage' => 1, 'repeat_count' => 0]
        );

        $this->stage = $progress->current_stage;
        $this->repeat = $progress->repeat_count;

        // هر مرحله ۱۰ لغت
        $offset = ($this->stage - 1) * 10;

        $this->words = Word::skip($offset)->take(10)->get();
    }
};
?>

<div>
    <h1 class="text-2xl font-bold mb-4">مرحله {{ $stage }} از یادگیری لغات</h1>

    <div id="vue-words">
        <word-cards :words="{{ json_encode($words) }}"></word-cards>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</div>
