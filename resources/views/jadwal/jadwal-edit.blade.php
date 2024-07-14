@extends('master')

@section('title', 'Edit Jadwal')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Jadwal</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('jadwal.update', $tb_jadwal->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="id_outlet" class="form-label">Nama Outlet <span>*</span></label>
                    <select name="id_outlet" id="id_outlet" class="form-select">
                        <option value="" disabled selected>Pilih Nama Outlet</option>
                        @foreach ($tb_outlet as $o)
                            <option value="{{ $o->id }}" {{ $tb_jadwal->id_outlet == $o->id ? 'selected' : '' }}>
                                {{ $o->nama_outlet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_truk" class="form-label">Nomor Polisi Truk <span>*</span></label>
                    <select name="id_truk" id="id_truk" class="form-select">
                        <option value="" disabled selected>Pilih Nomor Polisi Truk</option>
                        @foreach ($tb_truk as $t)
                            <option value="{{ $t->id }}" {{ $tb_jadwal->id_truk == $t->id ? 'selected' : '' }}>
                                {{ $t->nomor_plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_supir" class="form-label">Nama Supir <span>*</span></label>
                    <select name="id_supir" id="id_supir" class="form-select">
                        <option value="" disabled selected>Pilih Nama Supir</option>
                        @foreach ($tb_supir as $s)
                            <option value="{{ $s->id }}" {{ $tb_jadwal->id_supir == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_supir }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jadwal" class="form-label">Tanggal Rencana Pengiriman <span>*</span></label>
                    <input type="date" class="form-control input" name="jadwal" id="jadwal"
                        value="{{ $tb_jadwal->jadwal }}" placeholder="Masukan tanggal rencana pengiriman">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="history.back()" href="{{ route('jadwal') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form -->
@endsection
