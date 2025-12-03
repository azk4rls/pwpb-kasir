<div>
<div class="container">
    <h3 class="mb-4 fw-bold">Beranda</h3>

    <div class="row g-3">

        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <h3 class="fw-bold">{{ $data['totalUsers'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <h3 class="fw-bold">{{ $data['totalProducts'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Transaksi</h5>
                    <h3 class="fw-bold">{{ $data['totalTransaksi'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Stok</h5>
                    <h3 class="fw-bold">{{ $data['totalStock'] }}</h3>
                </div>
            </div>
        </div>

    </div>
</div>
</div>