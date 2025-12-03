<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            padding: 20px;
        }

        .invoice-container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .header-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table thead th {
            background: #0d6efd;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        table tbody td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .footer-note {
            margin-top: 25px;
            text-align: center;
            font-size: 13px;
            color: #666;
        }

        /* --- MODE PRINT --- */
        @media print {
            body {
                background: white !important;
            }
            .invoice-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
            }
        }

        /* Tombol Print */
        .btn-print {
            display: block;
            width: 200px;
            padding: 10px 15px;
            margin: 20px auto;
            background: #0d6efd;
            color: white;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <a href="#" class="btn-print" onclick="window.print()">🖨️ Cetak Invoice</a>

    <div class="invoice-container">
        <div class="header-title">Laporan Transaksi</div>
        <div class="subtitle">PT Japetra Industries - Dimsum Jawara</div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Invoice</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semuaTransaksi as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $transaksi->kode }}</td>
                    <td>Rp {{ number_format($transaksi->total, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer-note">
            Dicetak otomatis — Sistem Kasir PT Azka.<br>
            Terima kasih telah menggunakan layanan kami.
        </div>
    </div>

</body>
</html>
