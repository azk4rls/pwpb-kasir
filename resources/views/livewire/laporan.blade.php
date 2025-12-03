<style>
    .card-red {
        border-radius: 15px;
        border: 2px solid #dc3545;
        box-shadow: 0 4px 15px rgba(220,53,69,0.25);
        overflow: hidden;
    }

    .card-red-header {
        background: #dc3545;
        color: white;
        padding: 15px;
        font-size: 1.3rem;
        font-weight: 700;
    }

    table thead th {
        background: #dc3545;
        color: white;
        text-align: center;
    }

    table tbody tr td {
        vertical-align: middle;
        text-align: center;
    }

    .btn-cetak {
        background: #dc3545;
        color: white;
        padding: 7px 18px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-cetak:hover {
        background: #b52b36;
        color: white;
    }
</style>

<div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card card-red">
                    <div class="card-red-header d-flex justify-content-between align-items-center">
                        <span>Laporan Transaksi</span>
                        <a href="{{url('/cetak')}}" target="_blank" class="btn-cetak">CETAK</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
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
</div>
