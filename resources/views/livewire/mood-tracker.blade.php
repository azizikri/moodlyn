<div class="bg-white/50 grain-texture rounded-2xl p-8 shadow-lg max-w-2xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-[#8B6F47] mb-3">Bagaimana perasaan Anda hari ini?</h2>
        <p class="text-[#7A8471] text-lg">Pilih mood yang paling menggambarkan perasaan Anda saat ini.</p>
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

    @if ($hasSubmittedToday)
        <!-- Today's Mood Display -->
        <div class="text-center mb-8 p-6 bg-[#F7E7D3] rounded-xl">
            <div class="text-6xl mb-4">{{ $moodOptions[$selectedMood] ?? '😊' }}</div>
            <h3 class="text-2xl font-semibold text-[#8B6F47] mb-2">Mood Hari Ini: {{ $selectedMood }}</h3>
            @if ($cause)
                <p class="text-[#7A8471] italic">"{{ $cause }}"</p>
            @endif
            <p class="text-sm text-[#B5936B] mt-2">Anda sudah mencatat mood hari ini.</p>
        </div>
    @else
        <!-- Mood Selection -->
        <div class="mb-8">
            <div class="grid grid-cols-4 gap-6 mb-6">
                @foreach ($moodOptions as $mood => $emoji)
                    <div wire:click="selectMood('{{ $mood }}')"
                        class="mood-option cursor-pointer text-center p-4 rounded-xl border-2 transition-all duration-300 hover:shadow-lg
                                {{ $selectedMood === $mood ? 'border-[#B5936B] bg-[#F7E7D3] shadow-md' : 'border-[#E8C4A0] hover:border-[#B5936B] hover:bg-white/80' }}">
                        <div class="text-4xl mb-2">{{ $emoji }}</div>
                        <div class="text-sm font-medium text-[#8B6F47]">{{ $mood }}</div>
                    </div>
                @endforeach
            </div>

            <!-- Cause Input -->
            <div class="mb-6">
                <label for="cause" class="block text-[#8B6F47] font-medium mb-2">
                    Apa yang menyebabkan perasaan ini? (opsional)
                </label>
                <textarea wire:model="cause" id="cause" rows="3"
                    class="w-full p-4 border-2 border-[#E8C4A0] rounded-lg focus:border-[#B5936B] focus:outline-none resize-none"
                    placeholder="Ceritakan tentang apa yang mempengaruhi mood Anda hari ini..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button wire:click="submitMood" {{ !$selectedMood ? 'disabled' : '' }}
                    class="px-8 py-4 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-xl font-semibold text-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:transform-none">
                    Catat Mood Saya
                </button>
            </div>
        </div>
    @endif

    <!-- Motivational Quote Modal -->
    @if ($showQuote && $motivationalQuote)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl p-8 max-w-lg w-full mx-4 text-center grain-texture shadow-2xl">
                <div class="text-5xl mb-4">✨</div>
                <h3 class="text-2xl font-bold text-[#8B6F47] mb-4">Motivasi untuk Anda</h3>
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
