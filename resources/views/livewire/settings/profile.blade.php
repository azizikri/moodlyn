<div class="min-h-screen bg-[#FAF7F3] py-8">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#8B6F47] mb-2">Pengaturan</h1>
            <p class="text-[#A0956B]">Kelola profil, kata sandi, dan tampilan akun Anda</p>
        </div>

        <div class="space-y-8">
            <!-- Profile Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#E8C4A0] p-6">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-2xl">👤</span>
                    <div>
                        <h2 class="text-xl font-semibold text-[#8B6F47]">Profil</h2>
                        <p class="text-sm text-[#A0956B]">Perbarui nama dan alamat email Anda</p>
                    </div>
                </div>

                <form wire:submit="updateProfileInformation" class="space-y-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#8B6F47] mb-2">Nama</label>
                            <input wire:model="name" type="text" required autofocus autocomplete="name"
                                class="w-full px-4 py-3 border border-[#E8C4A0] rounded-xl focus:border-[#B5936B] focus:ring-2 focus:ring-[#B5936B]/20 transition-all" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#8B6F47] mb-2">Email</label>
                            <input wire:model="email" type="email" required autocomplete="email"
                                class="w-full px-4 py-3 border border-[#E8C4A0] rounded-xl focus:border-[#B5936B] focus:ring-2 focus:ring-[#B5936B]/20 transition-all" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                        <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <p class="text-sm text-amber-700">
                                Alamat email Anda belum diverifikasi.
                                <button type="button" wire:click.prevent="resendVerificationNotification"
                                    class="text-[#B5936B] hover:text-[#8B6F47] font-medium underline">
                                    Kirim ulang email verifikasi.
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm text-green-700">✓ Email verifikasi telah dikirim.</p>
                            @endif
                        </div>
                    @endif

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit"
                            class="bg-[#B5936B] hover:bg-[#8B6F47] text-white px-6 py-2 rounded-xl font-medium transition-all">
                            Simpan Profil
                        </button>
                        <div class="text-green-700 text-sm bg-green-50 px-3 py-1 rounded-lg opacity-0 transition-opacity"
                            x-data="{ shown: false }" x-init="@this.on('profile-updated', () => {
                                shown = true;
                                setTimeout(() => shown = false, 3000);
                            })" x-show="shown">
                            ✓ Tersimpan
                        </div>
                    </div>
                </form>
            </div>

            <!-- Password Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#E8C4A0] p-6">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-2xl">🔒</span>
                    <div>
                        <h2 class="text-xl font-semibold text-[#8B6F47]">Kata Sandi</h2>
                        <p class="text-sm text-[#A0956B]">Ubah kata sandi akun Anda</p>
                    </div>
                </div>

                <livewire:settings.update-password-form />
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-red-200 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-2xl">⚠️</span>
                    <div>
                        <h2 class="text-xl font-semibold text-red-700">Zona Bahaya</h2>
                        <p class="text-sm text-red-600">Hapus akun dan semua data secara permanen</p>
                    </div>
                </div>

                <livewire:settings.delete-user-form />
            </div>
        </div>
    </div>

    <script>
        function setTheme(theme) {
            localStorage.setItem('theme', theme);
            // Update active button
            document.querySelectorAll('.theme-btn').forEach(btn => {
                btn.classList.remove('border-[#B5936B]', 'bg-[#B5936B]/10');
            });
            document.querySelector(`[data-theme="${theme}"]`).classList.add('border-[#B5936B]', 'bg-[#B5936B]/10');

            // Apply theme logic here if needed
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (theme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                // System theme
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        }

        // Initialize theme on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'system';
            setTheme(savedTheme);
        });
    </script>
</div>
