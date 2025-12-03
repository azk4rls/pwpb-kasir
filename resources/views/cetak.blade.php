<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .card-title {
            font-weight: 700;
            color: #0d6efd;
        }
        table thead th {
            background: #0d6efd;
            color: white;
            text-align: center;
        }
        table tbody tr td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Laporan Transaksi</h3>
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Inv</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaTransaksi as $transaksi)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$transaksi->created_at}}</td>
                                    <td>{{$transaksi->kode}}</td>
                                    <td>Rp. {{number_format($transaksi->total, 2, '.', '.')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
