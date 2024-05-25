@extends('master')

@section('title', 'Edit Stok')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Stok</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('stok.update', $tb_stokBarang->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="id_barang" class="form-label">Nama Barang <span>*</span></label>
                    <select name="id_barang" id="id_barang" class="form-select">
                        <option value="" disabled selected>Pilih Barang</option>
                        @foreach ($tb_barang as $b)
                            <option value="{{ $b->id }}" {{ $tb_stokBarang->id_barang == $b->id ? 'selected' : '' }}>
                                {{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_gudang" class="form-label">Rute Gudang <span>*</span></label>
                    <select name="id_gudang" id="id_gudang" class="form-select">
                        <option value="" disabled selected>Pilih Gudang</option>
                        @foreach ($tb_gudang as $g)
                            <option value="{{ $g->id }}" {{ $tb_stokBarang->id_gudang == $g->id ? 'selected' : '' }}>
                                {{ $g->nama_gudang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jumlah_stok" class="form-label">Jumlah Stok <span>*</span></label>
                    <input type="number" class="form-control input" name="jumlah_stok"
                        value="{{ $tb_stokBarang->jumlah_stok }}" id="jumlah_stok" placeholder="Masukkan jumlah stok">
                </div>
                <div class="mb-4">
                    <label for="tgl_masuk" class="form-label">Tanggal Masuk <span>*</span></label>
                    <input type="date" class="form-control input" name="tgl_masuk"
                        value="{{ $tb_stokBarang->tgl_masuk }}" id="tgl_masuk">
                </div>
                <div class="mb-4">
                    <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa <span>*</span></label>
                    <input type="date" class="form-control input" name="tgl_kadaluarsa"
                        value="{{ $tb_stokBarang->tgl_kadaluarsa }}" id="tgl_kadaluarsa">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('stok') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form -->
@endsection
