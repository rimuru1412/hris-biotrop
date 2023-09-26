<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/identity') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/identity">Identitas</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/keluarga') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/keluarga">Susunan Keluarga</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/pendidikan') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/pendidikan">Pendidikan</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/pengalaman') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/pengalaman">Pengalaman Kerja</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/pelatihan') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/pelatihan">Pelatihan</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/publikasi') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/publikasi">Publikasi</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup/penghargaan') ? 'active' : '' }}"
                        href="/user/daftar-riwayat-hidup/penghargaan">Penghargaan</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
