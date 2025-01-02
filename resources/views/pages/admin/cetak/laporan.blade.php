<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
        }

        .badge-primary {
            background-color: #007bff;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-success {
            background-color: #28a745;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Pengaduan</h1>
        <h2 style="text-align: center;">
            {{ \Carbon\Carbon::parse($date['dari'][0])->format('d-M-Y') . ' - ' . \Carbon\Carbon::parse($date['sampai'][0])->format('d-M-Y') }}
        </h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nama Pengadu</th>
                    <th>Keluhan</th>
                    <th>Kategori Keluhan</th>
                    <th>Tanggapan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $v)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $v->keluhan->pelanggan->nama_222406 }}</td>
                        <td>{{ $v->keluhan->keluhan_222406 }}</td>
                        <td>{{ $v->keluhan->Kategori->nama_kategori_222406 }}</td>
                        <td>{{ $v->tanggapan_222406 }}</td>
                        <td>
                            @if ($v->keluhan->status_keluhan_222406 == 'Diproses')
                                <div class="badge badge-primary">
                                    {{ $v->keluhan->status_keluhan_222406 }}
                                </div>
                            @elseif ($v->keluhan->status_keluhan_222406 == 'Pending')
                                <div class="badge badge-warning">
                                    {{ $v->keluhan->status_keluhan_222406 }}
                                </div>
                            @else
                                <div class="badge badge-success">
                                    {{ $v->keluhan->status_keluhan_222406 }}
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
