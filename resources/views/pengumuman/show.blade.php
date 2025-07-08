@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Pengumuman /</span> Detail</h4>

    <div class="card">
        <h5 class="card-header">{{ $pengumuman->judul }}</h5>
        <div class="card-body">
            <h6 class="card-subtitle text-muted mb-3">Diterbitkan oleh: {{ $pengumuman->penulis ?? 'Tidak Diketahui' }} pada {{ $pengumuman->created_at->format('d M Y H:i') }}</h6>
            <p class="card-text">{{ $pengumuman->isi }}</p>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-primary">Kembali ke Daftar Pengumuman</a>
            <a href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}" class="btn btn-secondary">Edit Pengumuman</a>
        </div>
    </div>
</div>
@endsection