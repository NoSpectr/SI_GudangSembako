@extends('master')
@php
    $tb_outlet = App\Models\ModelOutlet::all();
    $tb_truk = App\Models\ModelTruk::all();
    $tb_supir = App\Models\ModelSupir::all();
@endphp
@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Jadwal</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_outlet" class="form-label">Nama Outlet <span>*</span></label>
                    <select name="id_outlet" id="id_outlet" class="form-control input">
                        <option value="" disabled selected>Pilih Nama Outlet</option>
                        @foreach ($tb_outlet as $o)
                            <option value="{{ $o->id }}">{{ $o->nama_outlet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_truk" class="form-label">Nomor Polisi Truk <span>*</span></label>
                    <select name="id_truk" id="id_truk" class="form-control input">
                        <option value="" disabled selected>Pilih Nomor Polisi Truk</option>
                        @foreach ($tb_truk as $t)
                            <option value="{{ $t->id }}">{{ $t->nomor_plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_supir" class="form-label">Nama Supir <span>*</span></label>
                    <select name="id_supir" id="id_supir" class="form-control input">
                        <option value="" disabled selected>Pilih Nama Outlet</option>
                        @foreach ($tb_supir as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_supir }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jadwal" class="form-label">Tanggal Rencana Pengiriman <span>*</span></label>
                    <input type="date" class="form-control input" name="jadwal" id="jadwal"
                        placeholder="Masukan tanggal rencana pengiriman">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href={{ route('jadwal') }}
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
