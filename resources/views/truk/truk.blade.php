@extends('master')

<title>Data Truk</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="pagetitle">
        <h1>Data Truk</h1>
    </div>
    {{-- Alert Success --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- Button Tambah dan Cetak --}}
    <div>
        <a href="{{ route('truk-create') }}" class="btn btn-primary active md-5 mb-3"><i class="bi bi-plus me-1"></i>Tambah
            Data</a>
        <a href='/truk-pdf' class="btn btn-success active md-5 mb-3"><i class="bi bi-printer me-1"></i>Cetak
            PDF</a>
    </div>

    {{-- Tabel Data Truk --}}
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nomor Plat</th>
                <th>Kapasitas Truk (Kg)</th>
                <th>Kondisi Truk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tb_truk as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->nomor_plat }}</td>
                    <td>{{ $t->kapasitas_truk }}</td>
                    <td>{{ $t->kondisi_truk }}</td>
                    <td class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{ route('truk-edit', $t->id) }}"><button class="btn btn-info btn-sm me-1"><i
                                    class="bi bi-pencil-square me-1"></i>Edit</button></a>
                        <a href="{{ route('truk-destroy', $t->id) }}" title="Hapus"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
