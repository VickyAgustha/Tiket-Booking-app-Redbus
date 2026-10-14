<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Metadata dasar -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Judul halaman -->
  <title>Pemesanan Tiket</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Gaya kustom tambahan -->
  <style>
    body {
      background: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
    }

    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .soft-shadow {
      box-shadow:
        0 10px 20px rgba(0, 0, 0, 0.1),
        0 6px 6px rgba(0, 0, 0, 0.1);
    }

    .neumorph-input {
      background: #f3f4f6;
      border-radius: 10px;
      padding: 0.5rem 1rem;
      box-shadow:
        inset 4px 4px 8px #d1d9e6,
        inset -4px -4px 8px #ffffff;
    }
  </style>
</head>

<body class="min-h-screen font-sans text-gray-800">


  <!-- Navbar -->
<nav class="flex justify-between items-center px-8 py-4 bg-white bg-opacity-70 backdrop-blur-lg shadow-md sticky top-0 z-10">
  <!-- Kiri: Logo dan menu -->
  <div class="flex items-center gap-x-8">
    <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="w-10 h-10 object-contain" />

    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-800 hover:text-orange-600 transition">Beranda</a>
    <a href="#" class="text-sm font-medium text-gray-800 hover:text-orange-600 transition">Perjalanan</a>
    <a href="#" class="text-sm font-medium text-gray-800 hover:text-orange-600 transition">Tentang Kami</a>
    <a href="#" class="text-sm font-medium text-gray-800 hover:text-orange-600 transition">Bantuan</a>
  </div>

  <!-- Kanan: Tombol Logout -->
  <a href="{{ route('login') }}" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-full shadow-md text-sm font-semibold transition">
    Logout
  </a>
</nav>


  <!-- Kontainer Pemesanan -->
  <main class="flex flex-col items-center justify-center min-h-screen px-4 py-16">
    <div class="glass soft-shadow p-10 w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-10">

      <!-- Form Pemesanan -->
      <div>
        <h2 class="text-3xl font-bold text-orange-700 mb-8">Data Pemesan</h2>

        <div class="mb-5">
          <p class="text-sm text-gray-600 font-semibold">Asal</p>
          <p id="asalText" class="neumorph-input mt-1">Memuat...</p>
        </div>

        <div class="mb-5">
          <p class="text-sm text-gray-600 font-semibold">Tujuan</p>
          <p id="tujuanText" class="neumorph-input mt-1">Memuat...</p>
        </div>

        <input type="hidden" name="id_user" value="{{ Auth::id() }}">
        <input type="hidden" name="id_bus" id="inputIdBus">

        <div class="mb-5">
          <label class="text-gray-700 font-semibold block mb-1">Nama Lengkap</label>
          <input type="text" id="namaLengkap" class="neumorph-input w-full" placeholder="Contoh: Andi Wijaya" />
        </div>

        <div>
          <label class="text-gray-700 font-semibold block mb-1">Nomor Ponsel</label>
          <input type="text" id="nomorPonsel" class="neumorph-input w-full" placeholder="0812xxxxxxx" />
        </div>
      </div>

      <!-- Rincian Harga -->
      <div class="bg-white bg-opacity-60 backdrop-blur-xl p-6 rounded-2xl soft-shadow">
        <h3 class="text-xl font-bold text-orange-700 mb-4">Rincian Pembayaran</h3>

        <div class="text-gray-700 mb-2">
          <p><span id="jumlahPenumpang">1</span> Executive Penumpang
            <span class="float-right font-semibold" id="hargaPerPenumpang">IDR 0</span>
          </p>
        </div>
        <hr class="my-3" />

        <p id="seats-info" class="text-center font-semibold text-gray-600 mb-3"></p>

        <div class="font-bold text-gray-900 text-lg mb-5">
          Total Pembayaran
          <span id="price" class="float-right">IDR 0</span>
        </div>

        <div class="mb-5">
          <label class="block text-gray-700 font-semibold mb-1">Pilih Diskon</label>
          <select id="discount" class="neumorph-input w-full" onchange="updateTotal()">
            <option value="none">Tanpa Diskon</option>
            @if($punyaDiskon)
              <option value="10">Diskon 10%</option>
            @endif
          </select>
        </div>

        <button onclick="redirectToPemesanan()" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-full font-semibold shadow-md transition transform hover:scale-105">
          Proses Pembayaran
        </button>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-white text-center bg-orange-600 py-5">
    &copy; 2025 BusTech Transport. Semua Hak Dilindungi.
  </footer>

  <!-- Script -->
  <script>
    let originalPrice = 0;

    const urlParams = new URLSearchParams(window.location.search);

    function getQueryParam(param) {
      return urlParams.get(param);
    }

    function formatPrice(price) {
      return 'IDR ' + price.toLocaleString('id-ID');
    }

    function updateTotal() {
      const discount = document.getElementById("discount").value;
      let total = originalPrice;

      if (discount === "10") {
        total = originalPrice * 0.9;
      }

      document.getElementById("price").textContent = formatPrice(Math.round(total));
    }

    function redirectToPemesanan() {
      let namaLengkap = document.getElementById("namaLengkap").value.trim();
      let nomorPonsel = document.getElementById("nomorPonsel").value.trim();

      if (!namaLengkap || !nomorPonsel) {
        alert("Nama lengkap dan nomor ponsel wajib diisi!");
        return;
      }

      let asal = encodeURIComponent(document.getElementById("asalText").textContent);
      let tujuan = encodeURIComponent(document.getElementById("tujuanText").textContent);
      let totalPayment = document.getElementById("price").textContent.replace('IDR ', '').replace(/\./g, '');
      let discount = encodeURIComponent(document.getElementById("discount").value);
      let idUser = encodeURIComponent(document.querySelector('[name="id_user"]').value);
      let idBus = encodeURIComponent(document.querySelector('[name="id_bus"]').value);
      let seatString = encodeURIComponent(document.getElementById("seats-info").textContent.split(":")[1]?.trim() || "");

      window.location.href = `{{ url('/pemesanan') }}?nama=${namaLengkap}&nomor=${nomorPonsel}&asal=${asal}&tujuan=${tujuan}&total_payment=${totalPayment}&discount=${discount}&id_user=${idUser}&id_bus=${idBus}&seat=${seatString}`;
    }

    document.addEventListener("DOMContentLoaded", function () {
      const asal = getQueryParam("asal");
      const tujuan = getQueryParam("tujuan");
      const harga = getQueryParam("harga");
      const idBus = getQueryParam("bus");
      const seatString = getQueryParam("seat") || "";
      const jumlahKursi = seatString.split(",").filter(Boolean).length;

      if (asal) document.getElementById("asalText").textContent = asal;
      if (tujuan) document.getElementById("tujuanText").textContent = tujuan;
      if (idBus) document.getElementById("inputIdBus").value = idBus;

      if (harga) {
        const hargaPerKursi = parseInt(harga.replace(/\D/g, ''));
        originalPrice = hargaPerKursi * jumlahKursi;

        document.getElementById("hargaPerPenumpang").textContent = formatPrice(hargaPerKursi);
        document.getElementById("jumlahPenumpang").textContent = jumlahKursi;
        document.getElementById("price").textContent = formatPrice(originalPrice);
      }

      const seatsInfo = document.getElementById('seats-info');
      if (seatString) {
        seatsInfo.textContent = `Nomor Kursi: ${seatString}`;
      } else {
        seatsInfo.textContent = 'Tidak ada kursi yang dipilih.';
      }

      updateTotal();
    });
  </script>
</body>
</html>
