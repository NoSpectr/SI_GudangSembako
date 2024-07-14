@extends('master')

<title>Form Outlet</title>

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Outlet</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('outlet.update') }}" method="post">
                @csrf
                <input type="hidden" name="id_outlet" value="{{ $outlet->id }}">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Outlet <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_outlet" value="{{ $outlet->nama_outlet }}"
                        id="nama" placeholder="Masukan nama outlet">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat Outlet <span>*</span></label>
                    <input type="text" class="form-control input" name="alamat_outlet"
                        value="{{ $outlet->alamat_outlet }}" id="alamat" placeholder="Masukan alamat outlet">
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="form-label">Nomor Telepon <span>*</span></label>
                    <input type="text" class="form-control input" name="no_telp" value="{{ $outlet->no_telp }}"
                        id="no_telp" placeholder="Masukan nomor telepon">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('outlet') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End From -->
@endsection
