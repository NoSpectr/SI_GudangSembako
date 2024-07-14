<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Data Pegawai</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Alamat Pegawai</th>
                <th>No. Telepon Pegawai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_pegawai }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $p->jabatan)) }}</td>
                    <td>{{ $p->alamat_pegawai }}</td>
                    <td>{{ $p->telp_pegawai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
