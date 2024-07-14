@extends('master')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Data Barang</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('barang.update', $barang->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Barang <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_barang" id="nama"
                        placeholder="Masukan nama barang" value="{{ $barang->nama_barang }}">
                </div>
                <div class="mb-4">
                    <label for="kategori" class="form-label">Kategori Barang <span>*</span></label>
                    <select class="form-control input" id="kategori" name="id_kategori">
                        <option value="" disabled selected id="defautlSelect">Pilih Kategori Barang</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}"{{ $barang->id_kategori == $k->id ? 'Selected' : '' }}>
                                {{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="satuan" class="form-label">Satuan Barang <span>*</span></label>
                    <input type="text" class="form-control input" name="satuan_barang" id="satuan"
                        placeholder="Masukan satuan barang" value="{{ $barang->satuan_barang }}">
                </div>
                <div class="mb-4">
                    <label for="harga_beli" class="form-label">Harga Beli <span>*</span></label>
                    <input type="number" class="form-control input" name="harga_beli" id="harga_beli"
                        placeholder="Masukkan harga beli" value="{{ $barang->harga_beli }}">
                </div>
                <div class="mb-4">
                    <label for="harga_jual" class="form-label">Harga Jual <span>*</span></label>
                    <input type="number" class="form-control input" name="harga_jual" id="harga_jual"
                        placeholder="Masukkan harga jual" value="{{ $barang->harga_jual }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('barang') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
