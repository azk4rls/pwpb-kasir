<style>
    .menu-btn-group .btn {
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 600;
        transition: 0.2s;
    }
    .menu-btn-group .btn:hover {
        transform: translateY(-2px);
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card-header {
        font-size: 1.1rem;
        font-weight: 600;
        padding: 15px;
    }

    table thead th {
        text-align: center;
    }

    table tbody td {
        vertical-align: middle;
        text-align: center;
    }

    label {
        font-weight: 600;
        margin-top: 5px;
    }

    input, select {
        border-radius: 10px !important;
    }

    .btn-danger, .btn-danger, .btn-secondary, .btn-warning {
        border-radius: 10px;
        font-weight: 600;
    }
</style>

<div>
    <div class="container">
        <div class="row my-3">
            <div class="col-12 menu-btn-group d-flex gap-2">
                <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu=='lihat' ? 'btn-danger' : 'btn-outline-danger'}}">
                    Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu=='tambah' ? 'btn-danger' : 'btn-outline-danger'}}">
                    Tambah Pengguna
                </button>
                <button wire:loading class="btn btn-info rounded-pill px-4">
                    Loading ...
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                @if($pilihanMenu=='lihat')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Semua Pengguna
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-danger">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaPengguna as $pengguna)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengguna->name }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>{{ $pengguna->peran }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $pengguna->id }})" class="btn btn-sm btn-warning me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button wire:click="pilihHapus({{ $pengguna->id }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @elseif ($pilihanMenu=='tambah')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">Tambah Pengguna</div>
                    <div class="card-body">
                        <form wire:submit='simpan'>
                            <label>Nama</label>
                            <input type="text" class="form-control" wire:model='nama'/>
                            @error('nama')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Email</label>
                            <input type="email" class="form-control" wire:model='email'/>
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Password</label>
                            <input type="password" class="form-control" wire:model='password'/>
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Peran</label>
                            <select class="form-control" wire:model="peran">
                                <option value="">--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @error('peran')<span class="text-danger">{{$message}}</span>@enderror

                            <button type="submit" class="btn btn-danger mt-3 px-4">SIMPAN</button>
                        </form>
                    </div>
                </div>

                @elseif ($pilihanMenu=='edit')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">Edit Pengguna</div>
                    <div class="card-body">
                        <form wire:submit="simpanEdit">
                            <label>Nama</label>
                            <input type="text" class="form-control" wire:model='nama'/>
                            @error('nama')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Email</label>
                            <input type="email" class="form-control" wire:model='email'/>
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Password</label>
                            <input type="password" class="form-control" wire:model='password'/>
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror

                            <label>Peran</label>
                            <select class="form-control" wire:model="peran">
                                <option value="">--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @error('peran')<span class="text-danger">{{$message}}</span>@enderror

                            <button type="submit" class="btn btn-danger mt-3 px-4">SIMPAN</button>
                            <button type="button" class="btn btn-secondary mt-3 px-4" wire:click="batal">BATAL</button>
                        </form>
                    </div>
                </div>

                @elseif ($pilihanMenu=='hapus')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">Hapus Pengguna</div>
                    <div class="card-body">
                        Apakah kamu yakin akan menghapus pengguna ini?
                        <p class="mt-2"><strong>Nama :</strong> {{$penggunaTerpilih->name}}</p>
                        <button class="btn btn-danger px-4" wire:click="hapus">HAPUS</button>
                        <button class="btn btn-secondary px-4" wire:click="batal">BATAL</button>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
