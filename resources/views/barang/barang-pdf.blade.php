<title>Data Barang</title>
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
    <h2>Data Barang</h2>
</center>

{{-- Tabel Rute --}}
<table border="1" class="table table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Satuan Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tb_barang as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->nama_barang }}</td>
                <td>{{ $r->nama_kategori }}</td>
                <td>{{ $r->satuan_barang }}</td>
                <td>{{ $r->harga_beli }}</td>
                <td>{{ $r->harga_jual }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
