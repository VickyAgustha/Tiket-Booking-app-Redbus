<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Tiket</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          },
          colors: {
            premium: {
              primary: '#FF6B35',
              secondary: '#FFD166',
              dark: '#292F36',
              light: '#F7FFF7',
              accent: '#4ECDC4',
            }
          },
          boxShadow: {
            'premium': '0 10px 30px -15px rgba(0, 0, 0, 0.2)',
            'premium-lg': '0 15px 40px -20px rgba(0, 0, 0, 0.25)',
          }
        }
      }
    }
  </script>
  <style>
    .gradient-bg {
      background: linear-gradient(135deg, #FF6B35 0%, #FF9E1F 100%);
    }
    .seat-checkbox:checked + .seat-label {
      background-color: #FF6B35;
      color: white;
    }
    .seat-checkbox:disabled + .seat-label {
      background-color: #e0e0e0;
      cursor: not-allowed;
    }
    .premium-card {
      transition: all 0.3s ease;
      background: linear-gradient(145deg, #ffffff 0%, #f8f8f8 100%);
    }
    .premium-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px -20px rgba(0, 0, 0, 0.25);
    }
  </style>
</head>
<body class="bg-premium-light min-h-screen flex flex-col font-sans">

  <!-- Premium Navbar -->
  <nav class="gradient-bg p-4 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center text-white">
      <div class="flex items-center space-x-6">
        <div class="flex items-center space-x-3">
          <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="w-10 h-10 object-contain">
          <span class="text-xl font-bold tracking-wide">Tiket<span class="text-premium-secondary">Premium</span></span>
        </div>
        <div class="hidden lg:flex space-x-6">
          <a href="{{ route('home') }}" class="hover:text-premium-secondary transition flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Beranda
          </a>
          <a href="#" class="hover:text-premium-secondary transition flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
            Perjalanan
          </a>
          <a href="#" class="hover:text-premium-secondary transition flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
            </svg>
            Tentang Kami
          </a>
          <a href="#" class="hover:text-premium-secondary transition flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Bantuan
          </a>
        </div>
      </div>
      <a href="{{ route('login') }}" class="bg-white text-premium-primary px-6 py-2 rounded-full font-semibold hover:bg-premium-secondary hover:text-white transition flex items-center shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
        </svg>
        Logout
      </a>
    </div>
  </nav>

  <!-- Premium Promo Section -->
  <section class="container mx-auto px-4 py-10">
    <div class="bg-gradient-to-r from-premium-secondary to-premium-accent p-8 rounded-2xl shadow-premium-lg relative overflow-hidden">
      <div class="absolute -right-10 -top-10 w-32 h-32 bg-white bg-opacity-20 rounded-full"></div>
      <div class="absolute -left-20 -bottom-20 w-40 h-40 bg-white bg-opacity-20 rounded-full"></div>
      <div class="relative z-10">
        <h2 class="text-4xl font-bold text-center text-premium-dark mb-2">🎉 Promo Spesial Hari Ini</h2>
        <p class="text-center text-premium-dark mb-8">Nikmati diskon eksklusif untuk perjalanan Anda</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div class="premium-card p-6 rounded-xl shadow-premium border border-premium-secondary border-opacity-30">
            <div class="bg-premium-primary text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-4">HOT DEAL</div>
            <h3 class="text-xl font-bold text-gray-800">Jakarta ke Medan</h3>
            <p class="text-premium-primary text-3xl font-bold mt-3">IDR 1.138.116</p>
            <p class="text-sm text-gray-600 mt-1 line-through">IDR 1.626.000</p>
            <div class="mt-4 bg-premium-accent bg-opacity-20 text-premium-dark text-xs px-3 py-1 rounded-full inline-block">Diskon 30%</div>
          </div>
          <div class="premium-card p-6 rounded-xl shadow-premium border border-premium-secondary border-opacity-30">
            <div class="bg-premium-accent text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-4">BEST PRICE</div>
            <h3 class="text-xl font-bold text-gray-800">Jakarta ke Padang</h3>
            <p class="text-premium-primary text-3xl font-bold mt-3">IDR 1.138.275</p>
            <p class="text-sm text-gray-600 mt-1">Harga terbaik minggu ini</p>
            <div class="mt-4 bg-premium-secondary bg-opacity-20 text-premium-dark text-xs px-3 py-1 rounded-full inline-block">Limited Offer</div>
          </div>
          <div class="premium-card p-6 rounded-xl shadow-premium border border-premium-secondary border-opacity-30">
            <div class="bg-premium-secondary text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-4">WEEKEND</div>
            <h3 class="text-xl font-bold text-gray-800">Jakarta ke Pekanbaru</h3>
            <p class="text-premium-primary text-3xl font-bold mt-3">IDR 852.200</p>
            <p class="text-sm text-gray-600 mt-1 line-through">IDR 1.217.000</p>
            <div class="mt-4 bg-premium-primary bg-opacity-20 text-premium-dark text-xs px-3 py-1 rounded-full inline-block">Akhir Pekan</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Filter dan Hasil Pencarian -->
  <main class="container mx-auto px-4 pb-16 flex flex-col md:flex-row gap-8">
    <!-- Premium Filter -->
    <aside class="w-full md:w-1/4">
      <div class="bg-white p-6 rounded-xl shadow-premium sticky top-24">
        <h3 class="text-xl font-bold mb-6 text-premium-dark border-b border-premium-secondary pb-3">Filter Pencarian</h3>
        <form action="{{ route('tiket.cari') }}" method="GET" class="space-y-6">
          <div>
            <label for="kapasitas" class="block font-medium text-premium-dark mb-2">Kapasitas Bus</label>
            <select id="kapasitas" name="kapasitas" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-premium-primary focus:border-transparent appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGNsYXNzPSJsdWNpZGUgbHVjaWRlLWNoZXZyb24tZG93biI+PHBhdGggZD0ibTYgOSA2IDYgNi02Ii8+PC9zdmc+')] bg-no-repeat bg-[center_right_1rem]">
              <option value="">Pilih Kapasitas</option>
              <option value="small" {{ request('kapasitas') == 'small' ? 'selected' : '' }}>Kecil (≤ 40)</option>
              <option value="medium" {{ request('kapasitas') == 'medium' ? 'selected' : '' }}>Sedang (41 - 45)</option>
              <option value="large" {{ request('kapasitas') == 'large' ? 'selected' : '' }}>Besar (&gt; 45)</option>
            </select>
          </div>
          <button type="submit" class="w-full gradient-bg hover:opacity-90 text-white py-3 rounded-lg font-semibold transition shadow-md flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            Cari Bus
          </button>
        </form>
      </div>
    </aside>

    <!-- Hasil Pencarian -->
    <section class="w-full md:w-3/4">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-premium-dark">Hasil Pencarian</h3>
        <div class="flex items-center text-sm text-premium-dark">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
          </svg>
          Menampilkan {{ $buses->count() }} hasil
        </div>
      </div>

      <div id="busList" class="space-y-6">
        @forelse ($buses as $bus)
          <div class="premium-card p-6 rounded-xl shadow-premium flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border border-premium-secondary border-opacity-20">
            <div class="flex-1">
              <div class="flex items-start justify-between">
                <div>
                  <h4 class="text-xl font-bold text-premium-dark">{{ $bus->nama_bus }}</h4>
                  <div class="flex items-center mt-1 text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <div>
                <p class="text-xs text-gray-500">Jadwal Keberangkatan</p>
                <p class="font-medium">
                  {{ $bus->jadwal_berangkat }}
                  <span class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-2 py-1 rounded ml-2">
                    {{ \Carbon\Carbon::parse($bus->jam_berangkat)->format('H:i') }} WIB
                  </span>
                </p>
              </div>
                  </div>
                </div>
                <div class="bg-premium-primary bg-opacity-10 text-premium-primary text-xs font-bold px-3 py-1 rounded-full">
                  {{ $bus->kapasitas }} Kursi
                </div>
              </div>

              <div class="flex items-center space-x-2">
  <!-- Asal -->
  <div>
    <p class="text-xs text-gray-500">Asal</p>
    <p class="font-medium">{{ $bus->asal }}</p>
  </div>

  <!-- Ikon panah -->
  <div>
    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
    </svg>
  </div>

  <!-- Tujuan -->
  <div>
    <p class="text-xs text-gray-500">Tujuan</p>
    <p class="font-medium">{{ $bus->tujuan }}</p>
  </div>
</div>

              <p class="text-premium-primary text-2xl font-bold mt-4">Rp {{ number_format($bus->harga_tiket, 0, ',', '.') }}</p>
            </div>
            <button class="gradient-bg hover:opacity-90 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md flex items-center" onclick="openPopup('{{ $bus->asal }}', '{{ $bus->tujuan }}', '{{ number_format($bus->harga_tiket, 0, ',', '.') }}', '{{ $bus->id_bus }}', '{{ $bus->harga_tiket }}')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
              </svg>
              Pilih Kursi
            </button>
          </div>
        @empty
          <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h4 class="mt-4 text-lg font-medium text-premium-dark">Tidak ada bus ditemukan</h4>
            <p class="mt-1 text-gray-600">Coba ubah filter pencarian Anda</p>
          </div>
        @endforelse
      </div>
    </section>
  </main>

  <!-- Premium Popup -->
  <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow-xl relative transform transition-all duration-300 scale-95 opacity-0" id="popupContent">
      <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-500 hover:text-premium-primary transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <h2 class="text-2xl font-bold text-center text-premium-dark mb-2">Pilih Tempat Duduk</h2>
      <div class="w-20 h-1 bg-premium-primary mx-auto mb-6 rounded-full"></div>

      <div id="infoTiket" class="bg-premium-light p-4 rounded-lg mb-6 grid grid-cols-2 gap-4 text-sm">
        <!-- Info will be filled by JS -->
      </div>

      <div id="seatContainer" class="grid grid-cols-4 gap-4 mb-8">
        <!-- Kursi dimuat oleh JS -->
      </div>

      <div class="flex space-x-4">
        <a id="confirmPayment" href="#" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 rounded-lg font-semibold transition shadow-md text-center flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
          </svg>
          Konfirmasi Pembayaran
        </a>
        <button onclick="closePopup()" class="flex-1 bg-premium-dark hover:bg-gray-800 text-white py-3 rounded-lg font-semibold transition shadow-md flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
          Batalkan
        </button>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script>
    function openPopup(asal, tujuan, harga, idBus) {
      const infoContainer = document.getElementById('infoTiket');
      infoContainer.innerHTML = `
        <div>
          <p class="text-xs text-gray-500">Asal</p>
          <p class="font-medium">${asal}</p>
        </div>
        <div>
          <p class="text-xs text-gray-500">Tujuan</p>
          <p class="font-medium">${tujuan}</p>
        </div>
        <div>
          <p class="text-xs text-gray-500">Harga</p>
          <p class="font-medium text-premium-primary">Rp ${harga}</p>
        </div>
        <div>
          <p class="text-xs text-gray-500">ID Bus</p>
          <p class="font-medium">${idBus}</p>
        </div>
      `;

      const seatContainer = document.getElementById('seatContainer');
      seatContainer.innerHTML = `
        <div class="col-span-4 flex justify-center py-8">
          <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-premium-primary"></div>
        </div>
      `;

     fetch(`/kursi/${idBus}`)
  .then(res => res.json())
  .then(data => {
    seatContainer.innerHTML = "";
    if (data.length === 0 || data.message) {
      seatContainer.innerHTML = `
        <div class="col-span-4 text-center py-8 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Tidak ada kursi tersedia
        </div>
      `;
    } else {
      data.forEach(kursi => {
        const seatDiv = document.createElement('div');
        seatDiv.className = "flex flex-col items-center";

        const input = document.createElement('input');
        input.type = 'checkbox';
        input.id = `seat-${kursi.nomor}`;
        input.name = 'seat';
        input.value = kursi.nomor;
        input.className = "seat-checkbox hidden";

        // Kursi yang sudah terisi dari tabel pembayaran akan di-disable
        if (kursi.status === 'terisi') {
          input.disabled = true;
        } else {
          input.addEventListener('change', updateConfirmLink);
        }

        const label = document.createElement('label');
        label.htmlFor = `seat-${kursi.nomor}`;
        label.className = `seat-label w-12 h-12 flex items-center justify-center rounded-lg cursor-pointer transition ${
          kursi.status === 'terisi'
            ? 'bg-gray-300 text-gray-400 cursor-not-allowed'
            : 'bg-premium-light border-2 border-premium-primary text-premium-dark hover:bg-premium-primary hover:bg-opacity-20'
        }`;
        label.textContent = kursi.nomor;

        seatDiv.appendChild(input);
        seatDiv.appendChild(label);
        seatContainer.appendChild(seatDiv);
      });
    }
  });


      // Show popup with animation
      document.getElementById('popup').classList.remove('hidden');
      setTimeout(() => {
        document.getElementById('popupContent').classList.remove('scale-95', 'opacity-0');
        document.getElementById('popupContent').classList.add('scale-100', 'opacity-100');
      }, 10);

      function updateConfirmLink() {
        const checkedSeats = document.querySelectorAll('input[name="seat"]:checked');
        const selectedSeats = Array.from(checkedSeats).map(cb => cb.value).join(',');
        document.getElementById('confirmPayment').href = `/isidatapesan?bus=${idBus}&seat=${selectedSeats}&asal=${encodeURIComponent(asal)}&tujuan=${encodeURIComponent(tujuan)}&harga=${encodeURIComponent(harga)}`;
      }
    }

    function closePopup() {
      document.getElementById('popupContent').classList.remove('scale-100', 'opacity-100');
      document.getElementById('popupContent').classList.add('scale-95', 'opacity-0');
      setTimeout(() => {
        document.getElementById('popup').classList.add('hidden');
      }, 300);
    }
  </script>

  <!-- Premium Footer -->
  <footer class="gradient-bg text-white py-12 mt-16">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4 flex items-center">
            <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="w-10 h-10 object-contain">
            TiketPremium
          </h3>
          <p class="text-sm opacity-80">Solusi pemesanan tiket bus terbaik dengan pengalaman premium.</p>
        </div>
        <div>
          <h4 class="font-bold mb-4">Perusahaan</h4>
          <ul class="space-y-2 text-sm opacity-80">
            <li><a href="#" class="hover:underline">Tentang Kami</a></li>
            <li><a href="#" class="hover:underline">Karir</a></li>
            <li><a href="#" class="hover:underline">Blog</a></li>
            <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-bold mb-4">Layanan</h4>
          <ul class="space-y-2 text-sm opacity-80">
            <li><a href="#" class="hover:underline">Pemesanan Tiket</a></li>
            <li><a href="#" class="hover:underline">Panduan Perjalanan</a></li>
            <li><a href="#" class="hover:underline">FAQ</a></li>
            <li><a href="#" class="hover:underline">Hubungi Kami</a></li>
          </ul>
        </div>
        <!-- Kontak -->
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
      <div class="border-t border-white border-opacity-20 mt-8 pt-8 text-center text-sm opacity-80">
        <p>&copy; 2025 TiketPremium. All Rights Reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>
