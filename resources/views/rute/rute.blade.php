@extends('master')

<title>Data Rute</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Rute</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('rute-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href='/rute-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            PDF</a>
    </div>

    {{-- Tabel Data Rute --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Gudang</th>
                <th>Daftar Titik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_rute as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->nama_gudang }}</td>                    
                    <td>{{ $r->daftar_titik }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('rute-edit', $r->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('rute-destroy', $r->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
