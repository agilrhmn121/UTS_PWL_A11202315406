<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// Controller untuk menampilkan halaman dashboard
class DashboardController extends BaseController
{
    // Fungsi utama yang dijalankan ketika mengakses route 'dashboard'
    public function index()
    {
        // Cek apakah pengguna sudah login
        // Jika tidak, alihkan ke halaman login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        // Ambil data pengguna dari session
        $username = session()->get('username');
        $role = session()->get('role');

        // Siapkan data yang akan dikirim ke view
        $data = [
            'username' => $username, // Nama pengguna
            'role' => $role,         // Peran pengguna (admin/user)
        ];

        // Logika berdasarkan peran (role) pengguna
        if ($role === 'admin') {
            // Data khusus untuk admin
            $data['menu'] = ['Kelola User', 'Lihat Stok Barang']; // Menu admin
            $data['message'] = 'Selamat datang Admin!'; // Pesan selamat datang admin
        } else {
            // Data khusus untuk user biasa
            $data['menu'] = ['Lihat Profil', 'Memesan Barang', 'Melihat Riwayat Pesanan', 'Melihat Keranjang Pesanan']; // Menu user biasa
            $data['message'] = 'Selamat datang User!'; // Pesan selamat datang user
        }

        // Kirim data ke view 'v_dashboard' dan tampilkan halaman dashboard
        return view('v_dashboard', $data);
    }
}
