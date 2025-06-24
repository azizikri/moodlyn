<div class="bg-white/50 grain-texture rounded-2xl p-8 shadow-lg max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-[#8B6F47] mb-3">Jurnal Harian</h2>
        <p class="text-[#7A8471] text-lg">Ekspresikan pikiran dan perasaan Anda dalam ruang yang aman dan privat.</p>
        <p class="text-sm text-[#B5936B] mt-2">{{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}</p>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Journal Content -->
    <div class="mb-8">
        <!-- Simple Text Editor -->
        <div class="mb-4">
            <label for="journal-content" class="block text-[#8B6F47] font-medium mb-2">
                Apa yang ada di pikiran Anda hari ini?
            </label>

            <textarea wire:model="content" id="journal-content" rows="12"
                class="w-full p-4 border-2 border-[#E8C4A0] rounded-lg focus:border-[#B5936B] focus:outline-none resize-none prose max-w-none"
                placeholder="Mulai menulis jurnal Anda di sini... Anda dapat menggunakan format seperti:

**Teks Tebal** untuk menekankan sesuatu
*Teks Miring* untuk penekanan lembut
- Gunakan dash untuk daftar
1. Atau angka untuk daftar berurutan

Ceritakan tentang hari Anda, perasaan Anda, atau apapun yang ingin Anda ekspresikan..."
                style="font-family: inherit; line-height: 1.6; color: #4A453E;"></textarea>
        </div>

        <!-- Save Button -->
        <div class="text-center">
            <button wire:click="saveJournal"
                class="px-8 py-4 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-xl font-semibold text-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                {{ $hasSubmittedToday ? 'Perbarui Jurnal' : 'Simpan Jurnal' }}
            </button>
        </div>
    </div>

    <!-- Motivational Quote Modal -->
    @if ($showQuote && $motivationalQuote)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl p-8 max-w-lg w-full mx-4 text-center grain-texture shadow-2xl">
                <div class="text-5xl mb-4">📝</div>
                <h3 class="text-2xl font-bold text-[#8B6F47] mb-4">Terima kasih telah menulis!</h3>
                <blockquote class="text-lg text-[#7A8471] mb-4 leading-relaxed italic">
                    "{{ $motivationalQuote->quote }}"
                </blockquote>
                @if ($motivationalQuote->author)
                    <p class="text-[#B5936B] font-medium mb-6">— {{ $motivationalQuote->author }}</p>
                @endif
                <button wire:click="closeQuote"
                    class="px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg font-medium transition-colors">
                    Terima Kasih
                </button>
            </div>
        </div>
    @endif
</div>
