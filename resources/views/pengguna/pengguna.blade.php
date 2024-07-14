@extends('master')

@section('title', 'Data Pengguna')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
    <div class="pagetitle">
        <h1>Data Pengguna</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('pengguna-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
    </div>

    {{-- Tabel Data Pengguna --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Email</th>
                <th>Username</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->pegawai->nama_pegawai ?? '-' }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $p->hak_akses)) }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('pengguna-edit', $p->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('pengguna-destroy', $p->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
