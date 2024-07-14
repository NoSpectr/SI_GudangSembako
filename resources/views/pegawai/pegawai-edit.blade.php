@extends('master')
@section('title', 'Edit Data Pegawai')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Edit Data Pegawai</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_pegawai" id="nama_pegawai"
                        value="{{ $pegawai->nama_pegawai }}" placeholder="Masukan nama pegawai" required>
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="form-label">Jabatan <span>*</span></label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled>Pilih Jabatan</option>
                        <option value="pegawai_gudang" {{ $pegawai->jabatan == 'pegawai_gudang' ? 'selected' : '' }}>Pegawai
                            Gudang</option>
                        <option value="supir" {{ $pegawai->jabatan == 'supir' ? 'selected' : '' }}>Supir</option>
                        <option value="pegawai_penjadwalan"
                            {{ $pegawai->jabatan == 'pegawai_penjadwalan' ? 'selected' : '' }}>Pegawai Penjadwalan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="alamat_pegawai" class="form-label">Alamat Pegawai <span>*</span></label>
                    <textarea class="form-control input" name="alamat_pegawai" id="alamat_pegawai" placeholder="Masukan alamat pegawai"
                        required>{{ $pegawai->alamat_pegawai }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="telp_pegawai" class="form-label">No. Telepon Pegawai <span>*</span></label>
                    <input type="text" class="form-control input" name="telp_pegawai" id="telp_pegawai"
                        value="{{ $pegawai->telp_pegawai }}" placeholder="Masukan no. telepon pegawai" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
