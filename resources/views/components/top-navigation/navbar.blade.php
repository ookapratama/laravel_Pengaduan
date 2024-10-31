<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="/" class="navbar-brand sidebar-gone-hide">{{ $title }}</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
       
       
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
       
    </form>
    <ul class="navbar-nav navbar-right">
    
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
           
            <li class="nav-item {{ $menu == 'landing' ? 'active' : '' }}">
                <a href="/" class="nav-link"><span>Home</span></a>
            </li>
            <li class="nav-item {{ $menu == 'kontak' ? 'active' : '' }}">
                <a href="{{ route('kontak') }}" class="nav-link"><span>Kontak</span></a>
            </li>
            {{-- <li class="nav-item {{ $menu == 'informasi' ? 'active' : '' }}">
                <a href="{{ route('informasi') }}" class="nav-link"><span>Informasi PKH</span></a>
            </li> --}}
            <li class="nav-item {{ $menu == 'permintaan' ? 'active' : '' }}">
                <a href="{{ route('permintaan.index') }}" class="nav-link"><span>Buat pengaduan</span></a>
            </li>
            {{-- <li class="nav-item {{ $menu == 'statistik' ? 'active' : '' }}">
                <a href="/statistik" class="nav-link"><span>Statistik</span></a>
            </li> --}}
            <li class="nav-item ">
                <a href="{{ route('auth.login-user') }}" class="nav-link"><span>Login</span></a>
            </li>
           
        </ul>
    </div>
</nav>
