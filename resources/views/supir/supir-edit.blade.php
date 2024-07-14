@extends('master')
<?php
$tb_rute = App\Models\ModelRute::all();
?>
@section('title', 'Edit Supir')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Supir</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('supir.update', $tb_supir->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_supir" class="form-label">Nama Supir <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_supir" id="nama_supir"
                        value="{{ $tb_supir->nama_supir }}" placeholder="Masukkan nama supir">
                </div>
                <div class="mb-4">
                    <label for="alamat_supir" class="form-label">Alamat Supir <span>*</span></label>
                    <input type="text" class="form-control input" name="alamat_supir" id="alamat_supir"
                        value="{{ $tb_supir->alamat_supir }}" placeholder="Masukkan alamat supir">
                </div>
                <div class="mb-4">
                    <label for="telp_supir" class="form-label">Telp Supir <span>*</span></label>
                    <input type="text" class="form-control input" name="telp_supir" id="telp_supir"
                        value="{{ $tb_supir->telp_supir }}" placeholder="Masukkan telp supir">
                </div>
                <div class="mb-4">
                    <label for="id_rute" class="form-label">Rute Gudang <span>*</span></label>
                    <select name="id_rute" id="id_rute" class="form-select">
                        <option value="" disabled selected>Pilih Rute Gudang</option>
                        @foreach ($tb_rute as $r)
                            <option value="{{ $r->id }}" {{ $tb_supir->id_rute == $r->id? 'selected' : '' }}>
                                {{ $r->nama_gudang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('supir') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form -->
@endsection
