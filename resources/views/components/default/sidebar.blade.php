<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Website Pengaduan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">Pengaduan</a>
        </div>
        <ul class="sidebar-menu">



            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i
                        class="far fa-square"></i> <span>Dashboard</span></a>
            </li>

            <li class="{{ $menu == 'keluhan' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('keluhan.index') }}"><i class="far fa-square"></i> <span>Keluhan </span></a>
            </li>

            <li class="{{ $menu == 'tanggapan' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('tanggapan.index') }}"><i class="far fa-square"></i> <span>Tanggapan </span></a>
            </li>

            <li class="{{ $menu == 'pelanggan' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('pelanggan.index') }}"><i class="far fa-square"></i> <span>Pelanggan </span></a>
            </li>

            {{-- <li class="{{ $menu == 'rekap' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.rekap') }}"><i
                        class="far fa-square"></i> <span>Rekap Data</span></a>
            </li> --}}

            <li class="{{ $menu == 'akun' ? 'active' : '' }}"><a class="nav-link" href="{{ route('akun.index') }}"><i
                        class="far fa-square"></i> <span>Akun</span></a>
            </li>

            <li class="{{ $menu == 'cetak' ? 'active' : '' }}"><a class="nav-link" href="{{ route('cetak.index') }}"><i
                        class="far fa-square"></i> <span>Cetak Pengaduan</span></a>
            </li>


            {{-- <li class="{{ Request::is('blank') ? 'active' : '\' }}"><a class="nav-link" href="{{ route('blank') }}"><i
                        class="far fa-square"></i> <span>Kepala Rumah Tangga</span></a>
            </li>

            <li class="{{ Request::is('blank') ? 'active' : '' }}"><a class="nav-link" href="{{ route('blank') }}"><i
                        class="far fa-square"></i> <span>Data Perumahan</span></a>
            </li>

            <li class="{{ Request::is('blank') ? 'active' : '' }}"><a class="nav-link" href="{{ route('blank') }}"><i
                        class="far fa-square"></i> <span>Data Aset</span></a>
            </li> --}}

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('auth.logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Logout
            </a>
        </div>
    </aside>
</div>
