<x-layouts.app :title="__('Dashboard')">
    <!-- Chart.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    
    <div class="min-h-screen bg-[#FAF7F3] grain-texture">
        <!-- Header -->
        <div class="bg-white/50 shadow-sm border-b border-[#E8C4A0]">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-[#8B6F47]">Selamat datang kembali, {{ auth()->user()->name }}!</h1>
                        <p class="text-[#7A8471]">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/history" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                            📊 Riwayat
                        </a>
                        <a href="/settings/profile" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                            ⚙️ Pengaturan
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                                🚪 Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">
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
                            {{ $todaysMood ? \App\Models\MoodEntry::getMoodOptions()[$todaysMood->mood] : '🤔' }}
                        </div>
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

            <!-- Charts Section -->
            <div class="grid lg:grid-cols-2 gap-8 mb-8">
                <!-- Pie Chart - Mood Distribution -->
                <div class="bg-white/70 rounded-2xl p-6 shadow-lg border border-[#E8C4A0]">
                    <h3 class="text-xl font-bold text-[#8B6F47] mb-4 text-center">Distribusi Mood</h3>
                    <div class="flex justify-center">
                        <div style="width: 300px; height: 300px;">
                            <canvas id="moodPieChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart - Weekly Mood -->
                <div class="bg-white/70 rounded-2xl p-6 shadow-lg border border-[#E8C4A0]">
                    <h3 class="text-xl font-bold text-[#8B6F47] mb-4 text-center">Mood 7 Hari Terakhir</h3>
                    <div style="height: 300px;">
                        <canvas id="weeklyMoodChart"></canvas>
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
                                    {{ \App\Models\MoodEntry::getMoodOptions()[$todaysMood->mood] }}
                                </div>
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
                                        {{ \App\Models\MoodEntry::getMoodOptions()[$entry['data']->mood] }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-[#8B6F47]">Mood: {{ $entry['data']->mood }}</div>
                                        <div class="text-sm text-[#7A8471]">
                                            {{ $entry['data']->entry_date->format('d M Y') }}
                                        </div>
                                        @if ($entry['data']->cause)
                                            <div class="text-sm text-[#7A8471] italic">
                                                "{{ \Illuminate\Support\Str::limit($entry['data']->cause, 60) }}"
                                            </div>
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

    <!-- Data Processing and Charts -->
    @php
        // Data untuk Pie Chart - distribusi mood keseluruhan
        $moodCounts = auth()->user()->moodEntries()
            ->selectRaw('mood, COUNT(*) as count')
            ->groupBy('mood')
            ->pluck('count', 'mood')
            ->toArray();
        
        // Gunakan mood options dari model yang sebenarnya
        $allMoods = array_keys(\App\Models\MoodEntry::getMoodOptions());
        $moodData = [];
        foreach ($allMoods as $mood) {
            $moodData[$mood] = $moodCounts[$mood] ?? 0;
        }

        // Data untuk Bar Chart - mood 7 hari terakhir
        $weeklyData = auth()->user()->moodEntries()
            ->where('entry_date', '>=', now()->subDays(7))
            ->selectRaw('DATE(entry_date) as date, mood, COUNT(*) as count')
            ->groupBy('date', 'mood')
            ->orderBy('date')
            ->get();
        
        // Organize data untuk 7 hari terakhir
        $days = [];
        $moodTypes = array_keys(\App\Models\MoodEntry::getMoodOptions());
        
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dayName = now()->subDays($i)->format('M d');
            
            $days[$dayName] = [];
            foreach ($moodTypes as $mood) {
                $days[$dayName][$mood] = $weeklyData
                    ->where('date', $date)
                    ->where('mood', $mood)
                    ->sum('count');
            }
        }
    @endphp

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data dari PHP
        const moodData = @json($moodData);
        const weeklyMoodData = @json($days);

        // Pie Chart Configuration
        const pieCtx = document.getElementById('moodPieChart');
        if (pieCtx) {
            const moodPieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: Object.keys(moodData),
                    datasets: [{
                        data: Object.values(moodData),
                        backgroundColor: [
                            '#22C55E', // Happy - Green
                            '#EF4444', // Sad - Red
                            '#F97316', // Anxious - Orange
                            '#84CC16', // Calm - Light Green
                            '#FACC15', // Energetic - Yellow
                            '#DC2626', // Angry - Dark Red
                            '#9333EA', // Stressed - Purple
                            '#10B981'  // Grateful - Emerald
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#8B6F47',
                                font: {
                                    size: 12
                                },
                                padding: 15
                            }
                        }
                    }
                }
            });
        }

        // Bar Chart Configuration
        const barCtx = document.getElementById('weeklyMoodChart');
        if (barCtx) {
            const weeklyMoodChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(weeklyMoodData),
                    datasets: [
                        {
                            label: 'Very Happy',
                            data: Object.values(weeklyMoodData).map(day => day['Very Happy'] || 0),
                            backgroundColor: '#22C55E'
                        },
                        {
                            label: 'Happy',
                            data: Object.values(weeklyMoodData).map(day => day['Happy'] || 0),
                            backgroundColor: '#84CC16'
                        },
                        {
                            label: 'Neutral',
                            data: Object.values(weeklyMoodData).map(day => day['Neutral'] || 0),
                            backgroundColor: '#EAB308'
                        },
                        {
                            label: 'Sad',
                            data: Object.values(weeklyMoodData).map(day => day['Sad'] || 0),
                            backgroundColor: '#F97316'
                        },
                        {
                            label: 'Very Sad',
                            data: Object.values(weeklyMoodData).map(day => day['Very Sad'] || 0),
                            backgroundColor: '#EF4444'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: '#8B6F47',
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            ticks: {
                                color: '#8B6F47'
                            }
                        },
                        y: {
                            stacked: true,
                            ticks: {
                                color: '#8B6F47'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
    </script>
</x-layouts.app>