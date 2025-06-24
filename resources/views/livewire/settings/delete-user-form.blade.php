<div>
    <div class="p-4 bg-red-50 border border-red-200 rounded-xl mb-4">
        <p class="text-red-700 text-sm">
            <strong>Peringatan:</strong> Menghapus akun akan menghapus semua data Anda secara permanen. Tindakan ini
            tidak dapat dibatalkan.
        </p>
    </div>

    <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl font-medium transition-all">
        Hapus Akun
    </button>

    <!-- Modal -->
    <div x-data="{ open: false }" x-on:open-modal.window="open = ($event.detail === 'confirm-user-deletion')"
        x-on:close-modal.window="open = false" x-show="open" class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black/50" x-on:click="open = false"></div>

            <div class="relative bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
                <div class="text-center mb-6">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-red-600 text-xl">⚠️</span>
                    </div>
                    <h3 class="text-lg font-bold text-red-700 mb-2">Konfirmasi Penghapusan</h3>
                    <p class="text-gray-600 text-sm">Masukkan kata sandi untuk menghapus akun secara permanen.</p>
                </div>

                <form wire:submit="deleteUser">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                        <input wire:model="password" type="password" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-500/20"
                            placeholder="Masukkan kata sandi Anda" />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="button" x-on:click="open = false"
                            class="flex-1 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl font-medium transition-all">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl font-medium transition-all">
                            Hapus Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
