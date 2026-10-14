@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Bustech</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --gold: #D4AF37;
            --dark-blue: #0A1A2F;
            --navy: #162A40;
            --light-gold: #F5E6C8;
            --cream: #F8F5F0;
            --error: #E74C3C;
            --transition: all 0.4s cubic-bezier(0.22, 0.61, 0.36, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--cream);
            color: var(--navy);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        
        .container {
            display: flex;
            height: 100vh;
            position: relative;
        }
        
        /* Luxury Left Panel */
        .left {
            flex: 1;
            background: linear-gradient(135deg, var(--dark-blue), var(--navy));
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .left::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: -1;
        }
        
        .left-content {
            text-align: center;
            padding: 40px;
            position: relative;
            z-index: 2;
        }
        
        .left img {
            max-width: 60%;
            height: auto;
            margin-bottom: 40px;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
            transition: var(--transition);
        }
        
        .left:hover img {
            transform: scale(1.05);
        }
        
        .left h1 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .left p {
            color: var(--light-gold);
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 500px;
            margin: 0 auto;
        }
        
        /* Luxury Right Panel */
        .right {
            flex: 1;
            background: var(--cream);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }
        
        .right::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%230a1a2f' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: 0;
        }
        
        .form-box {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
            background: white;
            padding: 50px 40px;
            border-radius: 10px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.2);
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-header {
            margin-bottom: 40px;
            text-align: center;
            position: relative;
        }
        
        .form-header h2 {
            font-family: 'Playfair Display', serif;
            color: var(--navy);
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }
        
        .form-header p {
            color: #666;
            font-size: 0.95rem;
        }
        
        .form-header::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: var(--gold);
            margin: 20px auto 0;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        label {
            font-size: 14px;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: var(--navy);
            letter-spacing: 0.5px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        input {
            width: 100%;
            padding: 16px 20px 16px 45px;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            font-size: 15px;
            transition: var(--transition);
            background-color: white;
            color: var(--navy);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }
        
        input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        input::placeholder {
            color: #AAA;
            font-weight: 300;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            font-size: 18px;
        }
        
        .password-container {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 18px;
            color: #AAA;
            transition: var(--transition);
            padding: 5px;
        }
        
        .toggle-password:hover {
            color: var(--gold);
        }
        
        .btn {
            width: 100%;
            background: linear-gradient(to right, var(--dark-blue), var(--navy));
            color: white;
            padding: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            margin-top: 10px;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(10, 26, 47, 0.2);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(to right, var(--navy), var(--gold));
            transition: var(--transition);
            z-index: -1;
        }
        
        .btn:hover::before {
            width: 100%;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(10, 26, 47, 0.3);
        }
        
        .error-message {
            background: var(--error);
            color: white;
            padding: 14px 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            animation: shake 0.6s;
            position: relative;
            overflow: hidden;
        }
        
        .error-message::after {
            content: '!';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            font-weight: bold;
            opacity: 0.2;
        }
        
        .info {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin: 25px 0;
            font-weight: 300;
            position: relative;
        }
        
        .info::before, .info::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: #EEE;
        }
        
        .info::before {
            left: 0;
        }
        
        .info::after {
            right: 0;
        }
        
        /* Luxury Decorative Elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(212, 175, 55, 0.2);
            z-index: 1;
        }
        
        .circle-1 {
            width: 120px;
            height: 120px;
            top: -60px;
            right: -60px;
        }
        
        .circle-2 {
            width: 80px;
            height: 80px;
            bottom: -40px;
            left: -40px;
            border-width: 2px;
        }
        
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            
            .left, .right {
                padding: 60px 30px;
            }
            
            .left img {
                max-width: 250px;
                margin-bottom: 30px;
            }
            
            .form-box {
                padding: 40px 30px;
            }
        }
        
        @media (max-width: 480px) {
            .left, .right {
                padding: 40px 20px;
            }
            
            .form-box {
                padding: 30px 20px;
            }
            
            .form-header h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="left-content">
                <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo">
                <h1>Bustech Premium</h1>
                <p>Experience the luxury of seamless travel with our premium transportation services</p>
            </div>
        </div>
        <div class="right">
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            
            <div class="form-box">
                <div class="form-header">
                    <h2>Masuk</h2>
                    <p>Silakan masuk ke akun Anda</p>
                </div>

                @if (session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_telpon">Nomor Handphone</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="text" name="no_telpon" placeholder="Masukkan nomor handphone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper password-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <p class="info">Data anda dilindungi dan tidak akan disebarluaskan</p>

                    <button type="submit" class="btn">Masuk <i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleBtn = document.querySelector(".toggle-password i");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleBtn.classList.remove("fa-eye");
                toggleBtn.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleBtn.classList.remove("fa-eye-slash");
                toggleBtn.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
@endsection