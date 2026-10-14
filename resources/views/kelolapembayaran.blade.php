<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pembayaran</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .navbar {
            background-color: #f97316;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .search-container {
            margin: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-box {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .kelola-btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: default;
        }

        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e5e7eb;
        }

        h2 {
            margin: 40px auto 10px auto;
            width: 95%;
            font-size: 20px;
        }

        .footer {
            background-color: #f97316;
            color: white;
            padding: 30px 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .footer img {
            height: 80px;
        }

        .footer p {
            margin: 4px 0;
        }

        .social-icons i {
            margin-right: 10px;
            font-size: 18px;
        }

        .contact p {
            margin: 0;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .confirm-btn, .reject-btn, .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .confirm-btn {
            background-color: #4CAF50;
            color: white;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
        }

        .edit-btn {
            background-color: #2196F3;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .confirm-btn:hover {
            background-color: #45a049;
        }

        .reject-btn:hover {
            background-color: #d32f2f;
        }

        .edit-btn:hover {
            background-color: #0b7dda;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        /* Status Bayar Styles */
        .status-berhasil {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-align: center;
        }

        .status-pending {
            background-color: #fd7e14;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-align: center;
        }

        /* Notifikasi */
        .alert {
            width: 95%;
            margin: 20px auto;
            padding: 10px 15px;
            border-radius: 4px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    {{-- Notifikasi Sukses dan Error --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="navbar">
        <div style="display: flex; align-items: center;">
            <img src="/logo.png" alt="Logo" style="height: 40px; margin-right: 15px;">
            <a href="#">Beranda</a>
            <a href="#">Perjalanan</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Bantuan</a>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 24px; height: 16px; background-color: red; border: 1px solid white;"></div>
            <strong>Hi, Admin</strong>
        </div>
    </div>

    <div class="search-container">
        <input type="text" class="search-box" placeholder="Masukkan Nama">
        <button class="kelola-btn">* Kelola data</button>
    </div>

    <h2>Data Pembayaran</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>ID Order</th>
                <th>Nomor Kursi</th>
                <th>ID Bus</th>
                <th>Bukti Bayar</th>
                <th>Tanggal Bayar</th>
                <th>Status Bayar</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->id_user }}</td>
                    <td>{{ $row->id_order }}</td>
                    <td>{{ $row->nomor_kursi }}</td>
                    <td>{{ $row->id_bus }}</td>
                    <td>
                        @if($row->bukti_bayar)
                            <img src="{{ asset('uploads/' . $row->bukti_bayar) }}" width="100">
                        @else
                            Tidak ada bukti
                        @endif
                    </td>
                    <td>{{ $row->tgl_bayar }}</td>
                    <td>
                        @if($row->status_bayar == 'berhasil')
                            <span class="status-berhasil">{{ $row->status_bayar }}</span>
                        @else
                            <span class="status-pending">{{ $row->status_bayar }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($row->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <div class="action-buttons">
                            <form action="{{ route('pembayaran.konfirmasi', $row->id_order) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="confirm-btn">Konfirmasi</button>
                            </form>
                            <button class="reject-btn" onclick="rejectPayment('{{ $row->id_order }}')">Tolak</button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Data User</h2>

    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id_user }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->no_telpon }}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn" onclick="editUser('{{ $user->id_user }}')">Edit</button>
                            <button class="delete-btn" onclick="deleteUser('{{ $user->id_user }}')">Hapus</button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Tidak ada data pengguna.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div>
            <img src="/bus-logo.png" alt="Logo Bus">
        </div>
        <div>
            <p><strong>Booking Online</strong></p>
            <p>Pelayanan Prima</p>
            <p>Berita Terbaru</p>
            <p>Pencarian Agen</p>
        </div>
        <div>
            <p><strong>Sejarah</strong></p>
            <p>Visi Misi</p>
            <p>FAQ</p>
            <p>Esensi Layanan</p>
        </div>
        <div>
            <div class="social-icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="contact">
                <p>Contact Center</p>
                <p>0212-1234567</p>
            </div>
        </div>
    </div>

    <script>
        function rejectPayment(id_order) {
            if (confirm('Apakah Anda yakin ingin menolak pembayaran ini?')) {
                // Kirim request untuk menghapus data pembayaran
                window.location.href = '/pembayaran/tolak/' + id_order;
            }
        }
    </script>

</body>
</html>
