<?php

namespace App\Controllers;

// Home Controller, biasanya digunakan sebagai halaman utama setelah login
class Home extends BaseController
{
    // Fungsi index() akan dijalankan saat mengakses URL '/'
    public function index(): string
    {
        // Data produk dummy
        $product = [
            [
                'nama' => 'Pocong Phone X6pro',
                'kategori' => 'Smartphone',
                'harga' => 2999000,
                'foto' => 'X6pro.jpg',
                'stok' => 10
            ],
            [
                'nama' => 'Pocong Phone M6pro',
                'kategori' => 'Smartphone',
                'harga' => 3999000,
                'foto' => 'pocoM6pro.jpg',
                'stok' => 8
            ],
            [
                'nama' => 'Pocong Phone F7pro',
                'kategori' => 'Smartphone',
                'harga' => 4999000,
                'foto' => 'pocoF7pro.jpg',
                'stok' => 5
            ]
        ];

        // Mengirim data produk ke view 'v_home'
        return view('v_home', ['product' => $product]);
    }

    // Fungsi untuk menampilkan halaman dengan parameter nama
    public function Hello($nama = null)
    {
        // Menyimpan nama dan judul ke dalam array $data
        $data['nama'] = $nama;
        $data['judul'] = 'judul halaman';

        // Mengirim data ke view bernama 'front'
        return view('front', $data);
    }

    // Fungsi untuk menampilkan halaman riwayat pembelian
    public function riwayatPembelian()
    {
        // Menampilkan view 'v_riwayatPembelian'
        return view('v_riwayatPembelian');
    }

    // Fungsi untuk menampilkan stok barang yang tersedia
    public function stokBarang()
    {
        // Data dummy daftar barang (bisa diganti dari database nanti)
        $barang = [
            [
                'nama' => 'Pocong Phone X6pro',
                'kategori' => 'Smartphone',
                'harga' => 2999000,
                'stok' => 10
            ],
            [
                'nama' => 'Pocong Phone M6pro',
                'kategori' => 'Smartphone',
                'harga' => 3999000,
                'stok' => 8
            ],
            [
                'nama' => 'Pocong Phone F7pro',
                'kategori' => 'Smartphone',
                'harga' => 4999000,
                'stok' => 5
            ]
        ];

        // Mengirim data barang ke view 'v_stokBarang'
        return view('v_stokBarang', ['barang' => $barang]);
    }

    // Fungsi ini tampaknya duplikat dari controller pelanggan, sebaiknya pindah ke PelangganController
    public function pelanggan()
    {
        // Data user statis
        $dataUser['dataUser'] = [
            [
                'username' => 'agilkarbit',
                'role' => 'admin'
            ],
            [
                'username' => 'rahmankarbit',
                'role' => 'user'
            ]
        ];

        // Menampilkan view 'v_pelanggan' dengan data user
        return view('v_pelanggan', $dataUser);
    }
}
