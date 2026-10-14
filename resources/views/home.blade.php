<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSTECH - Travel in Comfort & Style</title>
    <meta name="description" content="Nikmati perjalanan aman, nyaman, dan terjangkau dengan BUSTECH. Pesan tiket bus online dengan mudah dan cepat.">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B35',
                        secondary: '#004E89',
                        accent: '#FFD166',
                        dark: '#1A1A2E',
                        light: '#F7F7FF'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        '3d': '0 10px 30px -15px rgba(0, 0, 0, 0.3)',
                        'card': '0 8px 30px rgba(0, 0, 0, 0.12)',
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">

    <style>
        .hero-gradient {
            background: linear-gradient(135deg, rgba(255,107,53,0.9) 0%, rgba(0,78,137,0.9) 100%);
        }
        .ticket-card {
            transition: all 0.3s ease;
            backface-visibility: hidden;
        }
        .ticket-card:hover {
            transform: translateY(-5px) scale(1.02);
        }
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            display: flex;
        }
        .marquee-content {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 20s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .left {
            flex: 1;
            background: #f2f2f2; /* atau warna netral lainnya */
            display: flex;
            justify-content: left;
            align-items: center;
        }

        .left img {
            max-width: 15%;
            height: auto;
        }
    </style>
</head>
<body class="font-sans bg-light text-dark antialiased">
    <!-- Announcement Bar -->
    <div class="bg-accent text-dark py-2 px-4 shadow-sm">
        <div class="marquee-container">
            <div class="marquee-content text-sm font-medium">
                <span class="mx-4">🚍 Nikmati perjalananmu dengan BusTech — Aman, Nyaman, Terjangkau!</span>
                <span class="mx-4">🎉 Diskon 30% untuk pemesanan pertama! Gunakan kode: BUSTECH30</span>
                <span class="mx-4">📢 Tiket ke Yogyakarta mulai dari Rp 150.000!</span>
            </div>
        </div>
    </div>

      <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Branding -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="w-10 h-10 object-contain">
                <span class="text-xl font-bold text-primary hidden sm:inline">BUSTECH</span>
            </div>

            <!-- Desktop Menu -->
<div class="hidden md:flex items-center space-x-8">
    <a href="{{ route('home') }}"
       class="font-medium flex items-center transition-colors duration-200
       {{ request()->routeIs('home') ? 'text-[var(--primary-color)]' : 'text-gray-700 hover:text-[var(--primary-color)]' }}">
        <i class="fas fa-home mr-2"></i> Beranda
    </a>
    <a href="{{ route('perjalanan') }}"
       class="font-medium flex items-center transition-colors duration-200
       {{ request()->routeIs('perjalanan') ? 'text-[var(--primary-color)]' : 'text-gray-700 hover:text-[var(--primary-color)]' }}">
        <i class="fas fa-route mr-2"></i> Perjalanan
    </a>
    <a href="#"
       class="font-medium flex items-center transition-colors duration-200
       {{ request()->is('tentang-kami') ? 'text-[var(--primary-color)]' : 'text-gray-700 hover:text-[var(--primary-color)]' }}">
        <i class="fas fa-info-circle mr-2"></i> Tentang Kami
    </a>
    <a href="#"
       class="font-medium flex items-center transition-colors duration-200
       {{ request()->is('bantuan') ? 'text-[var(--primary-color)]' : 'text-gray-700 hover:text-[var(--primary-color)]' }}">
        <i class="fas fa-question-circle mr-2"></i> Bantuan
    </a>
</div>


                <!-- Live Clock -->
                <div class="flex items-center space-x-4 ml-6">
                    <div class="flex items-center bg-primary text-white px-3 py-1 rounded-full shadow-sm">
                        <i class="far fa-clock mr-2"></i>
                        <span id="live-clock" class="font-mono font-medium text-sm">00:00:00</span>
                    </div>

                    @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white shadow-sm">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <span class="text-sm font-medium">{{ Auth::user()->nama }}</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-sm text-dark hover:bg-gray-100">Profil Saya</a>
                            <a href="#" class="block px-4 py-2 text-sm text-dark hover:bg-gray-100">Pesanan</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-dark hover:text-primary transition-colors duration-200">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-full text-sm font-bold transition-all duration-200 shadow-sm hover:shadow-md">
                            Daftar
                        </a>
                    </div>
                    @endauth
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-dark hover:text-primary focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
        <!-- Mobile menu -->
        <div class="md:hidden hidden bg-white shadow-lg" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary">Beranda</a>
                <a href="{{ route('perjalanan') }}" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Perjalanan</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Tentang Kami</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Bantuan</a>

                @auth
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex items-center px-3 py-2">
                        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white mr-3">
                            <i class="fas fa-user text-sm"></i>
                        </div>
                        <span class="text-sm font-medium">{{ Auth::user()->nama }}</span>
                    </div>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Profil Saya</a>
                    <a href="{{ route('perjalanan') }}" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Pesanan</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-gray-100">
                            Keluar
                        </button>
                    </form>
                </div>
                @else
                <div class="pt-4 border-t border-gray-200">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:text-primary">Masuk</a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-primary text-white px-3 py-2 rounded-md text-base font-bold mt-2">
                        Daftar
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="container mx-auto px-4 lg:px-8 py-16 md:py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Perjalanan Nyaman dengan <span class="text-accent">BUSTECH</span></h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">Temukan dan pesan tiket bus terbaik untuk perjalanan Anda dengan mudah dan cepat.</p>

                <!-- Search Ticket Form -->
                <div class="bg-white rounded-xl shadow-2xl p-6 text-dark">
                    <h3 class="text-2xl font-bold mb-4 text-primary">Cari Tiket Bus</h3>
                    <form action="{{ route('tiket.cari') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Asal</label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                                <input type="text" name="asal" placeholder="Kota asal" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Tujuan</label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                                <input type="text" name="tujuan" placeholder="Kota tujuan" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Tanggal</label>
                            <div class="relative">
                                <i class="far fa-calendar-alt absolute left-3 top-3 text-gray-400"></i>
                                <input type="date" name="jadwal_berangkat" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                        <div class="col-span-1 flex items-end">
                            <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200 h-[42px]">
                                <i class="fas fa-search mr-2"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Kenapa Memilih BUSTECH?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami memberikan pengalaman perjalanan terbaik dengan berbagai keunggulan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Aman dan Terpercaya</h3>
                    <p class="text-gray-600">Armada terawat dengan standar keamanan tinggi dan sopir profesional.</p>
                </div>

                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-couch text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Kenyamanan Maksimal</h3>
                    <p class="text-gray-600">Tempat duduk luas, AC, dan fasilitas lengkap untuk perjalanan nyaman.</p>
                </div>

                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tag text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Harga Terjangkau</h3>
                    <p class="text-gray-600">Harga kompetitif dengan promo menarik setiap minggunya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Rute Populer</h2>
                    <p class="text-gray-600">Temukan rute favorit penumpang kami</p>
                </div>
                <a href="{{ route('perjalanan') }}" class="mt-4 md:mt-0 inline-flex items-center text-primary font-medium hover:text-secondary transition-colors duration-200">
                    Lihat Semua Rute <i class="fas fa-chevron-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Route Card 1 -->
                <div class="ticket-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="relative h-40 bg-gradient-to-r from-primary to-secondary">
                        <img src="images/kota_bandung.jpg" alt="Jakarta" class="w-full h-full object-cover opacity-70">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white text-xl font-bold">Jakarta - Bandung</h3>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-medium text-gray-500"><i class="far fa-clock mr-1"></i> 2.5 jam</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-primary">Rp 150.000</span>
                            <a href="#" class="text-sm font-medium text-primary hover:text-secondary transition-colors duration-200">Pesan <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Route Card 2 -->
                <div class="ticket-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="relative h-40 bg-gradient-to-r from-primary to-secondary">
                        <img src="images/kota_bengkulu.jpeg" alt="Yogyakarta" class="w-full h-full object-cover opacity-70">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white text-xl font-bold">Yogyakarta - Bengkulu</h3>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-medium text-gray-500"><i class="far fa-clock mr-1"></i> 8 jam</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-primary">Rp 250.000</span>
                            <a href="#" class="text-sm font-medium text-primary hover:text-secondary transition-colors duration-200">Pesan <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Route Card 3 -->
                <div class="ticket-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="relative h-40 bg-gradient-to-r from-primary to-secondary">
                        <img src="images/kota_semarang.jpeg" alt="Surabaya" class="w-full h-full object-cover opacity-70">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white text-xl font-bold">Surabaya - Semarang</h3>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-medium text-gray-500"><i class="far fa-clock mr-1"></i> 12 jam</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-primary">Rp 350.000</span>
                            <a href="#" class="text-sm font-medium text-primary hover:text-secondary transition-colors duration-200">Pesan <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Route Card 4 -->
                <div class="ticket-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="relative h-40 bg-gradient-to-r from-primary to-secondary">
                        <img src="images/kota_bali.jpg" alt="Bali" class="w-full h-full object-cover opacity-70">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white text-xl font-bold">Yogyakarta - Bali</h3>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-medium text-gray-500"><i class="far fa-clock mr-1"></i> 24 jam</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-primary">Rp 600.000</span>
                            <a href="#" class="text-sm font-medium text-primary hover:text-secondary transition-colors duration-200">Pesan <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Promo Spesial</h2>
                <p class="opacity-90 max-w-2xl mx-auto">Manfaatkan promo menarik untuk perjalanan Anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Main Promo -->
                <div class="bg-white text-dark rounded-xl overflow-hidden shadow-xl">
                    <div class="relative h-64">
                        <img src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="New Year Promo" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                        <div class="absolute bottom-0 left-0 p-6">
                            <span class="bg-accent text-dark text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block">TERBATAS</span>
                            <h3 class="text-2xl font-bold text-white mb-2">Tahun Baru 2025</h3>
                            <p class="text-white mb-4">Diskon hingga 30% untuk semua rute! Berlaku hingga 5 Januari 2025</p>
                            <button onclick="window.location.href='{{ route('tiket.cari') }}'" class="bg-primary hover:bg-secondary text-white font-bold px-6 py-2 rounded-full transition-colors duration-200">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Secondary Promos -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-white text-dark rounded-xl p-6 shadow-md flex items-center">
                        <div class="bg-accent text-dark rounded-full w-16 h-16 flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-percentage text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Diskon 20% Tiket Pertama</h3>
                            <p class="text-gray-600 text-sm">Gunakan kode <span class="font-bold">BUSTECH20</span> saat checkout</p>
                        </div>
                    </div>

                    <div class="bg-white text-dark rounded-xl p-6 shadow-md flex items-center">
                        <div class="bg-accent text-dark rounded-full w-16 h-16 flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Grup 4 Orang</h3>
                            <p class="text-gray-600 text-sm">Diskon 15% untuk pemesanan minimal 4 tiket sekaligus</p>
                        </div>
                    </div>

                    <div class="bg-white text-dark rounded-xl p-6 shadow-md flex items-center">
                        <div class="bg-accent text-dark rounded-full w-16 h-16 flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-birthday-cake text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-1">Promo Ulang Tahun</h3>
                            <p class="text-gray-600 text-sm">Dapatkan diskon 25% di bulan ulang tahun Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Apa Kata Mereka?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Testimoni dari pelanggan setia BUSTECH</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-light rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold">Andi Wijaya</h4>
                            <div class="flex text-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Perjalanan Jakarta-Bandung sangat nyaman. Bus bersih, AC dingin, dan sopir profesional. Akan gunakan BUSTECH lagi!"</p>
                </div>

                <div class="bg-light rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold">Siti Rahmawati</h4>
                            <div class="flex text-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Pertama kali naik bus dengan fasilitas bagus seperti ini. Ada charging port dan WiFi gratis. Recommended banget!"</p>
                </div>

                <div class="bg-light rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold">Budi Santoso</h4>
                            <div class="flex text-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Harga terjangkau tapi kualitas premium. Tidak pernah terlambat dan selalu tepat waktu. Pelayanannya juga ramah."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-secondary text-white">
        <div class="container mx-auto px-4 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Memulai Perjalanan Anda?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">Pesan tiket bus Anda sekarang dan nikmati perjalanan yang nyaman dengan BUSTECH</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('tiket.cari') }}" class="bg-primary hover:bg-accent text-white font-bold px-8 py-3 rounded-full transition-colors duration-200">
                    Pesan Tiket Sekarang
                </a>
                <a href="{{ route('perjalanan') }}" class="bg-transparent hover:bg-white hover:text-secondary border-2 border-white text-white font-bold px-8 py-3 rounded-full transition-colors duration-200">
                    Lihat Semua Tiket Yang di Pesan
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
<footer class="bg-dark text-white pt-16 pb-8 mt-16 border-t border-gray-700">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
      <!-- Brand -->
      <div>
        <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="h-12 mb-4">
        <p class="text-gray-300 mb-4 leading-relaxed text-sm">
          BUSTECH memberikan pengalaman perjalanan bus terbaik dengan kenyamanan dan keamanan terjamin.
        </p>
        <div class="flex space-x-3 mt-4">
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>

      <!-- Perusahaan -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Perusahaan</h3>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
          <li><a href="#" class="hover:text-white transition">Karir</a></li>
          <li><a href="#" class="hover:text-white transition">Blog</a></li>
          <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
          <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
        </ul>
      </div>

      <!-- Layanan -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Layanan</h3>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#" class="hover:text-white transition">Pesan Tiket</a></li>
          <li><a href="#" class="hover:text-white transition">Cek Jadwal</a></li>
          <li><a href="#" class="hover:text-white transition">Promo</a></li>
          <li><a href="#" class="hover:text-white transition">Bantuan</a></li>
          <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Kontak</h3>
        <ul class="text-sm text-gray-300 space-y-2">
          <li><i class="fas fa-map-marker-alt mr-2"></i>Jl. Dr Soetomo, Yogyakarta</li>
          <li><i class="fas fa-phone mr-2"></i>+62 812 3456 7890</li>
          <li><i class="fas fa-envelope mr-2"></i>support@bustech.id</li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-700 pt-6 text-sm text-gray-500 text-center">
      © {{ date('Y') }} BUSTECH. All rights reserved.
    </div>
  </div>
</footer>

                <script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('live-clock').textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
</body>
</html>
