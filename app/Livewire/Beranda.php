<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Livewire\Component;

class Beranda extends Component
{
    public function getAll()
    {
        return [
            'totalUsers'     => User::count(),
            'totalProducts'  => Produk::count(),
            'totalTransaksi' => Transaksi::count(),
            'totalStock'     => Produk::sum('stok'),
        ];
    }

    public function render()
    {
        $data = $this->getAll();

        return view('livewire.beranda', [
            'data' => $data
        ]);
    }
}
