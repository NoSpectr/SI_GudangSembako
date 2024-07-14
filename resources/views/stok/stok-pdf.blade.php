<title>Data Stok</title>
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
    <h2>Data Stok</h2>
</center>

{{-- Tabel Stok --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Nama Gudang</th>
            <th>Stok Barang</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Kadaluarsa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_stok as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama_barang }}</td>
                <td>{{ $s->nama_gudang }}</td>
                <td>{{ $s->jumlah_stok }}</td>
                <td>{{ $s->tgl_masuk }}</td>
                <td>{{ $s->tgl_kadaluarsa }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
