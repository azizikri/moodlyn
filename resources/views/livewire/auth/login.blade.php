<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Masuk ke akun Anda')" :description="__('Masukkan email dan password untuk melanjutkan')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-5">
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-sm font-medium text-[#8B6F47]">Email</label>
            <input wire:model="email" id="email" type="email" required autofocus autocomplete="email"
                placeholder="email@example.com"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="password" class="text-sm font-medium text-[#8B6F47]">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-[#B5936B] hover:text-[#8B6F47] transition-colors" wire:navigate>
                        Lupa password?
                    </a>
                @endif
            </div>
            <input wire:model="password" id="password" type="password" required autocomplete="current-password"
                placeholder="Masukkan password"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="space-y-2">
            <button type="submit"
                class="w-full py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Masuk
            </button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="text-center text-sm text-[#7A8471]">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors"
                wire:navigate>
                Daftar sekarang
            </a>
        </div>
    @endif
</div>
