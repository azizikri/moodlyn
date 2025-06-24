<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Konfirmasi Password')" :description="__('Ini adalah area aman. Harap konfirmasi password Anda untuk melanjutkan.')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="confirmPassword" class="flex flex-col gap-5">
        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-sm font-medium text-[#8B6F47]">Password</label>
            <input wire:model="password" id="password" type="password" required autocomplete="current-password"
                placeholder="Masukkan password Anda"
                class="w-full px-4 py-3 bg-[#FAF7F3] border border-[#E5D5C8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B5936B] focus:border-transparent text-[#4A453E] placeholder-[#7A8471]" />
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            Konfirmasi
        </button>
    </form>
</div>
