@extends('master')

<title>Data Pengiriman</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Pengiriman</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
            <a href="{{ route('pengiriman-create') }}" class="btn btn-primary active md-5 mb-3"><i
                    class="bi bi-plus me-1"></i>Tambah Data</a>
            <a href='/pengiriman-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak PDF</a>
    </div>

    {{-- Tabel Data Pengiriman --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Nomor Polisi</th>
                <th>Nama Supir</th>
                <th>Status Pengiriman</th>
                <th>Tanggal Pengiriman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_pengiriman as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->outlet->nama_outlet }}</td>
                    <td>{{ $p->truk->nomor_plat }}</td>
                    <td>{{ $p->supir->nama_supir }}</td>
                    <td>{{ $p->status_pengiriman }}</td>
                    <td>{{ $p->tgl_pengiriman }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('pengiriman-edit', $p->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('pengiriman-destroy', $p->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
