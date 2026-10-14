<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Bustech Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <style>
        :root {
            --primary-color: #FF6B35;
            --secondary-color: #004E89;
            --accent-color: #FFD166;
            --dark-color: #2C3E50;
            --light-color: #F7F9FC;
        }
        
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Navbar Premium */
        .navbar-premium {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(to right, #ffffff, var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: var(--light-color);
            color: var(--primary-color) !important;
        }
        
        /* Main Content */
        .main-container {
            flex: 1;
            padding: 2rem 0;
        }
        
        /* Form Premium */
        .form-container-premium {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }
        
        .form-container-premium:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .form-container-premium h5 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .form-container-premium h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }
        
        .form-control {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 53, 0.25);
        }
        
        /* Button Premium */
        .btn-premium {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
            color: white;
        }
        
        .sidebar-btn {
            width: 100%;
            margin-bottom: 1rem;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-btn i {
            margin-right: 8px;
        }
        
        .sidebar-btn:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 78, 137, 0.3);
        }
        
        /* Stats Card */
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stats-card p {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .stats-card .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        /* Footer Premium */
        .footer-premium {
            background: linear-gradient(135deg, var(--dark-color), #1a2a3a);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 3rem;
        }
        
        .footer-column h5 {
            color: var(--accent-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-column h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--accent-color);
        }
        
        .footer-column ul li a {
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .footer-column ul li a:hover {
            color: var(--accent-color);
            transform: translateX(5px);
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .contact-info i {
            color: var(--accent-color);
            margin-right: 1rem;
            font-size: 1.2rem;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 0.8rem;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: var(--accent-color);
            color: var(--dark-color);
            transform: translateY(-5px);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .form-container-premium {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar Premium -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-premium">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-bus"></i>Bustech
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-route me-1"></i> Perjalanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle me-1"></i> Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-question-circle me-1"></i> Bantuan</a>
                </li>
            </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                    <div class="me-2">
                        <div class="fw-bold">Hi, Admin</div>
                        <small class="text-white-50">Super Admin</small>
                    </div>
                    <i class="fas fa-user-circle fs-4"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/login"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Konten Utama -->
<div class="container main-container">
    <div class="row g-4">
        <div class="col-lg-8 animate-fade">
            <div class="form-container-premium">
                <h5><i class="fas fa-bus me-2"></i> Tambah Armada Baru</h5>
                <form action="{{ route('admin.storeArmada') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Asal</label>
                            <input type="text" name="asal" class="form-control" placeholder="Pilih Asal" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" placeholder="Pilih Tujuan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jadwal Berangkat</label>
                            <input type="date" name="jadwal" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jam Berangkat</label>
                            <input type="time" name="jam_berangkat" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Bus</label>
                            <input type="text" name="nama_bus" class="form-control" placeholder="Masukkan Nama Bus" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan Kapasitas" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Tiket</label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Tiket" required>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-premium w-100">
                                <i class="fas fa-plus-circle me-2"></i> Tambahkan Armada
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4 animate-fade" style="animation-delay: 0.2s;">
            <a href="{{ route('admin.armada') }}" class="sidebar-btn">
                <i class="fas fa-edit me-2"></i> Edit Armada
            </a>
            <a href="{{ route('kelola.pembayaran') }}" class="sidebar-btn">
                <i class="fas fa-money-bill-wave me-2"></i> Kelola Pembayaran
            </a>
            <button class="sidebar-btn">
                <i class="fas fa-users-cog me-2"></i> Kelola Pengguna
            </button>
            
            <div class="stats-card mt-4">
                <p>Total Armada</p>
                <div class="stat-number">24</div>
                <small class="text-muted">Update terakhir: Hari ini</small>
            </div>
            
            <div class="stats-card mt-3">
                <p>Pembayaran Hari Ini</p>
                <div class="stat-number">18</div>
                <small class="text-muted">Transaksi sukses</small>
            </div>
        </div>
    </div>
</div>

<!-- Footer Premium -->
<footer class="footer-premium">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="footer-column">
                    <h5>Layanan</h5>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Booking Online</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Pelayanan Prima</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Berita Terbaru</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Pencarian Agen</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-column">
                    <h5>Tentang Kami</h5>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Sejarah</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Visi Misi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Armada Kami</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Mitra Kerja</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-column">
                    <h5>Bantuan</h5>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> FAQ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Cara Pemesanan</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Syarat & Ketentuan</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-column">
                    <h5>Hubungi Kami</h5>
                    <div class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <span>0212-1234567</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>info@bustech.com</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Transportasi No. 123, Jakarta</span>
                    </div>
                    
                    <div class="mt-3">
                        <h6 class="mb-2">Follow Kami</h6>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p class="mb-0">&copy; 2023 Bustech Transport. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 3000,
            background: 'var(--light-color)',
            color: 'var(--dark-color)',
            iconColor: 'var(--primary-color)'
        });
    </script>
@endif
</body>
</html>