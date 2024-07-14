<title>Data Jadwal</title>
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
    <h2>Data Jadwal</h2>
</center>

{{-- Tabel Data Jadwal --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Outlet</th>
            <th>Nomor Polisi</th>
            <th>Nama Supir</th>
            <th>Jadwal Pengiriman</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tb_jadwal as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->outlet->nama_outlet }}</td>
                <td>{{ $j->truk->nomor_plat }}</td>
                <td>{{ $j->supir->nama_supir }}</td>
                <td>{{ $j->jadwal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
