<div>
    <div class="min-h-screen bg-[#FAF7F3] grain-texture">
        <!-- Header -->
        <div class="bg-white/80 backdrop-blur-sm shadow-sm border-b border-[#E8C4A0]">
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-[#8B6F47]">Pengaturan</h1>
                        <p class="text-[#A0956B] mt-1">Kelola profil dan pengaturan akun Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <x-settings.layout :heading="'Tampilan'" :subheading="'Atur pengaturan tampilan untuk akun Anda'">
                    <div class="space-y-8">
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-2xl border border-blue-200">
                            <label class="flex items-center gap-2 text-lg font-semibold text-[#8B6F47] mb-4">
                                🎨 <span>Pilih Tema</span>
                            </label>
                            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance" class="max-w-md">
                                <flux:radio value="light" icon="sun"
                                    class="flex-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-800">☀️ Terang
                                </flux:radio>
                                <flux:radio value="dark" icon="moon"
                                    class="flex-1 bg-gray-700 hover:bg-gray-800 text-white">🌙 Gelap</flux:radio>
                                <flux:radio value="system" icon="computer-desktop"
                                    class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-800">💻 Sistem</flux:radio>
                            </flux:radio.group>
                        </div>

                        <div class="bg-amber-50 p-6 rounded-2xl border border-amber-200">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">💡</span>
                                <div>
                                    <h4 class="font-medium text-amber-800 mb-2">Tips Pengaturan Tema</h4>
                                    <p class="text-sm text-amber-700 leading-relaxed">
                                        Pilihan tema akan mengatur tampilan aplikasi sesuai dengan preferensi Anda.
                                        Tema <strong>"Sistem"</strong> akan mengikuti pengaturan tema di perangkat Anda
                                        secara otomatis.
                                        Tema <strong>"Terang"</strong> cocok untuk penggunaan di siang hari, sedangkan
                                        tema <strong>"Gelap"</strong>
                                        lebih nyaman untuk mata di malam hari.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-[#E8C4A0]/50">
                            <div class="flex items-center gap-4">
                                <div class="text-green-700 text-sm font-medium bg-green-50 px-3 py-2 rounded-lg">
                                    ✓ Pengaturan tema disimpan otomatis
                                </div>
                            </div>
                        </div>
                    </div>
                </x-settings.layout>
            </div>
        </div>
    </div>
</div>
