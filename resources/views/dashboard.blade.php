<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen bg-[#FAF7F3] grain-texture">
        <!-- Header -->
        <div class="bg-white/50 shadow-sm border-b border-[#E8C4A0]">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-[#8B6F47]">Selamat datang kembali, {{ auth()->user()->name }}!
                        </h1>
                        <p class="text-[#7A8471]">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/history" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                            📊 Riwayat
                        </a>
                        <a href="/settings/profile"
                            class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                            ⚙️ Pengaturan
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                                🚪 Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            {{-- random quote --}}
            <div class="grid md:grid-cols-1 mb-8">
                @php
                    $randomQuote = \App\Models\MotivationalQuote::getRandomQuote();
                @endphp
                <div class="bg-white/70 rounded-2xl p-6 shadow-lg border border-[#E8C4A0] text-center">
                    <div class="text-5xl mb-4">✨</div>
                    <h3 class="text-2xl font-bold text-[#8B6F47] mb-2">Quote of the day</h3>
                    <blockquote class="text-lg text-[#7A8471] mb-4 leading-relaxed italic">
                        "{{ $randomQuote->quote }}"
                    </blockquote>
                    @if ($randomQuote->author)
                        <p class="text-[#B5936B] font-medium mb-6">— {{ $randomQuote->author }}</p>
                    @endif
                </div>
            </div>
            <!-- Quick Stats -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                @php
                    $todaysMood = auth()->user()->getTodaysMoodEntry();
                    $todaysJournal = auth()->user()->getTodaysJournalEntry();
                    $totalEntries = auth()->user()->moodEntries->count() + auth()->user()->journalEntries->count();
                @endphp

                <div class="bg-white/70 rounded-2xl p-6 shadow-sm border border-[#E8C4A0]">
                    <div class="text-center">
                        <div class="text-3xl mb-2">📊</div>
                        <div class="text-2xl font-bold text-[#8B6F47] mb-1">{{ $totalEntries }}</div>
                        <p class="text-[#7A8471] text-sm">Total Entri</p>
                    </div>
                </div>

                <div class="bg-white/70 rounded-2xl p-6 shadow-sm border border-[#E8C4A0]">
                    <div class="text-center">
                        <div class="text-3xl mb-2">
                            {{ $todaysMood ? \App\Models\MoodEntry::getMoodOptions()[$todaysMood->mood] : '🤔' }}</div>
                        <div class="text-lg font-semibold text-[#8B6F47] mb-1">
                            {{ $todaysMood ? $todaysMood->mood : 'Belum Dicatat' }}
                        </div>
                        <p class="text-[#7A8471] text-sm">Mood Hari Ini</p>
                    </div>
                </div>

                <div class="bg-white/70 rounded-2xl p-6 shadow-sm border border-[#E8C4A0]">
                    <div class="text-center">
                        <div class="text-3xl mb-2">{{ $todaysJournal ? '✅' : '📝' }}</div>
                        <div class="text-lg font-semibold text-[#8B6F47] mb-1">
                            {{ $todaysJournal ? 'Sudah Menulis' : 'Belum Menulis' }}
                        </div>
                        <p class="text-[#7A8471] text-sm">Jurnal Hari Ini</p>
                    </div>
                </div>
            </div>

            <!-- Main Actions -->
            <div class="grid lg:grid-cols-2 gap-8 mb-8">
                <!-- Mood Tracker Card -->
                <div class="bg-white/70 rounded-2xl p-8 shadow-lg border border-[#E8C4A0]">
                    <div class="text-center mb-6">
                        <div class="text-5xl mb-4">😊</div>
                        <h3 class="text-2xl font-bold text-[#8B6F47] mb-2">Pelacakan Mood</h3>
                        <p class="text-[#7A8471] mb-4">
                            {{ $todaysMood ? 'Anda sudah mencatat mood hari ini' : 'Bagaimana perasaan Anda hari ini?' }}
                        </p>
                        @if ($todaysMood)
                            <div class="mb-4 p-4 bg-[#F7E7D3] rounded-lg">
                                <div class="text-3xl mb-2">
                                    {{ \App\Models\MoodEntry::getMoodOptions()[$todaysMood->mood] }}</div>
                                <div class="font-semibold text-[#8B6F47]">{{ $todaysMood->mood }}</div>
                                @if ($todaysMood->cause)
                                    <p class="text-sm text-[#7A8471] italic mt-2">"{{ $todaysMood->cause }}"</p>
                                @endif
                            </div>
                        @endif
                        <a href="/mood-tracker"
                            class="inline-block px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                            {{ $todaysMood ? 'Lihat Detail' : 'Catat Mood' }}
                        </a>
                    </div>
                </div>

                <!-- Journal Card -->
                <div class="bg-white/70 rounded-2xl p-8 shadow-lg border border-[#E8C4A0]">
                    <div class="text-center mb-6">
                        <div class="text-5xl mb-4">📝</div>
                        <h3 class="text-2xl font-bold text-[#8B6F47] mb-2">Jurnal Harian</h3>
                        <p class="text-[#7A8471] mb-4">
                            {{ $todaysJournal ? 'Anda sudah menulis jurnal hari ini' : 'Ekspresikan pikiran dan perasaan Anda' }}
                        </p>
                        @if ($todaysJournal)
                            <div class="mb-4 p-4 bg-[#F7E7D3] rounded-lg text-left">
                                <p class="text-[#7A8471] leading-relaxed">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($todaysJournal->content), 100) }}
                                </p>
                            </div>
                        @endif
                        <a href="/journal"
                            class="inline-block px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                            {{ $todaysJournal ? 'Edit Jurnal' : 'Tulis Jurnal' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Entries -->
            <div class="bg-white/70 rounded-2xl p-8 shadow-lg border border-[#E8C4A0]">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-[#8B6F47]">Entri Terbaru</h3>
                    <a href="/history" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                        Lihat Semua →
                    </a>
                </div>

                @php
                    $recentMoods = auth()->user()->moodEntries()->latest()->take(3)->get();
                    $recentJournals = auth()->user()->journalEntries()->latest()->take(3)->get();
                    $recentEntries = collect(
                        $recentMoods
                            ->map(function ($mood) {
                                return ['type' => 'mood', 'data' => $mood, 'date' => $mood->entry_date];
                            })
                            ->concat(
                                $recentJournals->map(function ($journal) {
                                    return ['type' => 'journal', 'data' => $journal, 'date' => $journal->entry_date];
                                }),
                            ),
                    )
                        ->sortByDesc('date')
                        ->take(5);
                @endphp

                @if ($recentEntries->count() > 0)
                    <div class="space-y-4">
                        @foreach ($recentEntries as $entry)
                            <div class="flex items-center p-4 bg-[#F7E7D3] rounded-lg">
                                @if ($entry['type'] === 'mood')
                                    <div class="text-2xl mr-4">
                                        {{ \App\Models\MoodEntry::getMoodOptions()[$entry['data']->mood] }}</div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-[#8B6F47]">Mood: {{ $entry['data']->mood }}
                                        </div>
                                        <div class="text-sm text-[#7A8471]">
                                            {{ $entry['data']->entry_date->format('d M Y') }}
                                        </div>
                                        @if ($entry['data']->cause)
                                            <div class="text-sm text-[#7A8471] italic">
                                                "{{ \Illuminate\Support\Str::limit($entry['data']->cause, 60) }}"</div>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-2xl mr-4">📝</div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-[#8B6F47]">Jurnal Harian</div>
                                        <div class="text-sm text-[#7A8471]">
                                            {{ $entry['data']->entry_date->format('d M Y') }}
                                        </div>
                                        <div class="text-sm text-[#7A8471]">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($entry['data']->content), 80) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="text-4xl mb-4">📖</div>
                        <h4 class="text-lg font-semibold text-[#8B6F47] mb-2">Belum Ada Entri</h4>
                        <p class="text-[#7A8471] mb-4">Mulai perjalanan self-care Anda hari ini!</p>
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="/mood-tracker"
                                class="inline-block px-4 py-2 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                                Catat Mood
                            </a>
                            <a href="/journal"
                                class="inline-block px-4 py-2 border-2 border-[#B5936B] text-[#B5936B] hover:bg-[#B5936B] hover:text-white rounded-lg font-medium transition-colors">
                                Tulis Jurnal
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
