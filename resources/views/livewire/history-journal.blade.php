<div class="bg-white/50 grain-texture rounded-2xl p-8 shadow-lg max-w-6xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-[#8B6F47] mb-3">Riwayat Jurnal & Mood</h2>
        <p class="text-[#7A8471] text-lg">Lihat kembali perjalanan emosi dan refleksi Anda.</p>
    </div>

    <!-- Filters -->
    <div class="mb-8 flex flex-wrap items-center gap-4 justify-center">
        <div class="flex items-center space-x-2">
            <label for="filter-month" class="text-[#8B6F47] font-medium">Bulan:</label>
            <select wire:model.live="filterMonth" id="filter-month"
                class="p-2 border-2 border-[#E8C4A0] rounded-lg focus:border-[#B5936B] focus:outline-none">
                <option value="">Semua Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>

        <div class="flex items-center space-x-2">
            <label for="filter-year" class="text-[#8B6F47] font-medium">Tahun:</label>
            <select wire:model.live="filterYear" id="filter-year"
                class="p-2 border-2 border-[#E8C4A0] rounded-lg focus:border-[#B5936B] focus:outline-none">
                <option value="">Semua Tahun</option>
                @for ($year = now()->year; $year >= now()->year - 5; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>

        @if ($filterMonth || $filterYear)
            <button wire:click="$set('filterMonth', ''); $set('filterYear', '')"
                class="px-4 py-2 text-sm bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                Reset Filter
            </button>
        @endif
    </div>

    <!-- Entries List -->
    <div class="space-y-6" wire:loading.class="opacity-50" wire:target="filterMonth,filterYear">
        <div wire:loading wire:target="filterMonth,filterYear" class="text-center py-4">
            <div
                class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-[#8B6F47] bg-white/70 transition ease-in-out duration-150">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-[#8B6F47]" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Memuat data...
            </div>
        </div>
        @forelse ($entries as $entry)
            <div class="bg-white/70 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-[#E8C4A0]">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <!-- Entry Header -->
                        <div class="flex items-center mb-3">
                            @if ($entry['type'] === 'mood')
                                <div class="text-2xl mr-3">{{ $this->getMoodEmoji($entry['mood']) }}</div>
                                <div>
                                    <h3 class="text-lg font-semibold text-[#8B6F47]">Mood: {{ $entry['mood'] }}</h3>
                                    <p class="text-sm text-[#B5936B]">
                                        {{ \Carbon\Carbon::parse($entry['date'])->translatedFormat('l, d F Y') }}</p>
                                </div>
                            @else
                                <div class="text-2xl mr-3">📝</div>
                                <div>
                                    <h3 class="text-lg font-semibold text-[#8B6F47]">Jurnal Harian</h3>
                                    <p class="text-sm text-[#B5936B]">
                                        {{ \Carbon\Carbon::parse($entry['date'])->translatedFormat('l, d F Y') }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Entry Content -->
                        @if ($entry['type'] === 'mood' && $entry['cause'])
                            <p class="text-[#7A8471] italic mb-3">"{{ $entry['cause'] }}"</p>
                        @elseif ($entry['type'] === 'journal')
                            <p class="text-[#7A8471] leading-relaxed mb-3">{{ $entry['content'] }}</p>
                        @endif

                        <!-- Entry Actions -->
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-[#B5936B]">
                                Dibuat {{ \Carbon\Carbon::parse($entry['created_at'])->diffForHumans() }}
                            </span>
                            @if ($entry['type'] === 'journal')
                                <a href="/journal-detail/{{ $entry['id'] }}"
                                    class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
                                    Baca Selengkapnya →
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📝</div>
                <h3 class="text-xl font-semibold text-[#8B6F47] mb-2">Belum Ada Entri</h3>
                <p class="text-[#7A8471] mb-6">
                    @if ($filterMonth || $filterYear)
                        Tidak ada entri untuk periode yang dipilih.
                    @else
                        Mulai perjalanan self-care Anda dengan mencatat mood atau menulis jurnal.
                    @endif
                </p>
                <div class="flex items-center justify-center space-x-4">
                    <a href="/dashboard"
                        class="px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                        Catat Mood Hari Ini
                    </a>
                    <a href="/journal"
                        class="px-6 py-3 border-2 border-[#B5936B] text-[#B5936B] hover:bg-[#B5936B] hover:text-white rounded-lg font-medium transition-colors">
                        Tulis Jurnal
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    @if (count($entries) > 0)
        <!-- Stats -->
        <div class="mt-12 grid md:grid-cols-3 gap-6">
            <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
                <div class="text-3xl font-bold text-[#8B6F47] mb-2">{{ count($entries) }}</div>
                <p class="text-[#7A8471]">Total Entri</p>
            </div>
            <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
                <div class="text-3xl font-bold text-[#8B6F47] mb-2">{{ $entries->where('type', 'mood')->count() }}
                </div>
                <p class="text-[#7A8471]">Catatan Mood</p>
            </div>
            <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
                <div class="text-3xl font-bold text-[#8B6F47] mb-2">{{ $entries->where('type', 'journal')->count() }}
                </div>
                <p class="text-[#7A8471]">Entri Jurnal</p>
            </div>
        </div>
    @endif
</div>
