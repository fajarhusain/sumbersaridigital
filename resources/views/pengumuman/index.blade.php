@extends('partials.layouts.app')

@section('title', 'Data Pengumuman')

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Data Pengumuman -->
        <div class="card">
            <div class="row mx-3 my-4">
                <div class="col-md-6">
                    <h5>Data Pengumuman</h5>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                        Tambah Pengumuman
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table-bordered table-striped table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td><strong>{{ $item->judul }}</strong></td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>{{ Str::limit($item->isi, 50, '...') }}</td>
                                <td>
    <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-primary btn-sm me-2">
        Ubah
    </a>
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmDelete({{ $item->id }}, '{{ $item->judul }}')">
        Hapus
    </button>

    <form id="delete-form-{{ $item->id }}" action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>

                            </tr>
                        @endforeach

                        @if ($pengumuman->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data pengumuman</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($pengumuman instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengumuman->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $pengumuman->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pengumuman akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector(`form[action$="/${id}"]`).submit();
                }
            });
        }
    </script>
@endsection
