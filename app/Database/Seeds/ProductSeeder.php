<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // membuat data produk Pocong Phone
        $data = [
            [
                'nama'       => 'Pocong Phone X1',
                'harga'      => 2999000,
                'jumlah'       => 10,
                'foto'       => 'pocong_x1.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama'       => 'Pocong Phone S2',
                'harga'      => 3999000,
                'jumlah'       => 8,
                'foto'       => 'pocong_s2.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama'       => 'Pocong Phone M3',
                'harga'      => 4999000,
                'jumlah'       => 5,
                'foto'       => 'pocong_m3.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        // Insert data ke tabel 'product'
        foreach ($data as $item) {
            $this->db->table('product')->insert($item);
        }
    }
}
