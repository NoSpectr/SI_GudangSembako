@extends('master')
@section('title', 'Tambah Data Pengguna')

@php
    $tb_pegawai = App\Models\ModelPegawai::all();
@endphp

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pengguna</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_pegawai" class="form-label">Nama Pegawai <span>*</span></label>
                    <select name="id_pegawai" id="id_pegawai" class="form-select" required>
                        <option value="" disabled selected>Pilih Nama Pegawai</option>
                        @foreach ($tb_pegawai as $pegawai)
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama_pegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email <span>*</span></label>
                    <input type="email" class="form-control input" name="email" id="email"
                        placeholder="Masukan email pengguna" required>
                </div>
                <div class="mb-4">
                    <label for="username" class="form-label">Username <span>*</span></label>
                    <input type="text" class="form-control input" name="username" id="username"
                        placeholder="Masukan username pengguna" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password <span>*</span></label>
                    <input type="password" class="form-control input" name="password" id="password"
                        placeholder="Masukan password pengguna | Minimal 8 Karakter!" required>
                </div>
                <div class="mb-4">
                    <label for="hak_akses" class="form-label">Hak Akses <span>*</span></label>
                    <select name="hak_akses" id="hak_akses" class="form-select" required>
                        <option value="" disabled selected>Pilih Hak Akses</option>
                        <option value="admin">Admin</option>
                        <option value="pegawai_gudang">Pegawai Gudang</option>
                        <option value="supir">Supir</option>
                        <option value="pegawai_penjadwalan">Pegawai Penjadwalan</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
