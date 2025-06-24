<?php

namespace App\Livewire;

use App\Models\JournalEntry;
use Livewire\Component;

class JournalDetail extends Component
{
    public $journalEntry;

    public function mount($id)
    {
        $this->journalEntry = JournalEntry::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.journal-detail');
    }
}
