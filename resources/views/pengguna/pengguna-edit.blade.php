@extends('master')
@section('title', 'Edit Data Pengguna')

@php
    $tb_pegawai = App\Models\ModelPegawai::all();
@endphp

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Edit Data Pengguna</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="id_pegawai" class="form-label">Nama Pegawai <span>*</span></label>
                    <select name="id_pegawai" id="id_pegawai" class="form-select" required>
                        <option value="" disabled selected>Pilih Nama Pegawai</option>
                        @foreach ($tb_pegawai as $pegawai)
                            <option value="{{ $pegawai->id }}"
                                {{ $pengguna->id_pegawai == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nama_pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email <span>*</span></label>
                    <input type="email" class="form-control input" name="email" id="email"
                        value="{{ $pengguna->email }}" placeholder="Masukan email pengguna" required>
                </div>
                <div class="mb-4">
                    <label for="username" class="form-label">Username <span>*</span></label>
                    <input type="text" class="form-control input" name="username" id="username"
                        value="{{ $pengguna->username }}" placeholder="Masukan username pengguna" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password <span>*</span></label>
                    <input type="password" class="form-control input" name="password" id="password"
                        placeholder="Masukan password pengguna">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                </div>
                <div class="mb-4">
                    <label for="hak_akses" class="form-label">Hak Akses <span>*</span></label>
                    <select name="hak_akses" id="hak_akses" class="form-select" required>
                        <option value="" disabled>Pilih Hak Akses</option>
                        <option value="admin" {{ $pengguna->hak_akses == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pegawai_gudang" {{ $pengguna->hak_akses == 'pegawai_gudang' ? 'selected' : '' }}>
                            Pegawai Gudang</option>
                        <option value="supir" {{ $pengguna->hak_akses == 'supir' ? 'selected' : '' }}>Supir</option>
                        <option value="pegawai_penjadwalan"
                            {{ $pengguna->hak_akses == 'pegawai_penjadwalan' ? 'selected' : '' }}>Pegawai Penjadwalan
                        </option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
