<title>Data Rute</title>
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
    <h2>Data Rute</h2>
</center>

{{-- Tabel Rute --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Rute</th>
            <th>Daftar Titik</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_rute as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->nama_rute }}</td>
                <td>{{ $r->daftar_titik }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
