@extends('master')

<title>Data Jadwal Pengiriman</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Jadwal Pengiriman</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('jadwal-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href='/jadwal-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            PDF</a>
    </div>

    {{-- Tabel Data Jadwal --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Nomor Polisi Truk</th>
                <th>Nama Supir</th>
                <th>Jadwal Pengiriman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_jadwal as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->outlet->nama_outlet }}</td>
                    <td>{{ $j->truk->nomor_plat }}</td>
                    <td>{{ $j->supir->nama_supir }}</td>
                    <td>{{ $j->jadwal }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('jadwal-edit', $j->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('jadwal-destroy', $j->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
