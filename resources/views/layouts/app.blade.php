<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-orange-500 text-white p-4 flex justify-between">
        <div class="text-lg font-bold">BUSTECH</div>
        <div>
            <a href="#" class="px-3">Beranda</a>
            <a href="#" class="px-3">Perjalanan</a>
            <a href="#" class="px-3">Tentang Kami</a>
            <a href="#" class="px-3">Bantuan</a>
            <a href="#" class="px-3">Masuk</a>
            <a href="#" class="px-3">Daftar</a>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>
