<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading mb-5">Menu</li>

        @if (Auth::user()->role == 'admin')
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('admin/data-pegawai*') ? '' : 'collapsed' }}"
                    href="/admin/data-pegawai">
                    <i class="bi bi-grid"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/user*') ? '' : 'collapsed' }}" href="/admin/user">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
        @endif
        <!-- End Admin Nav -->

        @if (Auth::user()->role !== 'admin')
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('user/daftar-riwayat-hidup*') ? '' : 'collapsed' }}"
                    href="/user/daftar-riwayat-hidup/identity">
                    <i class="fa-solid fa-user"></i>
                    <span>Daftar Riwayat Hidup</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('user/cuti') ? '' : 'collapsed' }}" href="/user/cuti">
                    <i class="fa-solid fa-note-sticky"></i>
                    <span>Pengajuan Cuti</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('user/list-cuti') ? '' : 'collapsed' }}" href="/user/list-cuti">
                    <i class="fa-solid fa-table-list"></i>
                    <span>List Cuti</span>
                </a>
            </li>
        @endif
        <!-- End User Nav -->

        @if (Auth::user()->role == 'kepala')
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('user/persetujuan-cuti') ? '' : 'collapsed' }}"
                    href="/user/persetujuan-cuti">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Persetujuan Cuti</span>
                </a>
            </li>
        @endif

    </ul>

</aside>
