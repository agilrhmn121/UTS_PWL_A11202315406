<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    function __construct()
    {
        // Memuat helper form agar fungsi seperti form_open(), form_input() bisa digunakan di view
        helper('form');
    }

    public function login()
    {
        // Jika request berisi data POST (misalnya dari form login)
        if ($this->request->getPost()) {
            // Ambil inputan username dan password dari form
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // Password hash dari '123' menggunakan password_hash()
            $hashedPassword = '$2y$10$/JuUA1dyfIcp1cO93vyF3OkcORZ5tMLWZSLCPLb5IU4e1.8GWml0e';

            // Daftar user statis (simulasi database)
            $dataUser = [
                [
                    'username' => 'agil',
                    'password' => $hashedPassword,
                    'role'     => 'admin'
                ],
                [
                    'username' => 'rahman',
                    'password' => $hashedPassword,
                    'role'     => 'user'
                ]
            ];

            $userFound = false; // Penanda apakah username ditemukan

            // Loop untuk mencari user berdasarkan username
            foreach ($dataUser as $user) {
                if ($username === $user['username']) {
                    $userFound = true;

                    // Verifikasi password menggunakan password_verify()
                    if (password_verify($password, $user['password'])) {
                        // Jika cocok, simpan data ke session
                        session()->set([
                            'username'   => $user['username'],
                            'role'       => $user['role'],
                            'isLoggedIn' => true
                        ]);

                        // Redirect ke halaman utama
                        return redirect()->to(base_url('/'));
                    } else {
                        // Password salah
                        session()->setFlashdata('failed', 'Password salah');
                        return redirect()->back();
                    }
                }
            }

            // Jika username tidak ditemukan
            if (!$userFound) {
                session()->setFlashdata('failed', 'Username tidak ditemukan');
                return redirect()->back();
            }
        } else {
            // Jika belum ada data POST, tampilkan halaman login
            return view('v_login');
        }
    }

    public function logout()
    {
        // Menghapus semua session dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('login');
    }
}
