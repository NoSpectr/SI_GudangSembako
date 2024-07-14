@extends('master')

<title>Data Barang</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Barang</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('barang-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href="/barang-pdf" class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak PDF</a>
    </div>

    {{-- Tabel Data Barang --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Satuan Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_barang as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->nama_kategori }}</td>
                    <td>{{ $b->satuan_barang }}</td>
                    <td>{{ $b->harga_beli }}</td>
                    <td>{{ $b->harga_jual }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('barang-edit', ['id' => $b->id]) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('barang-destroy', ['id' => $b->id]) }}" title="Hapus"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
