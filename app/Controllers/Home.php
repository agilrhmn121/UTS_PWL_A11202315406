<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Config\Services; // Import Services

class Home extends BaseController
{
    protected $product;
    protected $cart;

    public function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();

        // Dapatkan instance Cart
        $this->cart = Services::cart();
    }

    public function index(): string
    {
        $product = [
            [
                'id' => 1,
                'nama' => 'Pocong Phone X6pro',
                'kategori' => 'Smartphone',
                'harga' => 2999000,
                'foto' => 'X6pro.jpg',
                'stok' => 10
            ],
            [
                'id' => 2,
                'nama' => 'Pocong Phone M6pro',
                'kategori' => 'Smartphone',
                'harga' => 3999000,
                'foto' => 'pocoM6pro.jpg',
                'stok' => 8
            ],
            [
                'id' => 3,
                'nama' => 'Pocong Phone F7pro',
                'kategori' => 'Smartphone',
                'harga' => 4999000,
                'foto' => 'pocoF7pro.jpg',
                'stok' => 5
            ]
        ];

        return view('v_home', ['product' => $product]);
    }

    // Fungsi untuk menambahkan produk ke cart
    public function addToCart()
    {
        $post = $this->request->getPost();

        // Contoh input minimal: id, qty, price, name
        $item = [
            'id' => $post['id'],
            'qty' => (int)$post['qty'],
            'price' => (float)$post['price'],
            'name' => $post['name']
        ];

        $rowid = $this->cart->insert($item);

        if ($rowid) {
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan produk ke keranjang.');
        }
    }

    // Fungsi untuk menampilkan isi keranjang
    public function cart()
    {
        $data['cart'] = $this->cart->contents();
        return view('v_cart', $data);
    }

    // Fungsi untuk mengupdate jumlah item di keranjang
    public function updateCart()
    {
        $post = $this->request->getPost();

        // $post harus mengandung 'rowid' dan 'qty'
        $items = [];
        foreach ($post['rowid'] as $key => $rowid) {
            $items[] = [
                'rowid' => $rowid,
                'qty' => (int)$post['qty'][$key]
            ];
        }

        $updated = $this->cart->update($items);

        if ($updated) {
            return redirect()->back()->with('success', 'Keranjang berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui keranjang.');
        }
    }

    // Fungsi untuk menghapus item dari keranjang
    public function removeFromCart($rowid)
    {
        $this->cart->remove($rowid);
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
    public function riwayatPembelian()
{
    return view('v_riwayatPembelian');
}

    // Fungsi lain yang sudah ada tetap bisa dipakai...
}
