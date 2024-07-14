@extends('master')

<title>Form Gudang</title>

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Gudang</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('gudang.update') }}" method="post">
                @csrf
                <input type="hidden" name="id_gudang" value="{{ $gudang->id }}">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Gudang <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_gudang"
                        value="{{ $gudang->nama_gudang }}" id="nama" placeholder="Masukan nama gudang">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat Gudang <span>*</span></label>
                    <input type="text" class="form-control input" name="alamat_gudang"
                        value="{{ $gudang->alamat_gudang }}" id="alamat" placeholder="Masukan alamat gudang">
                </div>
                <div class="mb-4">
                    <label for="kapasitas" class="form-label">Kapasitas Gudang <span>*</span></label>
                    <input type="text" class="form-control input" name="kapasitas_gudang"
                        value="{{ $gudang->kapasitas_gudang }}" id="kapasitas" placeholder="Masukan kapasitas gudang">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('gudang') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End From -->
@endsection
