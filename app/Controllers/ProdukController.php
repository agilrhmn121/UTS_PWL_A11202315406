<?php

namespace App\Controllers;

// Controller untuk menangani halaman produk
class ProdukController extends BaseController
{
    // Fungsi utama yang dijalankan saat mengakses route 'produk'
    public function index()
    {
        // Data produk statis, disimpan dalam array
        $barang = [
            [
                'nama'     => 'Pocong Phone X6pro',     // Nama produk
                'kategori' => 'Smartphone',          // Kategori produk
                'harga'    => 2999000,               // Harga dalam rupiah
                'stok'     => 10                     // Jumlah stok yang tersedia
            ],
            [
                'nama'     => 'Pocong Phone M6pro',
                'kategori' => 'Smartphone',
                'harga'    => 3999000,
                'stok'     => 8
            ],
            [
                'nama'     => 'Pocong Phone C3pro',
                'kategori' => 'Smartphone',
                'harga'    => 4999000,
                'stok'     => 5
            ],
        ];

        // Mengirim data produk ke view bernama 'v_produk'
        return view('v_produk', ['barang' => $barang]);
    }
}
