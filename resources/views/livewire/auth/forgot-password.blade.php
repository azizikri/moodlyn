<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Lupa Password')" :description="__('Masukkan email Anda untuk menerima link reset password')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-5">
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-sm font-medium text-[#8B6F47]">Email</label>
            <input wire:model="email" id="email" type="email" required autofocus placeholder="email@example.com"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            Kirim Link Reset Password
        </button>
    </form>

    <div class="text-center text-sm text-[#7A8471]">
        Atau,
        <a href="{{ route('login') }}" class="text-[#B5936B] hover:text-[#8B6F47] font-medium transition-colors"
            wire:navigate>
            kembali ke halaman masuk
        </a>
    </div>
</div>
