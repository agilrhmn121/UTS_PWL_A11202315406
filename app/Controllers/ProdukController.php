<?php

namespace App\Controllers;

class ProdukController extends BaseController
{
    public function index()
    {
        $barang = [
            [
                'nama' => 'Pocong Phone X1',
                'kategori' => 'Smartphone',
                'harga' => 2999000,
                'stok' => 10
            ],
            [
                'nama' => 'Pocong Phone S2',
                'kategori' => 'Smartphone',
                'harga' => 3999000,
                'stok' => 8
            ],
            [
                'nama' => 'Pocong Phone M3',
                'kategori' => 'Smartphone',
                'harga' => 4999000,
                'stok' => 5
            ],
        ];

        return view('v_produk', ['barang' => $barang]);
    }
}
