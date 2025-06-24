<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-[#FAF7F3] grain-texture text-[#4A453E] antialiased">
    <!-- Background Pattern -->
    <div class="fixed inset-0 bg-gradient-to-br from-[#FAF7F3] via-[#F7E7D3] to-[#F2EDE7] opacity-30 -z-10"></div>

    <!-- Top Navigation -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-sm border-b border-[#E5D5C8] shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center" wire:navigate>
                    <x-app-logo />
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}"
                        class="text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('dashboard') ? 'text-[#8B6F47]' : '' }}"
                        wire:navigate>
                        Dashboard
                    </a>
                    <a href="{{ route('mood-tracker') }}"
                        class="text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('mood-tracker') ? 'text-[#8B6F47]' : '' }}"
                        wire:navigate>
                        Mood Tracker
                    </a>
                    <a href="{{ route('journal') }}"
                        class="text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('journal') ? 'text-[#8B6F47]' : '' }}"
                        wire:navigate>
                        Journal
                    </a>
                    <a href="{{ route('history') }}"
                        class="text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('history') ? 'text-[#8B6F47]' : '' }}"
                        wire:navigate>
                        History
                    </a>
                </div>

                <!-- User Menu -->
                <div class="relative">
                    <div class="flex items-center space-x-4">
                        <!-- Desktop User Menu -->
                        <div class="hidden md:block">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-[#7A8471]">{{ auth()->user()->name }}</span>
                                <div class="relative group">
                                    <button
                                        class="flex items-center justify-center w-8 h-8 bg-[#B5936B] rounded-full text-white font-medium hover:bg-[#8B6F47] transition-colors">
                                        {{ auth()->user()->initials() }}
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div
                                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-[#E5D5C8] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                        <div class="py-2">
                                            <div class="px-4 py-2 border-b border-[#E5D5C8]">
                                                <p class="text-sm font-medium text-[#8B6F47]">
                                                    {{ auth()->user()->name }}</p>
                                                <p class="text-xs text-[#7A8471]">{{ auth()->user()->email }}</p>
                                            </div>
                                            <a href="{{ route('settings.profile') }}"
                                                class="block px-4 py-2 text-sm text-[#7A8471] hover:text-[#8B6F47] hover:bg-[#FAF7F3] transition-colors"
                                                wire:navigate>
                                                Settings
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full text-left px-4 py-2 text-sm text-[#7A8471] hover:text-[#8B6F47] hover:bg-[#FAF7F3] transition-colors">
                                                    Log Out
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Menu Button -->
                        <button
                            class="md:hidden flex items-center justify-center w-8 h-8 bg-[#B5936B] rounded-lg text-white hover:bg-[#8B6F47] transition-colors"
                            onclick="toggleMobileMenu()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white/95 backdrop-blur-sm border-t border-[#E5D5C8]">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('dashboard') ? 'text-[#8B6F47] bg-[#FAF7F3]' : '' }}"
                    wire:navigate>
                    Dashboard
                </a>
                <a href="{{ route('mood-tracker') }}"
                    class="block px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('mood-tracker') ? 'text-[#8B6F47] bg-[#FAF7F3]' : '' }}"
                    wire:navigate>
                    Mood Tracker
                </a>
                <a href="{{ route('journal') }}"
                    class="block px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('journal') ? 'text-[#8B6F47] bg-[#FAF7F3]' : '' }}"
                    wire:navigate>
                    Journal
                </a>
                <a href="{{ route('history') }}"
                    class="block px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors font-medium {{ request()->routeIs('history') ? 'text-[#8B6F47] bg-[#FAF7F3]' : '' }}"
                    wire:navigate>
                    History
                </a>
                <div class="border-t border-[#E5D5C8] pt-2 mt-2">
                    <div class="px-3 py-2">
                        <p class="text-sm font-medium text-[#8B6F47]">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-[#7A8471]">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="{{ route('settings.profile') }}"
                        class="block px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors" wire:navigate>
                        Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-3 py-2 text-[#7A8471] hover:text-[#8B6F47] transition-colors">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Mobile Menu Script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    @fluxScripts
</body>

</html>
