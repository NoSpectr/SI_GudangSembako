@extends('master')
@php
    $barangCount = \App\Models\ModelBarang::count();
    $outletCount = \App\Models\ModelOutlet::count();
    $supirCount = \App\Models\ModelSupir::count();
    $gudangCount = \App\Models\ModelGudang::count();
@endphp
@section('content')
    <div class="pagetitle">
        <h1>Selamat Datang Admin!</h1>
    </div>
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col">
                <div class="row">
                    <!-- Barang Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Barang</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-boxes"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $barangCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Barang Card -->

                    <!-- Baptis Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Gudang</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-buildings"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $gudangCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Baptis Card -->

                    <!-- Outlet Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Outlet</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $outletCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Outlet Card -->

                    <!-- Pernikahan Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Data Supir </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-vcard"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $supirCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Data Pernikahan Card -->
                </div>
            </div>
    </section>
    </div>

    <script>
        // Set interval to update data every 5 seconds
        setInterval(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('dashboard.data') }}',
                success: function(data) {
                    $('#barang-count').text(data.barang_count);
                    $('#outlet-count').text(data.outlet_count);
                    $('#supir-count').text(data.supir_count);
                    $('#gudang-count').text(data.gudang_count);
                }
            });
        }, 5000);
    </script>
@endsection
