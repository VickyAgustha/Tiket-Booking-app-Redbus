<!-- resources/views/success.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Berhasil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @layer utilities {
      .glass {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
      }

      @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
      }

      .animate-float {
        animation: float 3s ease-in-out infinite;
      }

      .glow-button {
        background: linear-gradient(to right, #f97316, #fb923c);
        box-shadow: 0 0 20px #fb923c80;
        transition: all 0.3s ease-in-out;
      }

      .glow-button:hover {
        box-shadow: 0 0 30px #fb923cb3;
        transform: translateY(-2px) scale(1.03);
      }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-orange-100 via-white to-orange-50 min-h-screen flex items-center justify-center px-6 py-10">

  <div class="glass rounded-3xl max-w-xl w-full p-10 text-center animate-fade-in-up">
    
    <!-- Ikon Uang -->
    <div class="flex justify-center mb-6">
      <div class="bg-gradient-to-tr from-orange-400 to-yellow-300 p-5 rounded-full shadow-2xl animate-float">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 8c-1.657 0-3 1.343-3 3h6a3 3 0 01-3 3m0-6v-1m0 8v1m9-6a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>

    <!-- Judul -->
    <h1 class="text-4xl font-extrabold text-orange-600 drop-shadow mb-4 tracking-wide">
      Pembayaran Sukses!
    </h1>

    <!-- Pesan -->
    <p class="text-gray-700 text-lg leading-relaxed mb-8">
      Terima kasih telah melakukan pembayaran.<br>
      Kami akan memproses pesanan Anda sesegera mungkin dengan layanan terbaik.
    </p>

    <!-- Tombol -->
    <a href="{{ route('home') }}"
       class="inline-block glow-button text-white font-semibold px-6 py-3 rounded-full shadow-xl tracking-wide">
      ⬅ Kembali ke Beranda
    </a>
  </div>

</body>
</html>
