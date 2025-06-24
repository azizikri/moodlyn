<div class="bg-white/50 grain-texture rounded-2xl p-8 shadow-lg max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-[#8B6F47] mb-2">Detail Jurnal</h2>
            <p class="text-[#B5936B]">{{ $journalEntry->entry_date->translatedFormat('l, d F Y') }}</p>
        </div>
        <a href="/history" class="flex items-center text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors">
            ← Kembali ke Riwayat
        </a>
    </div>

    <!-- Journal Content -->
    <div class="bg-white/70 rounded-xl p-8 shadow-sm border border-[#E8C4A0]">
        <div class="flex items-center mb-6">
            <div class="text-3xl mr-4">📝</div>
            <div>
                <h3 class="text-xl font-semibold text-[#8B6F47]">Jurnal Harian</h3>
                <p class="text-sm text-[#B5936B]">
                    Ditulis pada {{ $journalEntry->created_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>
        </div>

        <div class="prose max-w-none">
            <div class="text-[#4A453E] leading-relaxed text-lg">
                {!! nl2br(e($journalEntry->content)) !!}
            </div>
        </div>
    </div>

    <!-- Journal Stats -->
    <div class="mt-8 grid md:grid-cols-3 gap-6">
        <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
            <div class="text-2xl font-bold text-[#8B6F47] mb-2">{{ str_word_count(strip_tags($journalEntry->content)) }}
            </div>
            <p class="text-[#7A8471] text-sm">Jumlah Kata</p>
        </div>
        <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
            <div class="text-2xl font-bold text-[#8B6F47] mb-2">{{ strlen(strip_tags($journalEntry->content)) }}</div>
            <p class="text-[#7A8471] text-sm">Jumlah Karakter</p>
        </div>
        <div class="text-center p-6 bg-[#F7E7D3] rounded-xl">
            <div class="text-2xl font-bold text-[#8B6F47] mb-2">{{ $journalEntry->created_at->diffForHumans() }}</div>
            <p class="text-[#7A8471] text-sm">Waktu Penulisan</p>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-8 text-center space-x-4">
        <a href="/journal"
            class="inline-block px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
            Tulis Jurnal Baru
        </a>
        <a href="/history"
            class="inline-block px-6 py-3 border-2 border-[#B5936B] text-[#B5936B] hover:bg-[#B5936B] hover:text-white rounded-lg font-medium transition-colors">
            Lihat Riwayat Lainnya
        </a>
    </div>
</div>
