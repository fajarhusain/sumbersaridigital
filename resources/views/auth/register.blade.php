<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar | Sumbersari Digital</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logosumbersaridigital.svg" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: url('../assets/img/bg.png') no-repeat center center;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .card {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 16px;
      padding: 2rem;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
      backdrop-filter: blur(10px);
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
      font-size: 1.3rem;
    }

    h2 {
      text-align: center;
      color: #1e293b;
      margin-bottom: 1.5rem;
    }

    form label {
      font-size: 0.9rem;
      color: #334155;
      display: block;
      margin-bottom: 0.5rem;
    }

    form input, form select {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .btn-submit {
      background: #059669;
      border: none;
      padding: 0.75rem;
      width: 100%;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-submit:hover {
      background: #047857;
    }

    .info {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
    }

    .info a {
      color: #059669;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="logo">
      <img src="../assets/img/favicon/logosumbersaridigital.svg" alt="Logo Sumbersari">
      <span>Sumbersari Digital</span>
    </div>
    <h2>Daftar Akun</h2>

    <form action="{{ route('register.store') }}" method="POST">
      @csrf
      <label>Email</label>
      <input type="email" name="email" placeholder="Masukkan Email" required>

      <label>Nomor WhatsApp</label>
      <input type="text" name="nomor_whatsapp" placeholder="Masukkan Nomor WhatsApp" required>

      <label>NIK</label>
      <input type="text" name="nik" placeholder="Masukkan NIK" required>

      <label>Nama Lengkap</label>
      <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>

      <label>Alamat</label>
      <input type="text" name="alamat" placeholder="Masukkan Alamat" required>

      <label>RT/RW</label>
      <select name="rt_rw" required>
        <option value="" disabled selected>Pilih RT/RW</option>
        <option value="01/01">01/01</option>
        <option value="02/01">02/01</option>
        <option value="03/02">01/02</option>
        <option value="04/02">02/02</option>
      </select>

      <label>Password</label>
      <input type="password" name="password" placeholder="Masukkan Password" required>

      <label>Konfirmasi Password</label>
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

      <button type="submit" class="btn-submit">Daftar</button>
    </form>

    <div class="info">
      Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
    </div>
  </div>
</body>

</html>
