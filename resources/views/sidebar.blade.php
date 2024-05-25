    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Gudang Barang</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('barang') }}">
                            <i class="bi bi-circle"></i><span>Data Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kategori') }}">
                            <i class="bi bi-circle"></i><span>Kategori Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stok') }}">
                            <i class="bi bi-circle"></i><span>Stok Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gudang') }}">
                            <i class="bi bi-circle"></i><span>Gudang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"></i><span>Pengiriman</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('outlet') }}">
                            <i class="bi bi-circle"></i><span>Outlet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('truk') }}">
                            <i class="bi bi-circle"></i><span>Truk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('supir') }}">
                            <i class="bi bi-circle"></i><span>Supir</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rute') }}">
                            <i class="bi bi-circle"></i><span>Rute</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar-week"></i><span>Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('jadwal') }}">
                            <i class="bi bi-circle"></i><span>Jadwal Pengiriman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pengiriman')}}">
                            <i class="bi bi-circle"></i><span>Pengiriman</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar-->
