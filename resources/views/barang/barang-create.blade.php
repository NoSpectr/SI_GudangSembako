@extends('master')
@php
    $tb_kategori = App\Models\ModelKategori::all();
@endphp
@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Barang</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Barang <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_barang" id="nama"
                        placeholder="Masukan nama barang">
                </div>
                <div class="mb-4">
                    <label for="kategori" class="form-label">Kategori Barang <span>*</span></label>
                    <select name="id_kategori" id="id_kategori" class="form-select">
                        <option value="">Pilih Kategori</option>
                        @foreach ($tb_kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="satuan" class="form-label">Satuan Barang <span>*</span></label>
                    <input type="text" class="form-control input" name="satuan_barang" id="satuan"
                        placeholder="Masukan satuan barang">
                </div>
                <div class="mb-4">
                    <label for="harga_beli" class="form-label">Harga Beli <span>*</span></label>
                    <input type="number" class="form-control input" name="harga_beli" id="harga_beli"
                        placeholder="Masukkan harga beli">
                </div>
                <div class="mb-4">
                    <label for="harga_jual" class="form-label">Harga Jual <span>*</span></label>
                    <input type="number" class="form-control input" name="harga_jual" id="harga_jual"
                        placeholder="Masukkan harga jual">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
