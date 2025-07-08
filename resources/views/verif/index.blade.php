@extends('partials.layouts.app')

@section('title', 'Cek Pengajuan Surat')

@section('container')
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

        <div class="alert alert-primary alert-dismissible fade show col-md-6" role="alert">
            <h5 class="text-primary mb-2">Informasi</h5>
            <p>Ketua RT hanya dapat mengunduh surat pengantar RT/RW</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card">
            <div class="row mx-3 my-4">
                <div class="col-md-6">
                    <h5>Verifikasi Pengajuan Surat</h5>
                </div>
                <div class="col-md-6">
                    <form method="GET" action="{{ route('verifikasi.index') }}" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" value="{{ request('search') }}"
                            placeholder="Cari nama..." />
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
            <div class="">
                <div class="btn-group d-flex col-md-6 mx-4 flex-wrap pb-3 pr-4" role="group" aria-label="Filter Status">
                    <a href="{{ route('verifikasi.index', ['status' => 'menunggu']) }}"
    class="btn btn-outline-success flex-fill {{ strtoupper(request()->query('status')) == 'MENUNGGU' ? 'active' : '' }} mb-2">
    Menunggu
</a>
<a href="{{ route('verifikasi.index', ['status' => 'disetujui']) }}"
    class="btn btn-outline-primary flex-fill {{ strtoupper(request()->query('status')) == 'DISETUJUI' ? 'active' : '' }} mb-2">
    Disetujui
</a>
<a href="{{ route('verifikasi.index', ['status' => 'ditolak']) }}"
    class="btn btn-outline-danger flex-fill {{ strtoupper(request()->query('status')) == 'DITOLAK' ? 'active' : '' }} mb-2">
    Ditolak
</a>
<a href="{{ route('verifikasi.index') }}"
    class="btn btn-outline-dark flex-fill {{ request()->query('status') == null ? 'active' : '' }} mb-2">
    Semua
</a>

                </div>

                {{-- Table --}}
<style>
    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-table thead th {
        background-color: #d1fae5; /* Hijau Muda */
        color: #065f46; /* Hijau Tua */
        padding: 12px;
        text-align: center;
    }

    .custom-table tbody td {
        padding: 12px;
        vertical-align: middle;
    }

    .custom-table tbody tr:hover {
        background-color: #f0fdf4; /* Hover Hijau Lembut */
        transition: 0.2s;
    }

    .badge {
        font-size: 0.8rem;
        padding: 5px 12px;
        border-radius: 20px;
    }

    .btn-sm i {
        margin-right: 5px;
    }
</style>

<div class="table-responsive text-nowrap">
    <table class="table custom-table">
        <thead>
            <tr>
                <th>Tanggal Diajukan</th>
                <th>Nama Pemohon</th>
                <th>Jenis Surat Permohonan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($letters as $letter)
                <tr>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($letter->tanggal_pengajuan)->translatedFormat('d F Y H:i') ?? '-' }} WIB
                    </td>
                    <td>{{ $letter->user->nama ?? '-' }}</td>
                    <td>{{ $letter->jenis_surat ?? '-' }}</td>
                    <td class="text-center">
                        @if ($letter->status === 'MENUNGGU')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif ($letter->status === 'DISETUJUI')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif ($letter->status === 'DITOLAK')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            "-"
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('verifikasi.show', $letter->id) }}" class="btn btn-primary btn-sm me-2">
                            <i class="bx bx-search"></i> Detail
                        </a>
                        @if ($letter->jenis_surat === 'Surat Pengantar' && $letter->status === 'DISETUJUI')
                            <a href="{{ route('verifikasi.download', $letter->id) }}" class="btn btn-success btn-sm">
                                <i class="bx bx-download"></i> Unduh
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

            @if ($letters->isEmpty())
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data yang tersedia</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


            {{-- Pagination --}}
            @if ($letters instanceof \Illuminate\Pagination\LengthAwarePaginator && $letters->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $letters->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
