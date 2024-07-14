@extends('master')
@section('title', 'Tambah Data Pegawai')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pegawai</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_pegawai" id="nama_pegawai"
                        placeholder="Masukan nama pegawai" required>
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="form-label">Jabatan <span>*</span></label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="pegawai_gudang">Pegawai Gudang</option>
                        <option value="supir">Supir</option>
                        <option value="pegawai_penjadwalan">Pegawai Penjadwalan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="alamat_pegawai" class="form-label">Alamat Pegawai <span>*</span></label>
                    <textarea class="form-control input" name="alamat_pegawai" id="alamat_pegawai" placeholder="Masukan alamat pegawai"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="telp_pegawai" class="form-label">No. Telepon Pegawai <span>*</span></label>
                    <input type="text" class="form-control input" name="telp_pegawai" id="telp_pegawai"
                        placeholder="Masukan no. telepon pegawai" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
