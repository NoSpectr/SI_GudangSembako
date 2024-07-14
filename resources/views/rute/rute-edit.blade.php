@extends('master')

<title>Form Rute</title>

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Rute</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('rute.update', $tb_rute->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="id_rute" class="form-label">Rute Gudang <span>*</span></label>
                    <select class="form-control input" name="id_rute" id="id_rute">
                        @foreach ($tb_gudang as $g)
                            <option value="{{ $g->id }}" {{ $g->id == $tb_rute->id ? 'selected' : '' }}>
                                {{ $g->nama_gudang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="daftar_titik" class="form-label">Daftar Titik <span>*</span></label>
                    <input type="text" class="form-control input" name="daftar_titik"
                        value="{{ $tb_rute->daftar_titik }}" id="alamat" placeholder="Masukan daftar titik">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('rute') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End From -->
@endsection
