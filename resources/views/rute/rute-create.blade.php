@extends('master')
@php
    $tb_gudang = App\Models\ModelGudang::all();
@endphp
@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Rute</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('rute.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="form-label">Rute Gudang<span>*</span></label>
                    <select name="id_gudang" id="id_gudang" class="form-select">
                        <option value="" disabled selected>Pilih Gudang</option>
                        @foreach ($tb_gudang as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_gudang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="daftar_titik" class="form-label">Daftar Titik <span>*</span></label>
                    <input type="text" class="form-control input" name="daftar_titik" id="daftar_titik"
                        placeholder="Masukan daftar titik">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href={{ route('rute') }}
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
