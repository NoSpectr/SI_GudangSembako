@extends('master')
@php
    $tb_rute = App\Models\ModelRute::all();
@endphp
@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Supir</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('supir.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_supir" class="form-label">Nama Supir<span>*</span></label>
                    <input type="text" class="form-control input" name="nama_supir" id="nama_supir"
                        placeholder="Masukkan nama supir">
                </div>
                <div class="mb-4">
                    <label for="alamat_supir" class="form-label">Alamat Supir<span>*</span></label>
                    <input type="text" class="form-control input" name="alamat_supir" id="alamat_supir"
                        placeholder="Masukkan alamat supir">
                </div>
                <div class="mb-4">
                    <label for="telp_supir" class="form-label">Telepon Supir<span>*</span></label>
                    <input type="text" class="form-control input" name="telp_supir" id="telp_supir"
                        placeholder="Masukkan Telepon supir">
                </div>
                <div class="mb-4">
                    <label for="nama_rute" class="form-label">Rute Gudang<span>*</span></label>
                    <select name="id_rute" id="nama_rute" class="form-select">
                        <option value="">Pilih Rute Gudang</option>
                        @foreach ($tb_rute as $r)
                            <option value="{{ $r->id }}">{{ $r->nama_gudang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href={{ route('supir') }}
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
