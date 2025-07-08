@extends('partials.layouts.app')

@section('title', 'Tambah Template Surat')

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Tambah Template Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.template.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="jenis_surat" class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                            <select name="jenis_surat" id="jenis_surat" class="form-select" required>
                                <option value="">-- Pilih Jenis Surat --</option>
                                <option value="Surat Pengantar">Surat Pengantar</option>
                                <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                <option value="Surat Keterangan Belum Menikah">Surat Keterangan Belum Menikah</option>
                                <option value="Surat Domisili">Surat Domisili</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="template" class="form-label">Template Surat <span class="text-danger">*</span></label>
                            <input type="file" name="template" id="template" class="form-control"
                                accept=".docx, .doc" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
