@extends('master')

@section('title', 'Edit Pengiriman')

@section('content')
    <div class="content-form">
        <h4 class="fw-semibold mb-4">Edit Data Pengiriman</h4>
        {{-- Form --}}
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('pengiriman.update', $tb_pengiriman->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="id_outlet" class="form-label">Nama Outlet <span>*</span></label>
                    <select name="id_outlet" id="id_outlet" class="form-select">
                        <option value="" disabled selected>Pilih Nama Outlet</option>
                        @foreach ($tb_outlet as $o)
                            <option value="{{ $o->id }}" {{ $tb_pengiriman->id_outlet == $o->id ? 'selected' : '' }}>
                                {{ $o->nama_outlet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_truk" class="form-label">Nomor Polisi Truk <span>*</span></label>
                    <select name="id_truk" id="id_truk" class="form-select">
                        <option value="" disabled selected>Pilih Nomor Polisi Truk</option>
                        @foreach ($tb_truk as $t)
                            <option value="{{ $t->id }}" {{ $tb_pengiriman->id_truk == $t->id ? 'selected' : '' }}>
                                {{ $t->nomor_plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_supir" class="form-label">Nama Supir <span>*</span></label>
                    <select name="id_supir" id="id_supir" class="form-select">
                        <option value="" disabled selected>Pilih Nama Supir</option>
                        @foreach ($tb_supir as $s)
                            <option value="{{ $s->id }}" {{ $tb_pengiriman->id_supir == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_supir }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status_pengiriman" class="form-label">Status Pengiriman <span>*</span></label>
                    <select name="status_pengiriman" id="status_pengiriman" class="form-select">
                        <option value="" disabled selected>Pilih Status Pengiriman</option>
                        <option value="Terkirim" {{ $tb_pengiriman->status_pengiriman == 'Terkirim' ? 'selected' : '' }}>
                            Terkirim</option>
                        <option value="Belum Terkirim"
                            {{ $tb_pengiriman->status_pengiriman == 'Belum Terkirim' ? 'selected' : '' }}>Belum Terkirim
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tgl_pengiriman" class="form-label">Tanggal Pengiriman <span>*</span></label>
                    <input type="date" class="form-control input" name="tgl_pengiriman" id="tanggal_pengiriman"
                        value="{{ $tb_pengiriman->tgl_pengiriman }}" placeholder="Masukan tanggal pengiriman">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="history.back()" href="{{ route('pengiriman') }}"
                        class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form -->
@endsection
