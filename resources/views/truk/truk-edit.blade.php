@extends('master')

<title>Form Truk</title>

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Truk</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('truk.update') }}" method="post">
                @csrf
                <input type="hidden" name="id_truk" value="{{ $truk->id }}">
                <div class="mb-4">
                    <label for="nomor_plat" class="form-label">Nomor Polisi <span>*</span></label>
                    <input type="text" class="form-control input" name="nomor_plat" value="{{ $truk->nomor_plat }}"
                        id="nomor_plat" placeholder="Masukan nomor polisi">
                </div>
                <div class="mb-4">
                    <label for="kapasitas" class="form-label">Kapasitas Truk (kg) <span>*</span></label>
                    <input type="text" class="form-control input" name="kapasitas_truk"
                        value="{{ $truk->kapasitas_truk }}" id="kapasitas" placeholder="Masukan kapasitas truk (kg)">
                </div>
                <div class="mb-4">
                    <label for="kondisi_truk" class="form-label">Kondisi Truk <span>*</span></label>
                    <select name="kondisi_truk" id="kondisi_truk" class="form-select">
                        <option value="" disabled selected>Pilih Kondisi Truk</option>
                        <option value="Baik" {{ $truk->kondisi_truk == 'Baik' ? 'selected' : '' }}>
                            Baik</option>
                        <option value="Perlu diservis" {{ $truk->kondisi_truk == 'Perlu diservis' ? 'selected' : '' }}>
                            Perlu diservis</option>
                        <option value="Rusak" {{ $truk->kondisi_truk == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href="{{ route('truk') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End From -->
@endsection
