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
            // Aturan validasi untuk username dan password
            $rules = [
                'username' => 'required|min_length[6]',
                // Aturan 'numeric' berarti password harus hanya angka.
                // Jika Anda ingin password bisa mengandung huruf atau simbol, hapus '|numeric'.
                'password' => 'required|min_length[7]|numeric',
            ];

            // Jalankan validasi
            if ($this->validate($rules)) {
                // Ambil inputan username dan password dari form
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                // --- Ganti dengan hash yang Anda hasilkan dari '1234567' ---
                // Contoh hash (PASTIKAN ANDA MENGGANTI INI DENGAN HASH ASLI YANG ANDA GENERATE):
                $hashedPassword = '$2a$12$1.SzLkTaIfkYbQfcAPHRzeZ.kqv//GZiVjuZ7qIR5v3.fkeiAy3R2'; // Ganti ini!

                // Daftar user statis (simulasi database)
                $dataUser = [
                    [
                        'username' => 'agilkarbit', // Username diubah menjadi 'agilkarbit'
                        'password' => $hashedPassword, // Menggunakan hash password yang baru
                        'role'     => 'admin'
                    ],
                    [
                        'username' => 'rahmankarbit',
                        'password' => $hashedPassword, // Jika 'rahman' juga menggunakan password yang sama
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
                            session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                            return redirect()->back();
                        }
                    }
                }

                // Jika username tidak ditemukan
                if (!$userFound) {
                    session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                    return redirect()->back();
                }
            } else {
                // Jika validasi gagal, tampilkan error
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back();
            }
        }

        // Jika belum ada data POST, tampilkan halaman login
        return view('v_login');
    }

    public function logout()
    {
        // Menghapus semua session dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('login');
    }
}
