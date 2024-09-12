<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3 d-flex align-items-center justify-content-between">
        <a href="index.html" class="app-brand-link d-flex align-items-center">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/9203493.png') }}" alt="Foto Barang" class="img-fluid" style="width: 40px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-primary">
                {{ Auth::user()->nama_toko }}
            </span>
        </a>
    
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner ">

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Halaman</span>
        </li>
        <li class="menu-item {{ url()->current() == url('/barang') ? 'active' : '' }} ">
            <a href="{{ url('/barang') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Barang</div>
            </a>
        </li>
        <li class="menu-item {{ url()->current() == url('/penjualan') ? 'active' : '' }} ">
            <a href="{{ url('/penjualan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Penjualan</div>
            </a>
        </li>
        <li class="menu-item {{ url()->current() == url('/riwayat-penjualan') ? 'active' : '' }} ">
            <a href="{{ url('/riwayat-penjualan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Riwayat Penjualan</div>
            </a>
        </li>
    </ul>
</aside>
