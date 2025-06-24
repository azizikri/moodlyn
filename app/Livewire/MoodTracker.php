<?php

namespace App\Livewire;

use App\Models\MoodEntry;
use App\Models\MotivationalQuote;
use Carbon\Carbon;
use Livewire\Component;

class MoodTracker extends Component
{
    public $selectedMood = '';
    public $cause = '';
    public $showQuote = false;
    public $motivationalQuote = null;
    public $hasSubmittedToday = false;
    public $todaysMood = null;

    public function mount()
    {
        $this->checkTodaysEntry();
    }

    public function checkTodaysEntry()
    {
        $today = Carbon::today();
        $this->todaysMood = MoodEntry::where('user_id', auth()->id())
            ->whereDate('entry_date', $today)
            ->first();

        $this->hasSubmittedToday = ! is_null($this->todaysMood);

        if ($this->hasSubmittedToday) {
            $this->selectedMood = $this->todaysMood->mood;
            $this->cause = $this->todaysMood->cause ?? '';
        }
    }

    public function selectMood($mood)
    {
        if (! $this->hasSubmittedToday) {
            $this->selectedMood = $mood;
        }
    }

    public function submitMood()
    {
        $this->validate([
            'selectedMood' => 'required|string',
            'cause' => 'nullable|string|max:500',
        ]);

        if ($this->hasSubmittedToday) {
            session()->flash('error', 'Anda sudah mencatat mood hari ini.');
            return;
        }

        try {
            MoodEntry::create([
                'user_id' => auth()->id(),
                'mood' => $this->selectedMood,
                'cause' => $this->cause,
                'entry_date' => Carbon::today(),
            ]);

            // Get motivational quote
            $this->motivationalQuote = MotivationalQuote::getRandomQuote();
            $this->showQuote = true;
            $this->hasSubmittedToday = true;

            session()->flash('success', 'Mood berhasil dicatat!');

            // Refresh today's entry
            $this->checkTodaysEntry();

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan mood.');
        }
    }

    public function closeQuote()
    {
        $this->showQuote = false;
    }

    public function getMoodOptions()
    {
        return MoodEntry::getMoodOptions();
    }

    public function render()
    {
        return view('livewire.mood-tracker', [
            'moodOptions' => $this->getMoodOptions(),
        ]);
    }
}
