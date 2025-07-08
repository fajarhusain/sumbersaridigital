<style>
.menu-inner {
    background: #ffffff;
    border-radius: 12px;
    padding: 1rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
}

.menu-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    border-radius: 10px;
    color: #4b5563;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.menu-item.active > .menu-link,
.menu-link:hover {
    background-color: #d1fae5;
    color: #065f46;
}

.menu-icon {
    font-size: 22px;
    margin-right: 12px;
    transition: transform 0.2s ease;
}

.menu-item.active .menu-icon,
.menu-link:hover .menu-icon {
    transform: scale(1.2);
    color: #047857;
}

.menu-header-text {
    color: #6b7280;
    font-size: 0.7rem;
    font-weight: bold;
    letter-spacing: 1px;
    margin: 1rem 0 0.5rem 0;
    text-transform: uppercase;
}

.menu-sub {
    padding-left: 1.5rem;
}

.menu-sub .menu-link {
    padding: 8px 10px;
    font-size: 0.95rem;
}

.badge-role {
    font-size: 0.7rem;
    background-color: #10b981;
    color: #fff;
    padding: 2px 6px;
    border-radius: 6px;
    margin-left: auto;
}

</style>

<ul class="menu-inner py-2">

    <!-- Dashboard -->
    <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if (Auth::user()->role == 'admin')
        <li class="menu-header small text-uppercase mt-3">
            <span class="menu-header-text">Manajemen</span>
        </li>

        <li class="menu-item {{ Route::is('admin.surat.index') ? 'active' : '' }}">
            <a href="{{ route('admin.surat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <span>Kelola Surat</span>
            </a>
        </li>

        <li class="menu-item {{ Route::is('pengumuman.index') ? 'active' : '' }}">
            <a href="{{ route('pengumuman.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chat"></i>
                <span>Pengumuman</span>
            </a>
        </li>

        <li class="menu-item {{ Route::is('rt.*') || Route::is('rw.*') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <span>Kelola RT & RW</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('rt.index') ? 'active' : '' }}">
                    <a href="{{ route('rt.index') }}" class="menu-link">
                        <span>Data RT</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('rw.index') ? 'active' : '' }}">
                    <a href="{{ route('rw.index') }}" class="menu-link">
                        <span>Data RW</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Route::is('admin.pengguna.index') ? 'active' : '' }}">
            <a href="{{ route('admin.pengguna.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <span>Data Pengguna</span>
            </a>
        </li>

        <li class="menu-item {{ Route::is('kelola_template.*') ? 'active' : '' }}">
    <a href="{{ route('kelola_template.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <span>Template Surat</span>
    </a>
</li>


    @elseif (Auth::user()->role == 'rt')
        <li class="menu-header small text-uppercase mt-3">
            <span class="menu-header-text">RT Area</span>
        </li>

        <li class="menu-item {{ Route::is('verifikasi.index') ? 'active' : '' }}">
    <a href="{{ route('verifikasi.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-check-circle"></i>
        <span>Verifikasi Surat</span>
        <span class="badge-role">RT</span>
    </a>
</li>

        <li class="menu-item {{ Route::is('rt.pengguna.index') ? 'active' : '' }}">
            <a href="{{ route('rt.pengguna.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <span>Pengguna RT {{ Auth::user()->rt_rw }}</span>
            </a>
        </li>

    @elseif (Auth::user()->role == 'pengguna')
        <li class="menu-header small text-uppercase mt-3">
            <span class="menu-header-text">Menu Pengguna</span>
        </li>

        <li class="menu-item {{ Route::is('surat.index') ? 'active' : '' }}">
            <a href="{{ route('surat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>
        <li class="menu-item {{ Route::is('riwayat.index') ? 'active' : '' }}">
            <a href="{{ route('riwayat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <span>Riwayat Pengajuan</span>
            </a>
        </li>
    @endif

    <li class="menu-header small text-uppercase mt-3">
        <span class="menu-header-text">Panduan</span>
    </li>
    <li class="menu-item">
        @php
            $link = auth()->user()->role === 'pengguna' ? 'https://patitech.id'
                : (auth()->user()->role === 'rt' ? 'https://patitech.id' : 'https://patitech.id');
        @endphp
        <a href="{{ $link }}" class="menu-link" target="_blank">
            <i class="menu-icon tf-icons bx bx-book-open"></i>
            <span>Panduan Sistem</span>
        </a>
    </li>
</ul>
