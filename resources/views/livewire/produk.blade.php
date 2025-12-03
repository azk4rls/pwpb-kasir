<!-- Improved UI Produk Management - Bootstrap 5 Modern UI -->
<style>
    .nav-btn {
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
        transition: .3s;
    }
    .nav-btn.active {
        background: #fd0d0dff;
        color: white;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }
    .nav-btn:not(.active):hover {
        background: #e7f0ff;
        border-color: #fd0d0dff;
        color: #fd0d0dff;
    }
    .card-custom {
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    .table-hover tbody tr:hover {
        background: #f3f7ff;
    }
    .card-header {
        font-size: 18px;
        font-weight: 700;
        padding: 15px 20px;
    }
    .form-label {
        font-weight: 600;
    }
</style>

<div class="container mt-3 mb-5">
    <div class="row mb-3">
        <div class="col-12 d-flex gap-2">
            <button class="btn nav-btn {{ $pilihanMenu=='lihat' ? 'active' : '' }}" wire:click="pilihMenu('lihat')">
                <i class="bi bi-grid"></i> Semua Produk
            </button>

            <button class="btn nav-btn {{ $pilihanMenu=='tambah' ? 'active' : '' }}" wire:click="pilihMenu('tambah')">
                <i class="bi bi-plus-square"></i> Tambah Produk
            </button>

            <button class="btn btn-info px-3 fw-bold" wire:loading>
                <span class="spinner-border spinner-border-sm"></span> Loading...
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if($pilihanMenu=='lihat')
            <div class="card card-custom border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="bi bi-box-seam"></i> Semua Produk
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-danger">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($semuaProduk as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->kode }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>Rp {{ number_format($produk->harga,0,',','.') }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>
                                    <button wire:click="pilihEdit({{ $produk->id }})" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button wire:click="pilihHapus({{ $produk->id }})" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($pilihanMenu=='tambah')
            <div class="card card-custom border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="bi bi-plus-square"></i> Tambah Produk
                </div>
                <div class="card-body">
                    <form wire:submit="simpan">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model="nama"/>
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" wire:model="kode"/>
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" wire:model="harga"/>
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Stok</label>
                        <input type="text" class="form-control" wire:model="stok"/>
                        @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <button type="submit" class="btn btn-danger mt-2 px-4">SIMPAN</button>
                    </form>
                </div>
            </div>

            @elseif($pilihanMenu=='edit')
            <div class="card card-custom border-warning">
                <div class="card-header bg-warning fw-bold">
                    <i class="bi bi-pencil-square"></i> Edit Produk
                </div>
                <div class="card-body">
                    <form wire:submit="simpanEdit">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model="nama"/>
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" wire:model="kode"/>
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" wire:model="harga"/>
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <label class="form-label">Stok</label>
                        <input type="text" class="form-control" wire:model="stok"/>
                        @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                        <br>

                        <button type="submit" class="btn btn-warning mt-2 px-4 fw-bold">UPDATE</button>
                    </form>
                </div>
            </div>

            @elseif($pilihanMenu=='hapus')
            <div class="card card-custom border-danger">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-exclamation-triangle"></i> Hapus Produk
                </div>
                <div class="card-body">
                    <p class="mb-1 fw-bold">Apakah kamu yakin ingin menghapus Produk ini?</p>
                    <p>Kode : {{$produkTerpilih->kode}}</p>
                    <p>Nama : {{$produkTerpilih->nama}}</p>

                    <button class="btn btn-danger px-4 me-2" wire:click="hapus">HAPUS</button>
                    <button class="btn btn-secondary px-4" wire:click="batal">BATAL</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
