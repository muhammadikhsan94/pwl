<li class="nav-header">
    Halaman Utama
</li>
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Beranda</p>
    </a>
</li>
<li class="nav-header">
    TRANSAKSI
</li>
<li class="nav-item">
    <a href="{{ url('penjualan') }}" class="nav-link {{ request()->routeIs('penjualan.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Penjualan</p>
    </a>
</li>
@can('admin')
<li class="nav-header">
    MASTER DATA
</li>
<li class="nav-item">
    <a href="{{ url('pengguna') }}" class="nav-link {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Pengguna</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('peran') }}" class="nav-link {{ request()->routeIs('peran.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>Peran</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('pengiriman') }}" class="nav-link {{ request()->routeIs('pengiriman.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>Pengiriman</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('pembayaran') }}" class="nav-link {{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>Pembayaran</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('produk') }}" class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>Produk</p>
    </a>
</li>
@endcan
