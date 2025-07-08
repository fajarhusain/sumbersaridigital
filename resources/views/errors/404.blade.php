<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>404 | Desa Sumbersari</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logosumbersaridigital.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>

    <style>
        .error-page {
            background: linear-gradient(135deg, #00c853, #43a047);
            color: #ffffff;
            border-radius: 20px;
            padding: 50px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .error-page h1 {
            font-size: 100px;
            font-weight: 900;
        }

        .error-page p {
            font-size: 18px;
            margin-top: 10px;
        }

        .btn-cta {
            padding: 12px 25px;
            font-weight: 600;
            color: #ffffff;
            background: #065f46;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-cta:hover {
            background: #047857;
            transform: translateY(-2px);
        }

        .error-logo {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="login-page">

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="error-page text-center">
                    <img src="../assets/img/favicon/logosumbersaridigital.svg" alt="Logo Desa Digital"
                        class="error-logo">
                    <h1>404</h1>
                    <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
                    <a href="{{ url('/') }}" class="btn-cta">⬅ Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
