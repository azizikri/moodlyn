<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moodlyn - Your Self-Care Companion</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta name="csrf_token" value="{{ csrf_token() }}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FAF7F3] grain-texture text-[#4A453E] antialiased min-h-screen">
    <!-- Navigation -->
    <header class="w-full max-w-6xl mx-auto px-6 py-4">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <h1 class="text-2xl font-semibold text-[#8B6F47]">Moodlyn</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="#services" class="text-[#7A8471] hover:text-[#8B6F47] transition-colors">Layanan Kami</a>
                    <a href="#faq" class="text-[#7A8471] hover:text-[#8B6F47] transition-colors">FAQ</a>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-6 py-2 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg transition-colors font-medium">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-[#7A8471] hover:text-[#8B6F47] transition-colors">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-6 py-2 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg transition-colors font-medium">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    <!-- Hero Section -->
    <main class="w-full max-w-6xl mx-auto px-6 py-12">
        <div class="text-center mb-16 fade-in">
            <h1 class="text-5xl font-bold text-[#8B6F47] mb-6">
                Temukan Keseimbangan Emosi Anda
            </h1>
            <p class="text-xl text-[#7A8471] mb-8 max-w-3xl mx-auto leading-relaxed">
                Moodlyn adalah platform self-care yang membantu Anda melacak mood, menulis jurnal harian,
                dan mendapatkan motivasi untuk mendukung kesejahteraan mental Anda.
            </p>
            <div class="flex items-center justify-center gap-4">
                @guest
                    <a href="{{ route('register') }}"
                        class="inline-block px-8 py-4 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-xl transition-all font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Mulai Perjalanan Anda
                    </a>
                    <a href="{{ route('login') }}"
                        class="inline-block px-8 py-4 border-2 border-[#B5936B] text-[#B5936B] hover:bg-[#B5936B] hover:text-white rounded-xl transition-all font-semibold text-lg">
                        Masuk
                    </a>
                @else
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-8 py-4 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-xl transition-all font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Ke Dashboard
                    </a>
                @endguest
            </div>
        </div>

        <!-- Features Preview -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <div class="text-center p-8 bg-white/50 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">📊</div>
                <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Pelacakan Mood</h3>
                <p class="text-[#7A8471]">Pantau perubahan emosi Anda setiap hari dan temukan pola yang mempengaruhi
                    perasaan Anda.</p>
            </div>
            <div class="text-center p-8 bg-white/50 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">📝</div>
                <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Jurnal Harian</h3>
                <p class="text-[#7A8471]">Ekspresikan pikiran dan perasaan Anda dalam ruang yang aman dan pribadi.</p>
            </div>
            <div class="text-center p-8 bg-white/50 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">💭</div>
                <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Motivasi Harian</h3>
                <p class="text-[#7A8471]">Dapatkan kutipan motivasi yang menginspirasi untuk memulai hari dengan
                    semangat positif.</p>
            </div>
        </div>
    </main>

    <!-- Services Section -->
    <section id="services" class="w-full bg-white/30 py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#8B6F47] mb-4">Layanan Kami</h2>
                <p class="text-xl text-[#7A8471] max-w-3xl mx-auto">
                    Kami menyediakan tiga layanan utama yang dirancang khusus untuk mendukung perjalanan self-care Anda.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="text-3xl">😊</div>
                        <div>
                            <h3 class="text-2xl font-semibold text-[#8B6F47] mb-3">Mood Tracker</h3>
                            <p class="text-[#7A8471] leading-relaxed">
                                Pilih dari berbagai pilihan mood seperti Bahagia, Sedih, Cemas, Tenang, Energik, Marah,
                                Stres, atau Bersyukur.
                                Tambahkan catatan tentang penyebab atau konteks perasaan Anda untuk pemahaman yang lebih
                                mendalam.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="text-3xl">✍️</div>
                        <div>
                            <h3 class="text-2xl font-semibold text-[#8B6F47] mb-3">Daily Journaling</h3>
                            <p class="text-[#7A8471] leading-relaxed">
                                Ekspresikan pikiran dan perasaan Anda dengan bebas menggunakan editor teks yang
                                mendukung format
                                seperti tebal, miring, garis bawah, dan daftar. Semua entri Anda disimpan dengan aman
                                dan privat.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="text-3xl">🌟</div>
                        <div>
                            <h3 class="text-2xl font-semibold text-[#8B6F47] mb-3">Motivational Quotes</h3>
                            <p class="text-[#7A8471] leading-relaxed">
                                Setiap kali Anda menyelesaikan mood tracking atau journaling, dapatkan kutipan motivasi
                                yang
                                relevan untuk mengangkat semangat dan memberikan perspektif positif.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#F7E7D3] to-[#F2EDE7] p-8 rounded-3xl">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🧘‍♀️</div>
                        <h3 class="text-2xl font-semibold text-[#8B6F47] mb-4">Mulai Hari Ini</h3>
                        <p class="text-[#7A8471] mb-6">
                            Bergabunglah dengan komunitas yang peduli dengan kesehatan mental dan mulai perjalanan
                            self-care Anda.
                        </p>
                        @guest
                            <a href="{{ route('register') }}"
                                class="inline-block px-6 py-3 bg-[#B5936B] hover:bg-[#8B6F47] text-white rounded-lg transition-colors font-medium">
                                Daftar Sekarang
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="w-full py-16">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#8B6F47] mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-[#7A8471]">
                    Temukan jawaban atas pertanyaan yang sering diajukan tentang Moodlyn.
                </p>
            </div>

            <div class="space-y-6">
                <div class="bg-white/50 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">
                        Apa itu Moodlyn?</h3>
                    <p class="text-[#7A8471]">
                        Moodlyn adalah platform self-care berbasis web yang membantu kamu melacak suasana hati, menulis
                        jurnal harian, dan mendapatkan kutipan motivasi untuk menjaga kesehatan mental.
                    </p>
                </div>

                <div class="bg-white/50 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Apakah ada biaya untuk menggunakan Moodlyn?
                    </h3>
                    <p class="text-[#7A8471]">
                        Saat ini, Moodlyn dapat digunakan secara gratis.
                    </p>
                </div>

                <div class="bg-white/50 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Siapa yang bisa menggunakan Moodlyn?</h3>
                    <p class="text-[#7A8471]">
                        Moodlyn dirancang khusus untuk mahasiswa, tapi siapa saja yang ingin memantau dan mengelola
                        kondisi emosionalnya bisa menggunakannya.
                    </p>
                </div>

                <div class="bg-white/50 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold text-[#8B6F47] mb-3">Bagaimana cara menggunakan fitur Mood
                        Tracker?</h3>
                    <p class="text-[#7A8471]">
                        Kamu cukup pilih suasana hati hari ini dan tulis alasan mengapa kamu merasa seperti itu. Moodlyn
                        akan membantu kamu memantau perubahan suasana hati setiap harinya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-[#8B6F47] text-white py-8 mt-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-2xl font-semibold mb-4">Moodlyn</h3>
            <p class="text-[#D4A574] mb-4">
                Platform self-care untuk kesejahteraan mental Anda.
            </p>
            <p class="text-sm text-[#D4A574]">
                © {{ date('Y') }} Moodlyn. Semua hak dilindungi.
            </p>
        </div>
    </footer>
</body>

</html>
