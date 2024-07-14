@extends('master')
@php
    $tb_outlet = App\Models\ModelOutlet::all();
    $tb_truk = App\Models\ModelTruk::all();
    $tb_supir = App\Models\ModelSupir::all();
    $tb_pengiriman = App\Models\ModelPengiriman::all();
@endphp
@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Form Data Pengiriman</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pengiriman.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_outlet" class="form-label">Outlet <span>*</span></label>
                    <select name="id_outlet" id="id_outlet" class="form-control input">
                        <option value="">Pilih Outlet</option>
                        @foreach ($tb_outlet as $o)
                            <option value="{{ $o->id }}">{{ $o->nama_outlet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_truk" class="form-label">Truk <span>*</span></label>
                    <select name="id_truk" id="id_truk" class="form-control input">
                        <option value="">Pilih Truk</option>
                        @foreach ($tb_truk as $t)
                            <option value="{{ $t->id }}">{{ $t->nomor_plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_supir" class="form-label">Supir <span>*</span></label>
                    <select name="id_supir" id="id_supir" class="form-control input">
                        <option value="">Pilih Supir</option>
                        @foreach ($tb_supir as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_supir }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status_pengiriman" class="form-label">Status Pengiriman <span>*</span></label>
                    <select name="status_pengiriman" id="status_pengiriman" class="form-select">
                        <option value="" disabled selected>Pilih Status Pengiriman</option>
                        <option value="Terkirim">Terkirim</option>
                        <option value="Belum Terkirim">Belum Terkirim</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tgl_pengiriman" class="form-label">Tanggal Pengiriman <span>*</span></label>
                    <input type="date" class="form-control input" name="tgl_pengiriman" id="tanggal_pengiriman"
                        placeholder="Masukan tanggal pengiriman">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" href={{ route('truk') }}
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
