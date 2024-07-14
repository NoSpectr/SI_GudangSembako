@extends('master')

<title>Data Outlet</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Outlet</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('outlet-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href='/outlet-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            PDF</a>
    </div>

    {{-- Tabel Data Outlet --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Alamat Outlet</th>
                <th>No Telp Outlet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_outlet as $o)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $o->nama_outlet }}</td>
                    <td>{{ $o->alamat_outlet }}</td>
                    <td>{{ $o->no_telp }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('outlet-edit', $o->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('outlet-destroy', $o->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
