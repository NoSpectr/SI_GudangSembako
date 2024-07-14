<title>Data Gudang</title>
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
    <h2>Data Gudang</h2>
</center>

{{-- Tabel Kategori --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Gudang</th>
            <th>Alamat</th>
            <th>Kapasitas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gudang as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama_gudang }}</td>
                <td>{{ $g->alamat_gudang }}</td>
                <td>{{ $g->kapasitas_gudang }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
