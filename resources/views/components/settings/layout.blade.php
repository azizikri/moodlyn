<div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-[#E8C4A0] p-8">
    <div class="flex items-start max-md:flex-col gap-8">
        <div class="w-full md:w-[240px] flex-shrink-0">
            <div class="bg-gradient-to-br from-[#FAF7F3] to-[#F7E7D3] rounded-2xl p-5 border border-[#E8C4A0] shadow-sm">
                <h3 class="text-sm font-semibold text-[#8B6F47] mb-3 uppercase tracking-wide">Menu Pengaturan</h3>
                <div class="space-y-2">
                    <a href="{{ route('settings.profile') }}" wire:navigate
                        class="flex items-center gap-3 text-[#7A8471] hover:text-[#8B6F47] hover:bg-white/60 rounded-xl px-4 py-3 transition-all duration-200 {{ request()->routeIs('settings.profile') ? 'bg-white/90 text-[#8B6F47] font-medium shadow-sm' : '' }}">
                        <span class="text-lg">👤</span>
                        <span>Profil</span>
                    </a>
                    <a href="{{ route('settings.password') }}" wire:navigate
                        class="flex items-center gap-3 text-[#7A8471] hover:text-[#8B6F47] hover:bg-white/60 rounded-xl px-4 py-3 transition-all duration-200 {{ request()->routeIs('settings.password') ? 'bg-white/90 text-[#8B6F47] font-medium shadow-sm' : '' }}">
                        <span class="text-lg">🔒</span>
                        <span>Kata Sandi</span>
                    </a>
                    <a href="{{ route('settings.appearance') }}" wire:navigate
                        class="flex items-center gap-3 text-[#7A8471] hover:text-[#8B6F47] hover:bg-white/60 rounded-xl px-4 py-3 transition-all duration-200 {{ request()->routeIs('settings.appearance') ? 'bg-white/90 text-[#8B6F47] font-medium shadow-sm' : '' }}">
                        <span class="text-lg">🎨</span>
                        <span>Tampilan</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="hidden md:block w-px bg-[#E8C4A0] self-stretch mx-2"></div>

        <div class="flex-1 min-w-0">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-[#8B6F47] mb-2">{{ $heading ?? '' }}</h2>
                <p class="text-[#A0956B]">{{ $subheading ?? '' }}</p>
            </div>

            <div class="w-full max-w-2xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
