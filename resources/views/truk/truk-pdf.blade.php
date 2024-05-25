<title>Data Truk</title>
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
    <h2>Data Truk</h2>
</center>

{{-- Tabel Truk --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nomor Polisi</th>
            <th>Kapasitas Truk</th>
            <th>Kondisi Truk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($truk as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->nomor_plat }}</td>
                <td>{{ $t->kapasitas_truk }}</td>
                <td>{{ $t->kondisi_truk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
