@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .left {
            flex: 1;
            background: url('bus-image.jpg') no-repeat center center/cover;
        }
        .right {
            flex: 1;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-box {
            width: 80%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .password-container {
            position: relative;
            width: 100%;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 16px;
        }
        .btn {
            width: 100%;
            background: orange;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: darkorange;
        }
        .error-message {
            background: red;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .left {
            flex: 1;
            background: #f2f2f2; /* atau warna netral lainnya */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left img {
            max-width: 90%;
            height: auto;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo">
        </div>
        <div class="right">
            <div class="form-box">
                <!-- <div style="text-align: center; margin-bottom: 20px;">
                    <img src="{{ asset('images/logo_bustech.jpg') }}" alt="BUSTECH Logo" style="width: 120px;">
                </div> -->
                <h2>Daftar</h2>
                <p>Pastikan anda memasukkan nomor handphone dan nama yang benar.</p>

                <!-- Pesan Error Jika Ada -->
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="text" name="no_telpon" placeholder="Nomor Handphone" value="{{ old('no_telpon') }}" required>
                    <input type="text" name="nama" placeholder="Nama Pengguna" value="{{ old('nama') }}" required>

                    <!-- Input password dengan toggle visibility -->
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                    </div>

                    <button type="submit" class="btn">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>
@endsection
