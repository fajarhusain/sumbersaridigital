<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | SUMBERSARI DIGITAL</title>
  <link rel="icon" href="../assets/img/favicon/logosumbersaridigital.svg" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
        background: url('/assets/img/bg.png') no-repeat center center;
        background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .card {
        background: rgba(255, 255, 255, 0.3); /* Putih dengan 80% opacity */
  border-radius: 16px;
  padding: 2rem;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px); /* Efek blur background */
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }

    .logo img {
      height: 40px;
    }

    .logo span {
      font-weight: 700;
      margin-left: 10px;
      color: #1e3a8a;
      font-size: 1.2rem;
      text-transform: uppercase;
    }

    h2 {
      text-align: center;
      color: #1e293b;
      margin-bottom: 1rem;
    }

    .info {
      text-align: center;
      font-size: 0.9rem;
      color:rgb(155, 160, 165);
      margin-bottom: 1.5rem;
    }

    .info a {
      color: #059669;
      text-decoration: none;
      font-weight: 600;
    }

    form label {
      font-size: 0.85rem;
      color: #334155;
      margin-bottom: 0.25rem;
      display: block;
    }

    form input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      margin-bottom: 1rem;
      font-size: 0.95rem;
    }

    form button {
      background: #059669;
      border: none;
      width: 100%;
      padding: 0.75rem;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    form button:hover {
      background: #047857;
    }

    .register {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
    }

    .register a {
      color:rgb(255, 255, 255);
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="logo">
      <img src="../assets/img/favicon/logosumbersaridigital.svg" alt="Logo SUMBERSARI">
      <span>SUMBERSARI DIGITAL</span>
    </div>
    <h2>Masuk Sistem</h2>
    

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
      @csrf
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password" required>

      <button type="submit">Masuk</button>
    </form>

    <div class="register">
  Belum punya akun? <a href="{{ route('register') }}">Daftar Akun</a>
</div>

<div class="info">
  Butuh bantuan? <br>
  <a href="https://wa.me/6281390388233" target="_blank">Hubungi Admin</a>
</div>

  </div>
</body>

</html>
