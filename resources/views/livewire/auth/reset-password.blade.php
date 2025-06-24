<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Reset Password')" :description="__('Masukkan password baru Anda')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="resetPassword" class="flex flex-col gap-5">
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-sm font-medium text-[#8B6F47]">Email</label>
            <input wire:model="email" id="email" type="email" required autocomplete="email"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-sm font-medium text-[#8B6F47]">Password Baru</label>
            <input wire:model="password" id="password" type="password" required autocomplete="new-password"
                placeholder="Minimal 8 karakter"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="text-sm font-medium text-[#8B6F47]">Konfirmasi Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" required
                autocomplete="new-password" placeholder="Ulangi password baru"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="pt-2">
            <button type="submit"
                class="w-full py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Reset Password
            </button>
        </div>
    </form>
</div>
