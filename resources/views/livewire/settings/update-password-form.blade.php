<form wire:submit="updatePassword" class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-[#8B6F47] mb-2">Kata Sandi Saat Ini</label>
        <input wire:model="current_password" type="password" required autocomplete="current-password"
            class="w-full px-4 py-3 border border-[#E8C4A0] rounded-xl focus:border-[#B5936B] focus:ring-2 focus:ring-[#B5936B]/20 transition-all" />
        @error('current_password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-[#8B6F47] mb-2">Kata Sandi Baru</label>
            <input wire:model="password" type="password" required autocomplete="new-password"
                class="w-full px-4 py-3 border border-[#E8C4A0] rounded-xl focus:border-[#B5936B] focus:ring-2 focus:ring-[#B5936B]/20 transition-all" />
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-[#8B6F47] mb-2">Konfirmasi Kata Sandi</label>
            <input wire:model="password_confirmation" type="password" required autocomplete="new-password"
                class="w-full px-4 py-3 border border-[#E8C4A0] rounded-xl focus:border-[#B5936B] focus:ring-2 focus:ring-[#B5936B]/20 transition-all" />
        </div>
    </div>

    <div class="flex items-center gap-4 pt-4">
        <button type="submit"
            class="bg-[#B5936B] hover:bg-[#8B6F47] text-white px-6 py-2 rounded-xl font-medium transition-all">
            Ubah Kata Sandi
        </button>
        <div class="text-green-700 text-sm bg-green-50 px-3 py-1 rounded-lg opacity-0 transition-opacity"
            x-data="{ shown: false }" x-init="@this.on('password-updated', () => { shown = true;
                setTimeout(() => shown = false, 3000); })" x-show="shown">
            ✓ Kata sandi berhasil diubah
        </div>
    </div>
</form>
