<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perjalanan - BUSTECH</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
  <style>
    /* Custom warna */
    :root {
      --primary-color: #f97316; /* orange-500 */
      --primary-dark: #c2410c;  /* orange-700 */
      --secondary-color: #fbbf24; /* yellow-400 */
      --dark-color: #1f2937; /* gray-800 */
      --footer-bg: #1e293b; /* slate-800 */
      --footer-text: #cbd5e1; /* slate-300 */
    }
  </style>
</head>
<body class="bg-orange-50 min-h-screen flex flex-col font-sans text-gray-800">

  <!-- Marquee -->
  <div class="bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-300 py-2 shadow-md">
    <marquee class="text-sm font-semibold text-black tracking-wide" scrollamount="6">
      Nikmati perjalananmu dengan BusTech 🚍
    </marquee>
  </div>

  <!-- Navigation -->
  <nav class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300 border-b border-orange-300">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Branding -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="w-10 h-10 object-contain">
                <span class="text-xl font-bold text-[var(--primary-color)] hidden sm:inline">BUSTECH</span>
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
                <div class="flex items-center bg-[var(--primary-color)] text-white px-3 py-1 rounded-full shadow-sm">
                    <i class="far fa-clock mr-2"></i>
                    <span id="live-clock" class="font-mono font-medium text-sm">00:00:00</span>
                </div>

                @auth
                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-[var(--primary-color)] flex items-center justify-center text-white shadow-sm">
                            <i class="fas fa-user text-sm"></i>
                        </div>
                        <span class="text-sm font-medium">{{ Auth::user()->nama }}</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil Saya</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pesanan</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-[var(--primary-color)] transition-colors duration-200">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-[var(--primary-color)] hover:bg-[var(--primary-dark)] text-white px-4 py-2 rounded-full text-sm font-bold transition-all duration-200 shadow-sm hover:shadow-md">
                        Daftar
                    </a>
                </div>
                @endauth
            </div>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden flex items-center">
            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[var(--primary-color)] focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
  </nav>
  <!-- Main Content -->
  <main class="flex-1 py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-4xl font-bold text-center text-orange-600 mb-10">Tiket Perjalanan Anda</h1>
      <div class="overflow-x-auto bg-white rounded-lg shadow-xl ring-1 ring-orange-200">
        <table class="min-w-full text-sm md:text-base">
          <thead class="bg-orange-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left">Nama Bus</th>
              <th class="py-3 px-4 text-left">Tujuan</th>
              <th class="py-3 px-4 text-left">Asal</th>
              <th class="py-3 px-4 text-left">Tanggal</th>
              <th class="py-3 px-4 text-left">Jam</th>
              <th class="py-3 px-4 text-left">Nomor Kursi</th>
              <th class="py-3 px-4 text-left">Total</th>
              <th class="py-3 px-4 text-left">Status</th>
              <th class="py-3 px-4 text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tiket as $ticket)
              <tr class="border-t hover:bg-orange-50 transition">
                <td class="py-3 px-4">{{ $ticket->bus->nama_bus }}</td>
                <td class="py-3 px-4">{{ $ticket->bus->tujuan }}</td>
                <td class="py-3 px-4">{{ $ticket->bus->asal }}</td>
                <td class="py-3 px-4">{{ \Carbon\Carbon::parse($ticket->jadwal_berangkat)->format('d-m-Y') }}</td>
                <td class="py-3 px-4">{{ \Carbon\Carbon::parse($ticket->jadwal_berangkat)->format('H:i') }}</td>
                <td class="py-3 px-4">{{ $ticket->nomor_kursi }}</td>
                <td class="py-3 px-4 font-semibold text-green-600">
                  Rp {{ number_format($ticket->total_bayar, 0, ',', '.') }}
                </td>
                <td class="py-3 px-4 capitalize">{{ $ticket->status }}</td>
                <td class="py-3 px-4">
                  <div class="flex flex-col space-y-2">
                    <button class="ubah-jadwal-btn bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded"
                            data-id_tiket="{{ $ticket->id_tiket }}"
                           data-jadwal_berangkat="{{ \Carbon\Carbon::parse($ticket->jadwal_berangkat)->toIso8601String() }}">
                      ✏️ Ubah Jadwal
                    </button>
                  @foreach ($tiket as $item)
  <button onclick="batalinTiket({{ $item->id_tiket }})" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
    ❌ Batalin
  </button>
@endforeach
                    <button class="sudah-sampai-btn bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded"
                            data-id_tiket="{{ $ticket->id_tiket }}">
                      ✅ Sudah Sampai
                    </button>
                    <button class="download-tiket-btn bg-purple-600 hover:bg-purple-700 text-white py-1 px-3 rounded" 
        data-id-tiket="{{ $ticket->id_tiket }}">
  <i class="fas fa-file-pdf mr-1"></i> Download PDF
</button>

                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Modal Ubah Jadwal -->
  <div id="modal-ubah-jadwal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-2xl p-6 w-96">
      <h2 class="text-xl font-bold mb-4 text-center">Ubah Jam Berangkat</h2>
      <form id="form-ubah-jadwal">
        @csrf
        <input type="hidden" name="id_tiket" id="id_tiket" />
        <label for="jam_berangkat" class="block mb-2 font-semibold">Jam Baru:</label>
        <input type="time" id="jam_berangkat" name="jam_berangkat" required class="w-full p-2 border border-gray-300 rounded mb-4"/>
        <div class="flex justify-end space-x-3">
          <button type="button" id="btn-batal" class="px-4 py-2 border border-gray-400 rounded hover:bg-gray-100">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
      </form>
    </div>
  </div>


   <!-- Footer -->

   <footer class="bg-[var(--footer-bg)] text-[var(--footer-text)] pt-16 pb-8 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
        <!-- Brand -->
        <div>
          <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" class="h-12 mb-4">
          <p class="mb-4 leading-relaxed text-sm text-[var(--footer-text)]">
            BUSTECH memberikan pengalaman perjalanan bus terbaik dengan kenyamanan dan keamanan terjamin.
          </p>
          <div class="flex space-x-3 mt-4">
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[var(--primary-color)] transition text-white">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[var(--primary-color)] transition text-white">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[var(--primary-color)] transition text-white">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[var(--primary-color)] transition text-white">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>

        <!-- Perusahaan -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Perusahaan</h3>
          <ul class="space-y-2 text-sm text-[var(--footer-text)]">
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
          <ul class="space-y-2 text-sm text-[var(--footer-text)]">
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
          <ul class="text-sm text-[var(--footer-text)] space-y-2">
            <li><i class="fas fa-map-marker-alt mr-2"></i>Jl. Dr Soetomo, Yogyakarta</li>
            <li><i class="fas fa-phone mr-2"></i>+62 812 3456 7890</li>
            <li><i class="fas fa-envelope mr-2"></i>support@bustech.co.id</li>

          </ul>
        </div>
      </div>

      <div class="border-t border-gray-700 pt-6 text-center text-sm">
        &copy; {{ date('Y') }} BUSTECH. Semua hak cipta dilindungi.
      </div>
    </div>
  </footer>

  <!-- Script Jam & Jadwal -->
  <script>
    function updateClock() {
      const now = new Date();
      const h = String(now.getHours()).padStart(2, '0');
      const m = String(now.getMinutes()).padStart(2, '0');
      const s = String(now.getSeconds()).padStart(2, '0');
      document.getElementById('live-clock').textContent = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    document.addEventListener('DOMContentLoaded', function () {
      const ubahBtns = document.querySelectorAll('.ubah-jadwal-btn');
      const modal = document.getElementById('modal-ubah-jadwal');
      const form = document.getElementById('form-ubah-jadwal');
      const idTiketInput = document.getElementById('id_tiket');
      const jamInput = document.getElementById('jam_berangkat');
      const btnBatal = document.getElementById('btn-batal');

      document.querySelectorAll('.sudah-sampai-btn').forEach(button => {
        button.addEventListener('click', function () {
          const idTiket = this.dataset.id_tiket;
          if (confirm('Apakah Anda yakin perjalanan ini sudah selesai?')) {
            fetch("{{ route('proses.selesai') }}", {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
              },
              body: JSON.stringify({ id_tiket: idTiket })
            })
            .then(response => response.json())
            .then(data => {
              alert(data.message);
              if (data.success) location.reload();
            })
            .catch(error => {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memproses.');
            });
          }
        });
      });

      ubahBtns.forEach(button => {
       button.addEventListener('click', function () {
  const idTiket = this.dataset.id_tiket;
  const jadwalBerangkat = new Date(this.dataset.jadwal_berangkat);
  const now = new Date();
  const diffMs = jadwalBerangkat - now;
  const diffHours = diffMs / (1000 * 60 * 60);

  if (diffHours < 6) {
    alert('Jadwal tidak bisa diubah karena kurang dari 6 jam sebelum keberangkatan.');
    return;
  }

  const jam = jadwalBerangkat.toISOString().substring(11, 16);
  idTiketInput.value = idTiket;
  jamInput.value = jam;
  modal.classList.remove('hidden');
});

      });

      btnBatal.addEventListener('click', () => modal.classList.add('hidden'));

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        const idTiket = formData.get('id_tiket');
        const jamBaru = formData.get('jam_berangkat');
        const tanggal = new Date().toISOString().split('T')[0];

        fetch("{{ route('ubah.jam') }}", {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: new URLSearchParams({
            id_tiket: idTiket,
            tanggal: tanggal,
            jam_berangkat: jamBaru
          })
        })
        .then(response => response.json())
        .then(data => {
          alert(data.success ? 'Jadwal berhasil diubah.' : data.message || 'Gagal mengubah jadwal.');
          if (data.success) location.reload();
        })
        .catch(error => {
          console.error(error);
          alert('Terjadi kesalahan saat mengubah jadwal.');
        });
      });
    });
    function batalinTiket(idTiket) {
  if (!confirm("Yakin ingin membatalkan tiket ini?")) return;

  fetch('/batal-tiket', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      id_tiket: idTiket
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(`Tiket dibatalkan. Potongan: ${data.potongan}, Refund: Rp${data.refund}`);
      location.reload(); // refresh halaman
    } else {
      alert(data.message);
    }
  })
  .catch(err => {
    console.error(err);
    alert("Terjadi kesalahan saat membatalkan tiket.");
  });
}
     // PDF Download Functionality
  document.querySelectorAll('.download-tiket-btn').forEach(button => {
    button.addEventListener('click', function() {
      const idTiket = this.dataset.idTiket;
      
      // Create a form dynamically
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = "{{ route('download.tiket') }}";
      form.target = '_blank';
      
      // Add CSRF token
      const csrfToken = document.createElement('input');
      csrfToken.type = 'hidden';
      csrfToken.name = '_token';
      csrfToken.value = '{{ csrf_token() }}';
      form.appendChild(csrfToken);
      
      // Add ticket ID
      const ticketInput = document.createElement('input');
      ticketInput.type = 'hidden';
      ticketInput.name = 'id_tiket';
      ticketInput.value = idTiket;
      form.appendChild(ticketInput);
      
      // Append to body and submit
      document.body.appendChild(form);
      form.submit();
      document.body.removeChild(form);
    });
  });
  </script>

</body>
</html>
