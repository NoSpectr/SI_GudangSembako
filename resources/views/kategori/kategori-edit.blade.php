@extends('master')

<title>Form Kategori</title>

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Kategori</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('kategori.update') }}" method="post">
                @csrf
                <input type="hidden" name="id_kategori" value="{{ $kategori->id }}">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Kategori <span>*</span></label>
                    <input type="text" class="form-control input" name="nama_kategori"
                        value="{{ $kategori->nama_kategori }}" id="nama" placeholder="Masukan nama kategori">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('kategori') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End From -->
@endsection
