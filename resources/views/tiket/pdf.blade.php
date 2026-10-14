<!DOCTYPE html>
<html>
<head>
    <title>Tiket BusTech - {{ $tiket->id_tiket }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body { 
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .ticket-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }
        .ticket-header {
            background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .ticket-header p {
            margin: 5px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .ticket-body {
            padding: 30px;
        }
        .ticket-info {
            margin-bottom: 25px;
        }
        .info-row {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        .info-label {
            font-weight: 600;
            width: 120px;
            color: #6b7280;
            font-size: 14px;
        }
        .info-value {
            font-weight: 500;
            flex: 1;
            font-size: 15px;
        }
        .route-display {
            background: #f3f4f6;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            position: relative;
        }
        .route-arrow {
            font-size: 24px;
            color: #f97316;
            margin: 0 10px;
            vertical-align: middle;
        }
        .route-from, .route-to {
            display: inline-block;
            font-weight: 600;
            font-size: 18px;
        }
        .barcode-container {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px dashed #e5e7eb;
        }
        .barcode {
            font-family: 'Libre Barcode 128', cursive;
            font-size: 50px;
            letter-spacing: 3px;
            margin: 10px 0;
        }
        .ticket-footer {
            background: #f8fafc;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .watermark {
            position: absolute;
            opacity: 0.05;
            font-size: 120px;
            font-weight: 700;
            color: #f97316;
            transform: rotate(-30deg);
            top: 40%;
            left: 10%;
            z-index: 0;
        }
        .ticket-number {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .price-tag {
            background: #10b981;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-top: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <!-- Watermark -->
        <div class="watermark">BUSTECH</div>
        
        <!-- Header -->
        <div class="ticket-header">
            <div class="ticket-number">No. {{ $tiket->id_tiket }}</div>
            <h1>TIKET PERJALANAN PREMIUM</h1>
            <p>BusTech Executive Class</p>
        </div>
        
        <!-- Body -->
        <div class="ticket-body">
            <div class="ticket-info">
                <div class="info-row">
                    <div class="info-label">Nama Bus</div>
                    <div class="info-value">{{ $tiket->bus->nama_bus }}</div>
                </div>
                
                <div class="route-display">
                    <span class="route-from">{{ $tiket->bus->asal }}</span>
                    <span class="route-arrow"> MENUJU </span>
                    <span class="route-to">{{ $tiket->bus->tujuan }}</span>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Tanggal</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($tiket->jadwal_berangkat)->format('l, d F Y') }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Jam Berangkat</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($tiket->jadwal_berangkat)->format('H:i') }} WIB</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Nomor Kursi</div>
                    <div class="info-value" style="font-weight: 700; font-size: 18px; color: #f97316;">{{ $tiket->nomor_kursi }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Total Pembayaran</div>
                    <div class="info-value">
                        <div class="price-tag">Rp {{ number_format($tiket->total_bayar, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
            
            <div class="barcode-container">
                <p style="margin-bottom: 15px; font-size: 13px;">Scan barcode saat boarding</p>
                <div class="barcode">TIKET{{ $tiket->id_tiket }}</div>
                <p style="margin-top: 5px; font-size: 12px; color: #6b7280;">Valid until {{ \Carbon\Carbon::parse($tiket->jadwal_berangkat)->addDay()->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="ticket-footer">
            <p>Terima kasih telah mempercayakan perjalanan Anda bersama BusTech</p>
            <p style="margin-top: 5px;">Customer Service: 0812-3456-7890 | www.bustech.co.id</p>
            <p style="margin-top: 10px; font-size: 11px;">Tiket ini berlaku sebagai bukti pembayaran yang sah</p>
        </div>
    </div>
</body>
</html>