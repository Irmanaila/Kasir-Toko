<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme d-flex justify-content-between"
    id="layout-navbar">

    <div class="d-flex align-items-center me-2">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bi bi-list fs-1"></i>
            </a>
        </div>
        <h5 class="fw-bold text-nowrap mb-0 fs-6 fs-sm-5 fs-md-5">
            @if (url()->current() == url('/barang'))
                <span class="text-muted fw-light">Halaman /</span> Data Barang
            @elseif (url()->current() == url('/penjualan'))
                <span class="text-muted fw-light">Halaman /</span> Transaksi Penjualan
            @elseif (url()->current() == url('/riwayat-penjualan'))
                <span class="text-muted fw-light">Halaman /</span> Riwayat Penjualan
            @endif
        </h5>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav d-flex flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown d-flex align-items-center">
                <i class="bi bi-person-circle fs-3 me-1"></i>
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nama_pengguna }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
