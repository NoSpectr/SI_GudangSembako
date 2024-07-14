<title>Data Pengiriman</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table th {
        padding: 10px;
    }

    table td {
        padding: 5px;
    }
</style>
<center>
    <h2>Data Pengiriman</h2>
</center>

{{-- Tabel Data Pengiriman --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Outlet</th>
            <th>Nomor Polisi</th>
            <th>Nama Supir</th>
            <th>Status Pengiriman</th>
            <th>Tanggal Pengiriman</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tb_pengiriman as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->outlet->nama_outlet }}</td>
                <td>{{ $p->truk->nomor_plat }}</td>
                <td>{{ $p->supir->nama_supir }}</td>
                <td>{{ $p->status_pengiriman }}</td>
                <td>{{ $p->tgl_pengiriman }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
