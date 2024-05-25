<title>Data Supir</title>
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
    <h2>Data Supir</h2>
</center>

{{-- Tabel Supir --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Rute Gudang</th>
            <th>Nama Supir</th>
            <th>Alamat Supir</th>
            <th>Telp Supir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_supir as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama_gudang }}</td>
                <td>{{ $s->nama_supir }}</td>
                <td>{{ $s->alamat_supir }}</td>
                <td>{{ $s->telp_supir }}</td>
            </tr>
        @endforeach
    </tbody>
</table>