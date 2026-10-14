<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pembayaran Premium</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12',
            },
            dark: '#1e293b',
            darker: '#0f172a'
          },
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          },
          boxShadow: {
            'glow': '0 0 15px rgba(249, 115, 22, 0.5)',
            'glow-lg': '0 0 25px rgba(249, 115, 22, 0.7)'
          }
        }
      }
    }
  </script>
  <style>
    body {
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      min-height: 100vh;
    }

    .payment-card {
      background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .payment-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .payment-method {
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .payment-method:hover {
      border-color: #f97316;
      box-shadow: 0 0 15px rgba(249, 115, 22, 0.2);
    }

    .payment-method.selected {
      border-color: #f97316;
      background-color: rgba(249, 115, 22, 0.05);
      box-shadow: 0 0 15px rgba(249, 115, 22, 0.3);
    }

    .nav-item {
      position: relative;
    }

    .nav-item:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -2px;
      left: 0;
      background-color: white;
      transition: width 0.3s ease;
    }

    .nav-item:hover:after {
      width: 100%;
    }

    .btn-primary {
      background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(234, 88, 12, 0.4);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .info-card {
      background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .pulse-animation {
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(249, 115, 22, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(249, 115, 22, 0);
      }
    }

    .floating {
      animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }

    .progress-bar {
      height: 6px;
      background: linear-gradient(90deg, #f97316 0%, #fb923c 50%, #f97316 100%);
      background-size: 200% 100%;
      animation: progress 2s linear infinite;
    }

    @keyframes progress {
      0% { background-position: 200% 0; }
      100% { background-position: -200% 0; }
    }
  </style>
  <script>
    function getQueryParam(param) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }

    function showPaymentDetails(method) {
      const paymentDiv = document.getElementById("payment-details");
      paymentDiv.innerHTML = "";

      // Remove all selected classes first
      document.querySelectorAll('.payment-method').forEach(el => {
        el.classList.remove('selected');
      });

      // Add selected class to clicked method
      document.getElementById(method + '-card').classList.add('selected');

      if (method === "va") {
        paymentDiv.innerHTML = `
          <div class="animate__animated animate__fadeIn bg-primary-50 p-4 rounded-lg mt-4">
            <h4 class="font-bold text-primary-700 mb-2">Virtual Account Details</h4>
            <div class="flex items-center space-x-3">
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/bca.co.id" alt="BCA" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/mandiri.co.id" alt="Mandiri" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/bni.co.id" alt="BNI" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/bri.co.id" alt="BRI" class="h-8">
              </div>
            </div>
            <div class="mt-4 bg-white p-4 rounded-lg border border-primary-200">
              <p class="text-sm text-gray-600">Nomor Virtual Account:</p>
              <p class="text-xl font-bold text-primary-700">1234 5678 9012 3456</p>
              <p class="text-xs text-gray-500 mt-2">Valid hingga: ${new Date(Date.now() + 24 * 60 * 60 * 1000).toLocaleString()}</p>
            </div>
          </div>
        `;
      } else if (method === "ewallet") {
        paymentDiv.innerHTML = `
          <div class="animate__animated animate__fadeIn bg-primary-50 p-4 rounded-lg mt-4">
            <h4 class="font-bold text-primary-700 mb-2">E-Wallet Details</h4>
            <div class="flex items-center space-x-3">
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/gopay.com" alt="Gopay" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/ovo.id" alt="OVO" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/dana.id" alt="DANA" class="h-8">
              </div>
              <div class="bg-white p-3 rounded-lg shadow-sm">
                <img src="https://logo.clearbit.com/linkaja.id" alt="LinkAja" class="h-8">
              </div>
            </div>
            <div class="mt-4 bg-white p-4 rounded-lg border border-primary-200">
              <p class="text-sm text-gray-600">Nomor E-Wallet:</p>
              <p class="text-xl font-bold text-primary-700">0812 3456 7890</p>
              <p class="text-xs text-gray-500 mt-2">Scan QR Code untuk pembayaran cepat</p>
              <div class="mt-2 p-2 bg-white border border-gray-200 inline-block">
                <div class="w-24 h-24 bg-gray-100 flex items-center justify-center">
                  <i class="fas fa-qrcode text-3xl text-gray-400"></i>
                </div>
              </div>
            </div>
          </div>
        `;
      } else if (method === "manual") {
        paymentDiv.innerHTML = `
          <div class="animate__animated animate__fadeIn bg-primary-50 p-4 rounded-lg mt-4">
            <h4 class="font-bold text-primary-700 mb-2">Manual Transfer Details</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-white p-4 rounded-lg border border-primary-200">
                <div class="flex items-center space-x-3 mb-3">
                  <div class="bg-primary-100 p-2 rounded-full">
                    <i class="fas fa-university text-primary-600"></i>
                  </div>
                  <h5 class="font-bold">Bank Mandiri</h5>
                </div>
                <p class="text-sm text-gray-600">Nomor Rekening:</p>
                <p class="text-xl font-bold text-primary-700">9876 5432 1098</p>
                <p class="text-sm text-gray-600 mt-2">Atas Nama:</p>
                <p class="font-medium">PT. Travel Express</p>
              </div>
              <div class="bg-white p-4 rounded-lg border border-primary-200">
                <div class="flex items-center space-x-3 mb-3">
                  <div class="bg-primary-100 p-2 rounded-full">
                    <i class="fas fa-university text-primary-600"></i>
                  </div>
                  <h5 class="font-bold">Bank BCA</h5>
                </div>
                <p class="text-sm text-gray-600">Nomor Rekening:</p>
                <p class="text-xl font-bold text-primary-700">1234 5678 9012</p>
                <p class="text-sm text-gray-600 mt-2">Atas Nama:</p>
                <p class="font-medium">PT. Travel Express</p>
              </div>
            </div>
            <div class="mt-4 bg-yellow-50 p-3 rounded-lg border border-yellow-200">
              <div class="flex items-start space-x-2">
                <i class="fas fa-exclamation-circle text-yellow-500 mt-1"></i>
                <p class="text-sm text-yellow-700">Harap unggah bukti transfer setelah pembayaran untuk proses verifikasi.</p>
              </div>
            </div>
          </div>
        `;
      }
    }

    function formatPrice(price) {
      const num = parseInt(price.replace(/\D/g, ""));
      return "IDR " + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function enableSubmit(method) {
      const btn = document.getElementById("submitBtn");
      btn.disabled = false;
      btn.classList.remove("bg-gray-300", "cursor-not-allowed");
      btn.classList.add("btn-primary", "hover:shadow-lg", "transform", "transition", "duration-300");

      // Show payment details
      showPaymentDetails(method);

      // Animate the submit button
      btn.classList.add('animate__animated', 'animate__pulse');
      setTimeout(() => {
        btn.classList.remove('animate__animated', 'animate__pulse');
      }, 1000);
    }

    document.addEventListener("DOMContentLoaded", function () {
      // Add animation to elements
      document.querySelectorAll('.animate-on-load').forEach((el, index) => {
        el.classList.add('animate__animated', `animate__fadeInUp`);
        el.style.animationDelay = `${index * 0.1}s`;
      });

      let totalPayment = getQueryParam("total_payment");
      let discount = getQueryParam("discount");
      let nama = getQueryParam("nama");
      let nomor = getQueryParam("nomor");
      let asal = getQueryParam("asal");
      let tujuan = getQueryParam("tujuan");
      let seatString = getQueryParam("seat");

      // Menampilkan data yang diterima dari query string
      document.getElementById("namaLengkap").textContent = nama || "Tidak tersedia";
      document.getElementById("nomorPonsel").textContent = nomor || "Tidak tersedia";
      document.getElementById("asalText").textContent = asal || "Tidak tersedia";
      document.getElementById("tujuanText").textContent = tujuan || "Tidak tersedia";

      if (totalPayment) {
          document.getElementById("total-payment").textContent = formatPrice(totalPayment);
      }

      if (discount === "10") {
          const discountInfo = document.createElement("p");
          discountInfo.classList.add("font-bold", "text-green-600", "mt-2", "flex", "items-center");
          discountInfo.innerHTML = `<i class="fas fa-tag mr-2"></i> Harga sudah diskon 10%`;
          document.getElementById("total-payment").parentNode.insertBefore(discountInfo, document.getElementById("total-payment").nextSibling);
      }

      // Menampilkan informasi kursi yang dipilih
      const seatsInfo = document.getElementById('seats-info');
      if (seatString) {
          seatsInfo.innerHTML = `<i class="fas fa-chair mr-2"></i> Nomor Kursi: <span class="font-bold">${seatString}</span>`;
      } else {
          seatsInfo.textContent = 'Tidak ada kursi yang dipilih.';
      }

      // Add event listeners to payment methods
      document.querySelectorAll('input[name="payment"]').forEach(input => {
        input.addEventListener('change', function() {
          enableSubmit(this.id);
        });
      });
    });
  </script>
</head>
<body class="min-h-screen flex flex-col font-sans">

  <!-- Animated Progress Bar -->
  <div class="progress-bar"></div>

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-primary-700 to-primary-600 p-4 flex justify-between items-center text-white shadow-lg">
    <div class="flex items-center space-x-8">
      <div class="flex items-center space-x-3">
        <div class="bg-white p-2 rounded-lg shadow-md">
          <i class="fas fa-bus text-primary-600 text-2xl"></i>
        </div>
        <span class="text-xl font-bold">BusTech</span>
      </div>
      <div class="hidden md:flex items-center space-x-6">
        <a href="{{ route('home') }}" class="nav-item hover:text-white">Beranda</a>
        <a href="#" class="nav-item hover:text-white">Perjalanan</a>
        <a href="#" class="nav-item hover:text-white">Pesanan</a>
        <a href="#" class="nav-item hover:text-white">Tentang Kami</a>
        <a href="#" class="nav-item hover:text-white">Bantuan</a>
      </div>
    </div>
    <div class="flex items-center space-x-4">
      <div class="hidden md:flex items-center space-x-2 bg-primary-800 px-3 py-1 rounded-full">
        <img src="https://flagcdn.com/id.svg" alt="Indonesia" class="w-5 h-3">
        <span class="text-sm">ID</span>
      </div>
      <div class="flex items-center space-x-2 bg-primary-800 px-3 py-1 rounded-full">
        <i class="fas fa-user-circle"></i>
        <span class="hidden md:inline">Hi, User</span>
      </div>
      <button class="md:hidden text-white">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>

  <!-- Main Container -->
  <main class="container mx-auto my-8 px-4 flex-1">
    <div class="max-w-6xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-8 animate-on-load">
        <h1 class="text-3xl md:text-4xl font-bold text-primary-700 mb-3">PEMBAYARAN</h1>
        <div class="flex justify-center items-center">
          <div class="w-24 h-1 bg-primary-500 rounded-full"></div>
        </div>
        <p class="mt-4 text-gray-600">Selesaikan pembayaran untuk mengamankan kursi Anda</p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Pilihan Pembayaran -->
        <div class="md:col-span-2">
          <div class="payment-card p-6 animate-on-load">
            <h3 class="font-bold text-xl mb-6 flex items-center">
              <i class="fas fa-credit-card mr-3 text-primary-600"></i>
              <span>Pilih Metode Pembayaran</span>
            </h3>

            <div class="space-y-4">
              <!-- VA Card -->
              <div id="va-card" class="payment-method p-4 rounded-lg cursor-pointer" onclick="document.getElementById('va').click()">
                <label class="flex items-start space-x-4 cursor-pointer">
                  <input type="radio" name="payment" id="va" onclick="enableSubmit('va')" class="mt-1 accent-primary-500">
                  <div class="flex-1">
                    <div class="flex justify-between items-center">
                      <h4 class="font-semibold">Virtual Account Transfer</h4>
                      <div class="flex space-x-1">
                        <div class="w-8 h-5 bg-blue-50 rounded flex items-center justify-center">
                          <i class="fas fa-university text-blue-500 text-xs"></i>
                        </div>
                        <div class="w-8 h-5 bg-green-50 rounded flex items-center justify-center">
                          <i class="fas fa-university text-green-500 text-xs"></i>
                        </div>
                        <div class="w-8 h-5 bg-red-50 rounded flex items-center justify-center">
                          <i class="fas fa-university text-red-500 text-xs"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">BCA, Mandiri, BNI, BRI dan bank lainnya</p>
                  </div>
                </label>
              </div>

              <!-- E-Wallet Card -->
              <div id="ewallet-card" class="payment-method p-4 rounded-lg cursor-pointer" onclick="document.getElementById('ewallet').click()">
                <label class="flex items-start space-x-4 cursor-pointer">
                  <input type="radio" name="payment" id="ewallet" onclick="enableSubmit('ewallet')" class="mt-1 accent-primary-500">
                  <div class="flex-1">
                    <div class="flex justify-between items-center">
                      <h4 class="font-semibold">E-Wallet</h4>
                      <div class="flex space-x-1">
                        <div class="w-8 h-5 bg-purple-50 rounded flex items-center justify-center">
                          <i class="fas fa-wallet text-purple-500 text-xs"></i>
                        </div>
                        <div class="w-8 h-5 bg-yellow-50 rounded flex items-center justify-center">
                          <i class="fas fa-mobile-alt text-yellow-500 text-xs"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Gopay, OVO, DANA, LinkAja dan lainnya</p>
                  </div>
                </label>
              </div>

              <!-- Manual Transfer Card -->
              <div id="manual-card" class="payment-method p-4 rounded-lg cursor-pointer" onclick="document.getElementById('manual').click()">
                <label class="flex items-start space-x-4 cursor-pointer">
                  <input type="radio" name="payment" id="manual" onclick="enableSubmit('manual')" class="mt-1 accent-primary-500">
                  <div class="flex-1">
                    <div class="flex justify-between items-center">
                      <h4 class="font-semibold">Manual Bank Transfer</h4>
                      <div class="flex space-x-1">
                        <div class="w-8 h-5 bg-blue-50 rounded flex items-center justify-center">
                          <i class="fas fa-exchange-alt text-blue-500 text-xs"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Transfer manual ke rekening bank kami</p>
                  </div>
                </label>
              </div>
            </div>

            <!-- Payment Details -->
            <div id="payment-details" class="mt-6"></div>

            <!-- Form Upload -->
            <form action="{{ route('pemesanan.upload') }}" method="POST" enctype="multipart/form-data" class="mt-8 animate-on-load">
              @csrf
              <input type="hidden" name="id_user" value="{{ session('id_user') ?? request()->query('id_user') }}">
              <input type="hidden" name="id_bus" value="{{ session('id_bus') ?? request()->query('id_bus') }}">
              <input type="hidden" name="tgl_order" value="{{ now()->toDateString() }}">
              <input type="hidden" name="total_bayar" value="{{ request()->query('total_payment') }}">
              <input type="hidden" name="diskon" value="{{ request()->query('discount') }}">
              <input type="hidden" name="seat" value="{{ request()->query('seat') }}">

              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-file-upload mr-2 text-primary-600"></i>
                  Upload Bukti Pembayaran
                </label>
                <div class="mt-1 flex items-center">
                <label class="flex flex-col items-center justify-center w-full h-70 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
  <div class="flex flex-col items-center justify-center pt-5 pb-6">
    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
    <p class="mb-2 text-sm text-gray-500">Klik untuk mengunggah</p>
    <p class="text-xs text-gray-500">PNG, JPG, atau PDF (Maks. 5MB)</p>
  </div>
  <input type="file" name="bukti_bayar" class="hidden" required="" id="fileInput">

  <!-- Tempat untuk menampilkan gambar -->
  <img id="previewImage" class="hidden w-full h-40 object-contain mt-2 rounded-lg" alt="Preview Gambar">

  <!-- Tempat untuk menampilkan nama file -->
  <p id="fileName" class="text-xs text-gray-500 mt-2"></p>
</label>
                </div>
              </div>

              <button type="submit" id="submitBtn" disabled class="w-full py-3 px-4 bg-gray-300 cursor-not-allowed text-white font-semibold rounded-lg shadow transition duration-300 flex items-center justify-center">
                <i class="fas fa-lock mr-2"></i>
                Upload Bukti Bayar
              </button>
            </form>
          </div>
        </div>

       <!-- Informasi Pemesanan -->
<div class="animate-on-load">
  <div class="info-card p-6 fixed top-6 right-6 w-80 bg-white shadow-lg rounded-lg z-40">
    <h3 class="font-bold text-xl mb-6 flex items-center">
      <i class="fas fa-receipt mr-3 text-primary-600"></i>
      <span>Detail Pemesanan</span>
    </h3>

    <div class="space-y-4">
      <div class="flex items-start">
        <div class="bg-primary-100 p-2 rounded-full mr-3">
          <i class="fas fa-user text-primary-600 text-sm"></i>
        </div>
        <div>
          <p class="text-sm text-gray-500">Nama Lengkap</p>
          <p id="namaLengkap" class="font-medium"></p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="bg-primary-100 p-2 rounded-full mr-3">
          <i class="fas fa-phone text-primary-600 text-sm"></i>
        </div>
        <div>
          <p class="text-sm text-gray-500">Nomor Ponsel</p>
          <p id="nomorPonsel" class="font-medium"></p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="bg-primary-100 p-2 rounded-full mr-3">
          <i class="fas fa-map-marker-alt text-primary-600 text-sm"></i>
        </div>
        <div>
          <p class="text-sm text-gray-500">Asal</p>
          <p id="asalText" class="font-medium"></p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="bg-primary-100 p-2 rounded-full mr-3">
          <i class="fas fa-map-marker-alt text-primary-600 text-sm"></i>
        </div>
        <div>
          <p class="text-sm text-gray-500">Tujuan</p>
          <p id="tujuanText" class="font-medium"></p>
        </div>
      </div>

      <div class="flex items-start">
        <div class="bg-primary-100 p-2 rounded-full mr-3">
          <i class="fas fa-chair text-primary-600 text-sm"></i>
        </div>
        <div>
          <p class="text-sm text-gray-500">Kursi</p>
          <p id="seats-info" class="font-medium"></p>
        </div>
      </div>

      <div class="pt-4 mt-4 border-t border-gray-200">
        <div class="flex justify-between items-center mb-2">
          <p class="text-gray-600">Total Pembayaran</p>
          <p id="total-payment" class="text-xl font-bold text-primary-600">IDR 0</p>
        </div>

        <div class="bg-green-50 p-3 rounded-lg mt-4">
          <div class="flex items-center">
            <i class="fas fa-shield-alt text-green-500 mr-2"></i>
            <p class="text-sm text-green-700">Pembayaran aman dan terenkripsi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<div id="chatbox-container" class="fixed bottom-4 right-4 z-50">
  <!-- Floating Button -->
  <div id="chat-toggle" class="bg-white shadow-lg p-4 rounded-full cursor-pointer flex items-center space-x-2 w-max hover:bg-blue-100 transition">
    <i class="fas fa-comment text-blue-700"></i>
    <span class="text-blue-700 font-semibold">Butuh Bantuan?</span>
  </div>

  <!-- Chatbox -->
  <div id="chatbox" class="hidden mt-2 bg-white shadow-lg rounded-lg w-80 overflow-hidden">
    <div class="bg-blue-700 text-white px-4 py-2 font-bold">
      Chat Bantuan
    </div>
    <div id="chat-messages" class="p-3 h-64 overflow-y-auto space-y-2 text-sm">
      <div class="text-gray-500 text-center text-xs">Mulai percakapan dengan kami</div>
    </div>
    <div class="p-2 border-t flex">
      <input id="chat-input" type="text" placeholder="Tulis pesan..." class="flex-1 border rounded-full px-3 py-1 text-sm focus:outline-none" />
      <button id="chat-send" class="ml-2 text-blue-700 hover:text-blue-900">
        <i class="fas fa-paper-plane"></i>
      </button>
    </div>
  </div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-primary-800 to-primary-700 text-white pt-12 pb-6 mt-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="animate-on-load">
          <div class="flex items-center mb-4">
            <div class="bg-white p-2 rounded-lg mr-3">
              <i class="fas fa-bus text-primary-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold">BusTech</h3>
          </div>
          <p class="text-primary-200 mb-4">Solusi perjalanan terbaik dengan pelayanan prima dan harga terjangkau.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-white hover:text-primary-200 transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white hover:text-primary-200 transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white hover:text-primary-200 transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white hover:text-primary-200 transition"><i class="fab fa-youtube"></i></a>
          </div>
        </div>

        <div class="animate-on-load">
          <h4 class="text-lg font-semibold mb-4 border-b border-primary-600 pb-2">Layanan</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Booking Online</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Pelayanan Prima</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Berita Terbaru</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Pencarian Agen</a></li>
          </ul>
        </div>

        <div class="animate-on-load">
          <h4 class="text-lg font-semibold mb-4 border-b border-primary-600 pb-2">Perusahaan</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Sejarah</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Visi Misi</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> FAQ</a></li>
            <li><a href="#" class="text-primary-200 hover:text-white transition flex items-center"><i class="fas fa-chevron-right text-xs mr-2"></i> Esensi Layanan</a></li>
          </ul>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-4">Kontak</h3>
          <ul class="text-sm text-[var(--footer-text)] space-y-2">
            <li><i class="fas fa-map-marker-alt mr-2"></i>Jl. Dr Soetomo, Yogyakarta</li>
            <li><i class="fas fa-phone mr-2"></i>+62 812 3456 7890</li>
            <li><i class="fas fa-envelope mr-2"></i>support@bustech.co.id</li>

          </ul>
        </div>
          </div>
        </div>
      </div>

      <div class="border-t border-primary-600 mt-8 pt-6 text-center text-primary-200 text-sm animate-on-load">
        <p>© 2023 TravelExpress. All rights reserved.</p>
      </div>
    </div>
  </footer>

  

  <!-- SweetAlert Script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        @if ($errors->has('seat'))
            Swal.fire({
                icon: 'error',
                title: 'Kursi sudah dipesan',
                text: '{{ $errors->first("seat") }}',
                confirmButtonColor: '#f97316',
                background: '#ffffff',
                backdrop: `
                  rgba(249,115,22,0.4)
                  url("/images/nyan-cat.gif")
                  left top
                  no-repeat
                `
            });
        @endif
    });
  </script>
<script>
  // Menambahkan event listener untuk menampilkan nama file dan gambar yang diunggah
  document.getElementById('fileInput').addEventListener('change', function(event) {
    var fileName = event.target.files[0] ? event.target.files[0].name : 'Tidak ada file yang dipilih';
    document.getElementById('fileName').textContent = fileName;

    // Menampilkan preview gambar jika file yang dipilih adalah gambar
    var file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var preview = document.getElementById('previewImage');
        preview.src = e.target.result;  // Set gambar sumber untuk preview
        preview.classList.remove('hidden');  // Menampilkan gambar
      };
      reader.readAsDataURL(file);
    } else {
      document.getElementById('previewImage').classList.add('hidden');  // Sembunyikan gambar jika bukan gambar
    }
  });
   const toggle = document.getElementById('chat-toggle');
  const chatbox = document.getElementById('chatbox');
  const input = document.getElementById('chat-input');
  const sendBtn = document.getElementById('chat-send');
  const messages = document.getElementById('chat-messages');

  toggle.addEventListener('click', () => {
    chatbox.classList.toggle('hidden');
  });

  function appendMessage(sender, text) {
    const msg = document.createElement('div');
    msg.className = sender === 'user' ? 'text-right' : 'text-left text-blue-700';
    msg.innerHTML = `<span class="inline-block bg-${sender === 'user' ? 'gray-200' : 'blue-100'} px-3 py-1 rounded-lg mb-1 max-w-[75%]">${text}</span>`;
    messages.appendChild(msg);
    messages.scrollTop = messages.scrollHeight;
  }

  function botReply(userText) {
  const text = userText.toLowerCase();

  let reply;

  if (text.includes("order")) {
    reply = `Berikut tutorial untuk melakukan order:\n1. Kunjungi halaman tiket.\n2. Pilih tujuan dan nomor kursi.\n3. Isi detail informasi pengguna.\n4. Selesaikan pembayaran.\nJika masih bingung, silakan ketik "bantuan".`;

  } else if (text.includes("lupa password") || text.includes("lupa sandi")) {
    reply = `Silakan hubungi admin kami lewat WhatsApp yang tertera: <a href="https://wa.me/6285701262765" target="_blank" class="text-blue-600 underline">+62 857-0126-2765</a>. Kami akan bantu reset password Anda.`;

  } else if (
    text.includes("nomor pembayaran") ||
    text.includes("rekening") && text.includes("tidak") ||
    text.includes("rekening") && text.includes("mana") ||
    text.includes("rekening") && text.includes("dimana") ||
    text.includes("bayar ke mana") ||
    text.includes("tidak ada nomor") ||
    text.includes("transfer ke mana")
  ) {
    reply = `Berikut adalah info pembayaran yang tersedia:<br>
    <strong>Dana:</strong> 087963254125<br>
    <strong>Gopay:</strong> 087963254125<br>
    <strong>BCA:</strong> 78963-23698<br>
    <strong>BRI:</strong> 89659-03256`;

  } else if (
    text.includes("saya tidak paham") ||
    text.includes("nggak ngerti") ||
    text.includes("ga ngerti") ||
    text.includes("tidak mengerti") ||
    text.includes("bingung")
  ) {
    reply = `Silakan ketikkan "order" atau "bantuan" untuk memulai. Kami siap membantu 😊`;

  } else if (text.includes("halo") || text.includes("hai")) {
    reply = `Halo! Ada yang bisa kami bantu hari ini? 😊`;

  } else if (text.includes("bantuan")) {
    reply = `Ketik "order" untuk melihat cara order.<br>
    Ketik "lupa password" jika Anda mengalami kendala login.<br>
    Atau tulis pertanyaan Anda, kami siap membantu!`;

  } else {
    reply = `Maaf, kami tidak mengerti "${userText}". Silakan coba dengan kata kunci seperti "order", "bantuan", atau "lupa password".`;
  }

  setTimeout(() => {
    appendMessage('bot', reply.replace(/\n/g, '<br>'));
  }, 700);
}



  sendBtn.addEventListener('click', () => {
    const userText = input.value.trim();
    if (userText) {
      appendMessage('user', userText);
      input.value = '';
      botReply(userText);
    }
  });

  input.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      sendBtn.click();
    }
  });
</script>
</body>
</html>
