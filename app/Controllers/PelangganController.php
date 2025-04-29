<?php

namespace App\Controllers;

class PelangganController extends BaseController
{
    public function index()
    {
        // Data dummy user
        $dataUser = [
            
            [
                'username' => 'agil',
                'role' => 'admin'
            ],
            [
                'username' => 'rahman',
                'role' => 'user'
            ],
        ];

        // Kirim data ke view
        return view('v_pelanggan', ['dataUser' => $dataUser]);
    }
}
