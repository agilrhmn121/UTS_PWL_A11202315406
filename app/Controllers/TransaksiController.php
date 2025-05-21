<?php

namespace App\Controllers;

// Menggunakan BaseController dan ResponseInterface jika dibutuhkan
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

// Controller untuk menangani transaksi (misalnya halaman keranjang belanja)
class TransaksiController extends BaseController
{
    // Fungsi utama yang akan dijalankan ketika mengakses route 'keranjang'
    public function index()
    {
        // Menampilkan view 'v_keranjang'
        return view('v_keranjang');
    }
}
