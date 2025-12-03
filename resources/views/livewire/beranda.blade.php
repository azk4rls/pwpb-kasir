<style>
    .dashboard-card {
        border-radius: 18px;
        padding: 20px;
        color: white;
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        transition: 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.25);
    }

    .dashboard-card .icon-bg {
        position: absolute;
        right: -10px;
        bottom: -10px;
        font-size: 70px;
        opacity: 0.15;
    }

    .dashboard-title {
        font-weight: 700;
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .dashboard-value {
        font-weight: 800;
        font-size: 2rem;
        margin-top: 5px;
    }
</style>

<div>
<div class="container">
    <h3 class="mb-4 fw-bold">Beranda</h3>

    <div class="row g-3">

        <div class="col-md-3">
            <div class="dashboard-card bg-primary">
                <div class="icon-bg"><i class="bi bi-people-fill"></i></div>
                <div class="card-body p-0">
                    <div class="dashboard-title">Total User</div>
                    <div class="dashboard-value">{{ $data['totalUsers'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card bg-success">
                <div class="icon-bg"><i class="bi bi-box-seam"></i></div>
                <div class="card-body p-0">
                    <div class="dashboard-title">Total Produk</div>
                    <div class="dashboard-value">{{ $data['totalProducts'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card bg-warning text-dark">
                <div class="icon-bg text-dark"><i class="bi bi-receipt"></i></div>
                <div class="card-body p-0">
                    <div class="dashboard-title">Jumlah Transaksi</div>
                    <div class="dashboard-value">{{ $data['totalTransaksi'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card bg-danger">
                <div class="icon-bg"><i class="bi bi-graph-up-arrow"></i></div>
                <div class="card-body p-0">
                    <div class="dashboard-title">Total Stok</div>
                    <div class="dashboard-value">{{ $data['totalStock'] }}</div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
