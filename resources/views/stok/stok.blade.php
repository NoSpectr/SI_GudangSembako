@extends('master')

<title>Data Stok Barang</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Stok Barang</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('stok-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href='/stok-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            PDF</a>
    </div>

    {{-- Tabel Data Stok Barang --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Nama Gudang</th>
                <th>Jumlah Stok</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_stokBarang as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->barang->nama_barang }}</td>
                    <td>{{ $s->gudang->nama_gudang }}</td>
                    <td>{{ $s->jumlah_stok }}</td>
                    <td>{{ $s->tgl_masuk }}</td>
                    <td>{{ $s->tgl_kadaluarsa }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('stok-edit', $s->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('stok-destroy', $s->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
