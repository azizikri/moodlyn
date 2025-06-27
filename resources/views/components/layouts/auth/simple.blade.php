<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-[#FAF7F3] grain-texture text-[#4A453E] antialiased">
    <div class="flex min-h-screen flex-col items-center justify-center gap-6 p-6 md:p-10">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#FAF7F3] via-[#F7E7D3] to-[#F2EDE7] opacity-50"></div>

        <div class="relative flex w-full max-w-md flex-col gap-6">
            <!-- Logo and Brand -->
            <a href="{{ url('/') }}" class="flex flex-col items-center gap-4 font-medium" wire:navigate>
                <div class="flex items-center justify-center w-16 h-16 bg-[#B5936B] rounded-2xl shadow-lg">
                    <span class="text-2xl">🌸</span>
                </div>
                <h1 class="text-3xl font-bold text-[#8B6F47]">Moodlyn</h1>
                <p class="text-sm text-[#7A8471] text-center">Platform self-care untuk kesejahteraan mental Anda</p>
            </a>

            <!-- Auth Form Container -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl p-8 border border-white/20">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
    @fluxScripts

    <script>
        // Handle Livewire session expiry
        document.addEventListener('livewire:navigated', () => {
            // Refresh CSRF token on navigation
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                window.livewire.getCsrfToken = () => token.getAttribute('content');
            }
        });

        // Handle expired session errors
        window.addEventListener('livewire:error', (event) => {
            if (event.detail.status === 419) {
                // Session expired - show user-friendly message and refresh
                alert('Your session has expired. The page will refresh automatically.');
                window.location.reload();
            }
        });
    </script>
</body>

</html>
