<?php

namespace App\Livewire;

use App\Models\JournalEntry as JournalEntryModel;
use App\Models\MotivationalQuote;
use Carbon\Carbon;
use Livewire\Component;

class JournalEntry extends Component
{
    public $content = '';
    public $showQuote = false;
    public $motivationalQuote = null;
    public $hasSubmittedToday = false;
    public $todaysJournal = null;

    public function mount()
    {
        $this->checkTodaysEntry();
    }

    public function checkTodaysEntry()
    {
        $today = Carbon::today();
        $this->todaysJournal = JournalEntryModel::where('user_id', auth()->id())
            ->whereDate('entry_date', $today)
            ->first();

        $this->hasSubmittedToday = ! is_null($this->todaysJournal);

        if ($this->hasSubmittedToday) {
            $this->content = $this->todaysJournal->content;
        }
    }

    public function saveJournal()
    {
        $this->validate([
            'content' => 'required|string|min:10',
        ], [
            'content.required' => 'Konten jurnal tidak boleh kosong.',
            'content.min' => 'Jurnal harus memiliki minimal 10 karakter.',
        ]);

        if ($this->hasSubmittedToday) {
            // Update existing entry
            $this->todaysJournal->update([
                'content' => $this->content,
            ]);

            session()->flash('success', 'Jurnal berhasil diperbarui!');
        } else {
            // Create new entry
            try {
                JournalEntryModel::create([
                    'user_id' => auth()->id(),
                    'content' => $this->content,
                    'entry_date' => Carbon::today(),
                ]);

                // Get motivational quote
                $this->motivationalQuote = MotivationalQuote::getRandomQuote();
                $this->showQuote = true;
                $this->hasSubmittedToday = true;

                session()->flash('success', 'Jurnal berhasil disimpan!');

                // Refresh today's entry
                $this->checkTodaysEntry();

            } catch (\Exception $e) {
                session()->flash('error', 'Terjadi kesalahan saat menyimpan jurnal.');
            }
        }
    }

    public function closeQuote()
    {
        $this->showQuote = false;
    }

    public function render()
    {
        return view('livewire.journal-entry');
    }
}
