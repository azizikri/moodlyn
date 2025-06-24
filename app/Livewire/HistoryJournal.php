<?php

namespace App\Livewire;

use App\Models\MoodEntry;
use App\Models\JournalEntry;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryJournal extends Component
{
    use WithPagination;

    public $filterMonth = '';
    public $filterYear = '';
    public $selectedEntry = null;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->filterMonth = now()->format('m');
        $this->filterYear = now()->format('Y');
    }

    public function updatingFilterMonth()
    {
        $this->resetPage();
    }

    public function updatingFilterYear()
    {
        $this->resetPage();
    }

    public function getEntriesProperty()
    {
        $query = collect();

        // Get mood entries
        $moodEntries = MoodEntry::where('user_id', auth()->id())
            ->when($this->filterMonth, function ($q) {
                return $q->whereMonth('entry_date', $this->filterMonth);
            })
            ->when($this->filterYear, function ($q) {
                return $q->whereYear('entry_date', $this->filterYear);
            })
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'type' => 'mood',
                    'date' => $entry->entry_date,
                    'mood' => $entry->mood,
                    'cause' => $entry->cause,
                    'content' => null,
                    'created_at' => $entry->created_at,
                ];
            });

        // Get journal entries
        $journalEntries = JournalEntry::where('user_id', auth()->id())
            ->when($this->filterMonth, function ($q) {
                return $q->whereMonth('entry_date', $this->filterMonth);
            })
            ->when($this->filterYear, function ($q) {
                return $q->whereYear('entry_date', $this->filterYear);
            })
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'type' => 'journal',
                    'date' => $entry->entry_date,
                    'mood' => null,
                    'cause' => null,
                    'content' => \Illuminate\Support\Str::limit(strip_tags($entry->content), 150),
                    'full_content' => $entry->content,
                    'created_at' => $entry->created_at,
                ];
            });

        // Combine and sort by date
        return $query->concat($moodEntries)
            ->concat($journalEntries)
            ->sortByDesc(function ($item) {
                return $item['date'];
            })
            ->values();
    }

    public function getMoodEmoji($mood)
    {
        $moodOptions = MoodEntry::getMoodOptions();
        return $moodOptions[$mood] ?? '😊';
    }

    public function getMonthName($month)
    {
        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        return $months[$month] ?? '';
    }

    public function render()
    {
        return view('livewire.history-journal', [
            'entries' => $this->entries,
        ]);
    }
}
