<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Verifikasi Email')" :description="__('Kami telah mengirim link verifikasi ke email Anda')" />

    <div class="text-center p-6 bg-[#F7E7D3] rounded-xl border border-[#E5D5C8]">
        <div class="text-3xl mb-3">📧</div>
        <p class="text-[#8B6F47] text-sm">
            {{ __('Silakan klik link verifikasi yang telah kami kirim ke email Anda untuk melanjutkan.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="text-center p-4 bg-green-50 border border-green-200 rounded-xl">
            <p class="text-green-700 text-sm font-medium">
                {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
            </p>
        </div>
    @endif

    <div class="flex flex-col items-center justify-between space-y-4">
        <button wire:click="sendVerification"
            class="w-full py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            {{ __('Kirim Ulang Email Verifikasi') }}
        </button>

        <button wire:click="logout" class="text-sm text-[#7A8471] hover:text-[#8B6F47] transition-colors cursor-pointer">
            {{ __('Keluar') }}
        </button>
    </div>
</div>
