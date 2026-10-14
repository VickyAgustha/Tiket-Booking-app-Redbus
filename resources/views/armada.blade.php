<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Armada | Bustech Transport</title>
    
    <!-- Premium Assets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css">
    
    <style>
        :root {
            --primary: #FF6B35;
            --secondary: #004E89;
            --accent: #00A6FB;
            --light: #F7F7FF;
            --dark: #292F36;
            --success: #06D6A0;
            --danger: #EF476F;
            --warning: #FFD166;
            --info: #118AB2;
        }
        
        body {
            background: radial-gradient(circle at top right, #F7F7FF 0%, #E2E2F0 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Premium Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, #FF8C42 100%);
            box-shadow: 0 4px 30px rgba(255, 107, 53, 0.3);
            padding: 0.8rem 2rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: 1px;
            background: linear-gradient(to right, white, #F7F7FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1.2rem !important;
            margin: 0 0.3rem;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }
        
        .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover {
            transform: translateY(-3px);
            color: white !important;
        }
        
        .nav-link:hover:before {
            width: 70%;
        }
        
        /* Premium Main Content */
        .main-container {
            flex: 1;
            padding: 2rem 0;
        }
        
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 78, 137, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 78, 137, 0.15);
        }
        
        .section-title {
            font-weight: 700;
            color: var(--dark);
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
        }
        
        /* Premium Table */
        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.8rem;
        }
        
        .premium-table thead th {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .premium-table tbody tr {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .premium-table tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 78, 137, 0.1);
        }
        
        .premium-table td {
            padding: 1.2rem 1.5rem;
            vertical-align: middle;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .premium-table td:first-child {
            border-left: 1px solid rgba(0, 0, 0, 0.03);
            border-radius: 12px 0 0 12px;
        }
        
        .premium-table td:last-child {
            border-right: 1px solid rgba(0, 0, 0, 0.03);
            border-radius: 0 12px 12px 0;
        }
        
        /* Premium Buttons */
        .btn-premium {
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-premium:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .btn-premium:hover:after {
            opacity: 1;
        }
        
        .btn-premium i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning) 0%, #FFB347 100%);
            color: var(--dark);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger) 0%, #FF6B6B 100%);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success) 0%, #06D6A0 100%);
        }
        
        /* Premium Modal */
        .modal-premium .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 78, 137, 0.2);
        }
        
        .modal-premium .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, #FF8C42 100%);
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }
        
        .modal-premium .modal-title {
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .modal-premium .modal-title i {
            margin-right: 10px;
            font-size: 1.5rem;
        }
        
        .modal-premium .modal-body {
            padding: 2rem;
        }
        
        .modal-premium .form-control {
            border-radius: 8px;
            padding: 0.8rem 1.2rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .modal-premium .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(0, 166, 251, 0.25);
        }
        
        /* Premium Footer */
        .footer-premium {
            background: linear-gradient(135deg, var(--dark) 0%, #1A1A2E 100%);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 4rem;
            position: relative;
        }
        
        .footer-premium:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--accent));
        }
        
        .footer-column h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .footer-column h5:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 3px;
        }
        
        .footer-column ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-column ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-column ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer-column ul li a:hover {
            color: white;
            transform: translateX(8px);
        }
        
        .social-icons-premium {
            display: flex;
            gap: 12px;
            margin-top: 1.5rem;
        }
        
        .social-icons-premium a {
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .social-icons-premium a:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        
        .copyright-premium {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 3rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        
        /* Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .float-animation {
            animation: float 4s ease-in-out infinite;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .dashboard-card {
                padding: 1.5rem;
            }
            
            .premium-table td, .premium-table th {
                padding: 0.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 0.8rem 1rem;
            }
            
            .dashboard-card {
                padding: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<!-- Premium Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-bus me-2"></i>Bustech Transport
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPremium">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarPremium">
            <ul class="navbar-nav me-auto">
                <li class="nav-item animate__animated animate__fadeIn">
                    <a class="nav-link" href="#"><i class="fas fa-home me-1"></i> Beranda</a>
                </li>
                <li class="nav-item animate__animated animate__fadeIn animate__delay-1s">
                    <a class="nav-link" href="#"><i class="fas fa-route me-1"></i> Perjalanan</a>
                </li>
                <li class="nav-item animate__animated animate__fadeIn animate__delay-2s">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle me-1"></i> Tentang Kami</a>
                </li>
                <li class="nav-item animate__animated animate__fadeIn animate__delay-3s">
                    <a class="nav-link" href="#"><i class="fas fa-question-circle me-1"></i> Bantuan</a>
                </li>
            </ul>
            <div class="dropdown animate__animated animate__fadeIn">
                <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                    <div class="me-2">
                        <div class="avatar avatar-sm" style="width: 32px; height: 32px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div>
                        <span>Hi, Admin</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/login"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Premium Main Content -->
<div class="container main-container">
    <div class="dashboard-card animate__animated animate__fadeInUp">
        <h3 class="section-title"><i class="fas fa-bus me-2"></i>Daftar Armada</h3>
        
        <div class="table-responsive">
            <table class="table premium-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-id-card-alt me-1"></i> ID Bus</th>
                        <th><i class="fas fa-bus-alt me-1"></i> Nama Bus</th>
                        <th><i class="fas fa-map-marker-alt me-1"></i> Asal</th>
                        <th><i class="fas fa-map-pin me-1"></i> Tujuan</th>
                        <th><i class="fas fa-users me-1"></i> Kapasitas</th>
                        <th><i class="fas fa-ticket-alt me-1"></i> Harga Tiket</th>
                        <th><i class="fas fa-cogs me-1"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($busList as $index => $bus)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $index * 0.05 }}s">
                        <td>
                            <span class="badge rounded-pill" style="background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);">
                                {{ $bus->id_bus }}
                            </span>
                        </td>
                        <td><strong>{{ $bus->nama_bus }}</strong></td>
                        <td>{{ $bus->asal }}</td>
                        <td>{{ $bus->tujuan }}</td>
                        <td>{{ $bus->kapasitas }} <small class="text-muted">kursi</small></td>
                        <td class="text-success fw-bold">Rp {{ number_format($bus->harga_tiket, 0, ',', '.') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm btn-premium btn-edit" 
                                    data-id_bus="{{ $bus->id_bus }}"
                                    data-nama_bus="{{ $bus->nama_bus }}"
                                    data-asal="{{ $bus->asal }}"
                                    data-tujuan="{{ $bus->tujuan }}"
                                    data-kapasitas="{{ $bus->kapasitas }}"
                                    data-harga_tiket="{{ $bus->harga_tiket }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('bus.destroy', $bus->id_bus) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-premium" onclick="return confirmDelete()">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Premium Add Seat Button -->
        <div class="text-end mt-4">
            <button class="btn btn-primary btn-premium float-animation" data-bs-toggle="modal" data-bs-target="#addSeatModal">
                <i class="fas fa-plus-circle me-1"></i> Tambah Kursi
            </button>
        </div>
    </div>
</div>

<!-- Premium Add Seat Modal -->
<div class="modal fade modal-premium" id="addSeatModal" tabindex="-1" aria-labelledby="addSeatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('kursi.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-chair me-2"></i>Tambah Kursi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-bus me-2"></i> ID Bus</label>
                        <input type="number" class="form-control" name="id_bus" required>
                    </div>
                    <div>
                        <label class="form-label"><i class="fas fa-sort-numeric-up me-2"></i> Nomor Kursi</label>
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="text" class="form-control mb-3" name="nomor[]" placeholder="Nomor Kursi {{ $i }}" required>
                        @endfor
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-premium" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Tutup
                    </button>
                    <button type="submit" class="btn btn-success btn-premium">
                        <i class="fas fa-save me-1"></i> Simpan Kursi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Premium Edit Modal -->
<div class="modal fade modal-premium" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('bus.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id_bus" id="edit-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Data Bus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-bus me-2"></i> Nama Bus</label>
                        <input type="text" class="form-control" name="nama_bus" id="edit-nama_bus" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-map-marker-alt me-2"></i> Asal</label>
                        <input type="text" class="form-control" name="asal" id="edit-asal" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-map-pin me-2"></i> Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="edit-tujuan" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-users me-2"></i> Kapasitas</label>
                        <input type="number" class="form-control" name="kapasitas" id="edit-kapasitas" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-ticket-alt me-2"></i> Harga Tiket</label>
                        <input type="number" class="form-control" name="harga_tiket" id="edit-harga_tiket" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-premium">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Premium Footer -->
<footer class="footer-premium">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 footer-column mb-4">
                <h5><i class="fas fa-bus me-2"></i>Bustech Transport</h5>
                <p class="mt-3" style="color: rgba(255, 255, 255, 0.7); line-height: 1.7;">
                    Menyediakan layanan transportasi terbaik dengan armada modern dan pelayanan prima untuk kenyamanan perjalanan Anda.
                </p>
                <div class="mt-3">
                    <img src="https://via.placeholder.com/180x60?text=Bustech+Premium" alt="Bustech Premium" class="img-fluid" style="border-radius: 8px;">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 footer-column mb-4">
                <h5>Layanan</h5>
                <ul class="mt-3">
                    <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Booking Online</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Pelayanan Prima</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Berita Terbaru</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right me-2"></i> Pencarian Agen</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-column mb-4">
                <h5>Kontak Kami</h5>
                <ul class="mt-3">
                    <li><a href="#"><i class="fas fa-envelope me-2"></i> info@bustech.com</a></li>
                    <li><a href="#"><i class="fas fa-phone me-2"></i> (021) 1234-5678</a></li>
                    <li><a href="#"><i class="fab fa-whatsapp me-2"></i> +62 812-3456-7890</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt me-2"></i> Jl. Transportasi No. 123, Jakarta</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-column mb-4">
                <h5>Ikuti Kami</h5>
                <div class="social-icons-premium mt-3">
                    <a href="#" class="float-animation"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="float-animation delay-1"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="float-animation delay-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="float-animation delay-3"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="mt-4">
                    <h6>Download Aplikasi</h6>
                    <div class="d-flex gap-2 mt-2">
                        <a href="#" class="btn btn-dark btn-sm btn-premium">
                            <i class="fab fa-google-play me-1"></i> Play Store
                        </a>
                        <a href="#" class="btn btn-dark btn-sm btn-premium">
                            <i class="fab fa-apple me-1"></i> App Store
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-premium">
            <p>&copy; 2025 Bustech Transport. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Premium Scripts -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize edit modal
        $('.btn-edit').click(function() {
            $('#edit-id').val($(this).data('id_bus'));
            $('#edit-nama_bus').val($(this).data('nama_bus'));
            $('#edit-asal').val($(this).data('asal'));
            $('#edit-tujuan').val($(this).data('tujuan'));
            $('#edit-kapasitas').val($(this).data('kapasitas'));
            $('#edit-harga_tiket').val($(this).data('harga_tiket'));
            
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
            
            // Animate modal entrance
            gsap.from("#editModal .modal-content", {
                duration: 0.5,
                y: 50,
                opacity: 0,
                ease: "back.out(1.7)"
            });
        });
        
        // Animate add seat modal
        $('#addSeatModal').on('show.bs.modal', function () {
            gsap.from("#addSeatModal .modal-content", {
                duration: 0.5,
                y: 50,
                opacity: 0,
                ease: "back.out(1.7)"
            });
        });
        
        // Hover effects for buttons
        $('.btn-premium').hover(
            function() {
                $(this).css('transform', 'translateY(-3px)');
                $(this).css('box-shadow', '0 8px 25px rgba(0, 0, 0, 0.2)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
                $(this).css('box-shadow', '0 4px 15px rgba(0, 0, 0, 0.1)');
            }
        );
        
        // Table row hover effect
        $('.premium-table tbody tr').hover(
            function() {
                $(this).css('transform', 'translateY(-3px)');
                $(this).css('box-shadow', '0 8px 20px rgba(0, 78, 137, 0.15)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
                $(this).css('box-shadow', '0 4px 12px rgba(0, 0, 0, 0.05)');
            }
        );
    });
    
    // SweetAlert confirmation
    function confirmDelete() {
        return Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF476F',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            background: 'var(--light)',
            backdrop: `
                rgba(0,0,0,0.5)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `
        }).then((result) => {
            return result.isConfirmed;
        });
    }
</script>
</body>
</html>