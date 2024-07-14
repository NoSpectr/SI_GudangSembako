<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" />
                <span class="d-none d-lg-block">Gudang Sembako</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.png') }}" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

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

            <!-- Kondisi berdasarkan peran pengguna -->
            @if (Auth::check() && in_array(Auth::user()->hak_akses, ['admin', 'pegawai_gudang']))
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-building"></i><span>Gudang Barang</span><i
                            class="bi bi-chevron-down ms-auto"></i>
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
            @endif
            <!-- End Components Nav -->

            @if (Auth::check() && in_array(Auth::user()->hak_akses, ['admin','pegawai_gudang', 'pegawai_penjadwalan', 'supir']))
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
            @endif
            <!-- End Forms Nav -->

            @if (Auth::check() && in_array(Auth::user()->hak_akses, ['admin', 'supir', 'pegawai_penjadwalan']))
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-calendar-week"></i><span>Jadwal</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('jadwal') }}">
                                <i class="bi bi-circle"></i><span>Jadwal Pengiriman</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengiriman') }}">
                                <i class="bi bi-circle"></i><span>Pengiriman</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <!-- End Tables Nav -->

            @if (Auth::check() && Auth::user()->hak_akses == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-person-vcard"></i><span>Pegawai</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('pegawai') }}">
                                <i class="bi bi-circle"></i><span>Data Pegawai</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengguna') }}">
                                <i class="bi bi-circle"></i><span>Data Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <!-- End Charts Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->


    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
