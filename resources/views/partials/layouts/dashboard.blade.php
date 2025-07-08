@extends('partials.layouts.app')

@section('title', 'Dashboard')

@section('container')
    <style>
        .hover-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .icon-style {
            font-size: 60px;
            margin-bottom: 10px;
            color: #ffffff;
            padding: 20px;
            border-radius: 50%;
        }

        .icon-style.bx-file {
            background-color: #28a745;
        }

        .icon-style.bx-user {
            background-color: #6f42c1;
            /* Purple for teachers */
        }

        .icon-style.bx-user-pin {
            background-color: maroon;
            /* Purple for teachers */
        }

        .icon-style.bx-group {
            background-color: #17a2b8;
            /* Teal for students */
        }

        .card-title {
            margin-bottom: 5px;
        }

        .card-text {
            font-size: 24px;
            font-weight: bold;
        }

        .btn-cta {
    padding: 10px 20px;
    font-weight: 600;
    color: #fff;
    background: linear-gradient(135deg, #00c853, #43a047);
    border: none;
    border-radius: 30px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(0, 200, 83, 0.4);
    transition: all 0.3s ease-in-out;
}

.btn-cta:hover {
    background: linear-gradient(135deg, #43a047, #00c853);
    box-shadow: 0 8px 24px rgba(0, 200, 83, 0.5);
    transform: translateY(-3px) scale(1.05);
}

.btn-cta:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.3);
}

.stats-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff;
}

.stats-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.circle-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    color: #fff;
}

.bg-success {
    background: #28a745;
}

.bg-warning {
    background: #ffc107;
}

.bg-primary {
    background: #007bff;
}

.pengumuman-nav {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: -15px; /* Naikkan biar dekat card */
}

.carousel-control-custom {
    border: none;
    background-color: #e9ecef; /* Warna senada card */
    color: #495057; /* Warna ikon */
    padding: 6px 10px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
}

.carousel-control-custom:hover {
    background-color: #dee2e6;
    color: #212529;
    transform: scale(1.05);
}

</style>


    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 order-0 mb-4">
            <div class="card welcome-card shadow-lg border-2">
    <div class="row align-items-center g-0">
        <div class="col-md-8 p-4">
            <h2 class="fw-bold text-primary mb-1">
                👋 Selamat datang, {{ Auth::user()->nama }}!
            </h2>
            @if (Auth::user()->role == 'rt')
                @php
                    $rt_rw = Auth::user()->rt_rw;
                    $rt = explode('/', $rt_rw)[0];
                @endphp
                <p class="mb-1 text-secondary">
                    Anda sebagai <strong>Ketua RT {{ $rt ?? '' }}</strong>
                </p>
                <p class="mb-0 mt-2">
                    Kelola pengajuan surat <a href="{{ route('verifikasi.index') }}" class="fw-semibold text-success">di sini</a>
                </p>
            @endif

            @if (Auth::user()->role == 'pengguna')
            <!-- <p class="mb-0 mt-2">
    Ajukan surat dengan mudah
</p> -->
<a href="{{ route('surat.index') }}" class="btn btn-cta mt-2 d-inline-block">
    📝 Ajukan Surat Sekarang
</a>

            @endif
        </div>
        <div class="col-md-4 text-center p-4">
            <img src="../assets/img/illustrations/jawasip.png" alt="User Illustration" class="img-fluid rounded-circle shadow-sm" width="150">
        </div>
    </div>
</div>

<h5 class="fw-bold mt-5 mb-3">📢 Pengumuman Terbaru</h5>
@php
    $pengumuman = \App\Models\Pengumuman::orderBy('tanggal', 'desc')->take(5)->get();
@endphp

@if ($pengumuman->count() > 1)
<div id="pengumumanCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($pengumuman as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="card stats-card mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1 text-dark">{{ $item->judul }}</h6>

                        <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                        <div class="mt-2 isi-pengumuman" style="max-height: 150px; overflow: hidden;">
                            {!! $item->isi !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol Navigasi Minimalis di Bawah -->
    <div class="pengumuman-nav">
    <button class="carousel-control-custom" type="button" data-bs-target="#pengumumanCarousel" data-bs-slide="prev">
        <i class="bx bx-left-arrow-alt"></i>
    </button>
    <button class="carousel-control-custom" type="button" data-bs-target="#pengumumanCarousel" data-bs-slide="next">
        <i class="bx bx-right-arrow-alt"></i>
    </button>
</div>

</div>


@elseif ($pengumuman->count() == 1)
    <div class="alert alert-info mb-3">
        <h6 class="mb-1">{{ $pengumuman[0]->judul }}</h6>
        <small class="text-muted">{{ \Carbon\Carbon::parse($pengumuman[0]->tanggal)->format('d M Y') }}</small>
        <div class="mt-2 isi-pengumuman" style="max-height: 150px; overflow: hidden;">
            {!! $pengumuman[0]->isi !!}
        </div>
    </div>
@else
    <p class="text-muted">Belum ada pengumuman.</p>
@endif

            </div>

            <!-- Dashboard -->
            {{-- User --}}
            @if (Auth::user()->role == 'pengguna')

            <div class="col-lg-4 mb-4">
    <a href="{{ route('riwayat.index') }}" class="card stats-card text-decoration-none">
        <div class="card-body d-flex align-items-center">
            <div class="circle-icon bg-primary me-3">
                <i class="bx bx-send"></i>
            </div>
            <div class="text-start">
                <p class="fs-3 fw-bold mb-1">{{ $totalSuratDiajukanUser ?? '0' }}</p>
                <h6 class="card-title fw-semibold mb-0">Total Surat Diajukan</h6>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('riwayat.index') }}" class="card stats-card text-decoration-none">
        <div class="card-body d-flex align-items-center">
            <div class="circle-icon bg-warning me-3">
                <i class="bx bx-loader-circle bx-spin"></i>
            </div>
            <div class="text-start">
                <p class="fs-3 fw-bold mb-1">{{ $totalSuratMenungguUser ?? '0' }}</p>
                <h6 class="card-title fw-semibold mb-0">Total Surat Menunggu</h6>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('riwayat.index') }}" class="card stats-card text-decoration-none">
        <div class="card-body d-flex align-items-center">
            <div class="circle-icon bg-success me-3">
                <i class="bx bx-badge-check"></i>
            </div>
            <div class="text-start">
                <p class="fs-3 fw-bold mb-1">{{ $totalSuratDisetujuiUser ?? '0' }}</p>
                <h6 class="card-title fw-semibold mb-0">Total Surat Disetujui</h6>
            </div>
        </div>
    </a>
</div>

            @endif

            {{-- RT --}}
            @if (Auth::user()->role == 'rt')
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('verifikasi.index', ['status' => 'menunggu']) }}"
                        class="card hover-card text-decoration-none text-center">
                        <div class="card-body">
                            <i class="bx bx-time icon-style"
                                style="background-color: #ffc107; padding: 12px; border-radius: 100%;"></i>
                            <h5 class="card-title">Total Surat Menunggu </h5>
                            <p class="card-text">{{ $totalSuratMenungguRT ?? '0' }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('verifikasi.index') }}" class="card hover-card text-decoration-none text-center">
                        <div class="card-body">
                            <i class="bx bx-file icon-style"
                                style="background-color: #007bff; padding: 12px; border-radius: 100%;"></i>
                            <h5 class="card-title">Total Surat Diajukan</h5>
                            <p class="card-text">{{ $totalSuratDiajukanRT ?? '0' }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('rt.pengguna.index') }}" class="card hover-card text-decoration-none text-center">
                        <div class="card-body">
                            <i class="bx bx-group icon-style"
                                style="background-color:rgb(176, 165, 197); padding: 12px; border-radius: 100%;"></i>
                            @php
                                $rt_rw = Auth::user()->rt_rw;
                                $rt = explode('/', $rt_rw)[0];
                            @endphp

                            <h5 class="card-title">Total Pengguna RT {{ $rt ?? '' }}</h5>
                            <p class="card-text">{{ $totalWargaRT ?? '0' }}</p>
                        </div>
                    </a>
                </div>
        </div>
        @endif

        @if (Auth::user()->role == 'admin')
    <div class="col-lg-4 mb-4">
        <a href="{{ route('admin.surat.index', ['status' => 'disetujui']) }}" class="card stats-card text-decoration-none">
            <div class="card-body d-flex align-items-center">
                <div class="circle-icon bg-success me-3">
                    <i class="bx bx-check-double"></i>
                </div>
                <div class="text-start">
                    <p class="fs-3 fw-bold mb-1">{{ $totalSuratDisetujuiAdmin ?? '0' }}</p>
                    <h6 class="card-title fw-semibold mb-0">Total Surat Disetujui</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="{{ route('admin.surat.index') }}" class="card stats-card text-decoration-none">
            <div class="card-body d-flex align-items-center">
                <div class="circle-icon bg-primary me-3">
                    <i class="bx bx-send"></i>
                </div>
                <div class="text-start">
                    <p class="fs-3 fw-bold mb-1">{{ $totalSuratDiajukanAdmin ?? '0' }}</p>
                    <h6 class="card-title fw-semibold mb-0">Total Surat Diajukan</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="{{ route('admin.pengguna.index') }}" class="card stats-card text-decoration-none">
            <div class="card-body d-flex align-items-center">
                <div class="circle-icon bg-info me-3">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="text-start">
                    <p class="fs-3 fw-bold mb-1">{{ $totalUsers ?? '0' }}</p>
                    <h6 class="card-title fw-semibold mb-0">Total Pengguna</h6>
                </div>
            </div>
        </a>
    </div>
    @endif
    <div class="card mt-4 shadow-sm">
    <div class="card-body">
        <h6 class="fw-bold mb-3">📞 Nomor Darurat Desa</h6>
        <div class="d-flex flex-wrap justify-content-between">
            <div class="col-6 mb-2"> {{-- Ambil 50% lebar --}}
                <strong>Balai Desa:</strong> 0812-3456-7890
            </div>
            <div class="col-6 mb-2"> {{-- Ambil 50% lebar --}}
                <strong>Kepala Desa:</strong> 0813-9876-5432
            </div>
            <div class="col-6 mb-2"> {{-- Ambil 50% lebar --}}
                <strong>Polsek Kayen:</strong> 110
            </div>
            <div class="col-6 mb-2"> {{-- Ambil 50% lebar --}}
                <strong>UpzisNU:</strong> 112
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
@endsection

@push('scripts')
<script>
    var myCarousel = document.querySelector('#pengumumanCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000, // 5 detik
        ride: 'carousel'
    });
</script>
@endpush
