@extends('master')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Outlet</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('outlet.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Outlet <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_outlet" id="nama"
                        placeholder="Masukan nama outlet">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat Outlet <span>*</span></label>
                    <input type="text" class="form-control input" name="alamat_outlet" id="alamat"
                        placeholder="Masukan alamat outlet">
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="form-label">Nomor Telepon <span>*</span></label>
                    <input type="text" class="form-control input" name="no_telp" id="no_telp"
                        placeholder="Masukan nomor telepon">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href={{ route('outlet') }}
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
