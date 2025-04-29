<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('v_home');
    }

    public function Hello($nama=null){
        $data['nama'] = $nama;
        $data['judul'] = 'judul halaman';

        return view('front',$data);
    }
    public function riwayatPembelian() {
      return view('v_riwayatPembelian');
  }
  public function stokBarang() {
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
            ]
        ];

        return view('v_stokBarang', ['barang' => $barang]);
    }
    public function pelanggan() {
      $dataUser['dataUser'] = [
          [
              'username' => 'agil',
              'role' => 'admin'
          ],
          [
              'username' => 'rahman',
              'role' => 'user'
          ]
      ];

      return view('v_pelanggan', $dataUser);
  }
}