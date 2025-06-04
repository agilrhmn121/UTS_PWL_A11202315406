<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: right;
        }
    </style>
</head>
<body>

    <h1>Data Produk</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Foto</th>
        </tr>

        <?php
        $no = 1;
        foreach ($product as $index => $produk) :
            $path = FCPATH . 'img/' . $produk['foto']; // Gunakan FCPATH agar path absolut
            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            } else {
                $base64 = '';
            }
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($produk['nama']) ?></td>
                <td align="right"><?= "Rp " . number_format($produk['harga'], 2, ",", ".") ?></td>
                <td><?= $produk['jumlah'] ?></td>
                <td>
                    <?php if ($base64): ?>
                        <img src="<?= $base64 ?>">
                    <?php else: ?>
                        Tidak ada gambar
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="footer">
        Downloaded on <?= date("Y-m-d H:i:s") ?>
    </div>

</body>
</html>
