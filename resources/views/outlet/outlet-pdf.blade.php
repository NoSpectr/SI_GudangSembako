<title>Data Outlet</title>
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
    <h2>Data Outlet</h2>
</center>

{{-- Tabel Outlet --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Outlet</th>
            <th>Alamat</th>
            <th>No Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($outlet as $o)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $o->nama_outlet }}</td>
                <td>{{ $o->alamat_outlet }}</td>
                <td>{{ $o->no_telp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
