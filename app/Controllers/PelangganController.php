<?php

namespace App\Controllers;

// Controller untuk menampilkan data pelanggan
class PelangganController extends BaseController
{
    // Fungsi utama yang dijalankan saat mengakses route 'pelanggan'
    public function index()
    {
        // Data user statis sebagai dummy (simulasi database)
        $dataUser = [
            [
                'username' => 'agil',  // Nama pengguna
                'role'     => 'admin'  // Peran (role) pengguna
            ],
            [
                'username' => 'rahman',
                'role'     => 'user'
            ],
        ];

        // Mengirim data ke view 'v_pelanggan' dengan nama variabel 'dataUser'
        return view('v_pelanggan', ['dataUser' => $dataUser]);
    }
}
