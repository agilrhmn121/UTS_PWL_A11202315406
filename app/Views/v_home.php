<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- Toko HP Pocong -->

<?php foreach (array_chunk($product, 2) as $rowItems) : ?>
    <div class="row mb-4 justify-content-center">
        <?php foreach ($rowItems as $item) : ?>
            <div class="col-lg-6 <?= count($rowItems) === 1 ? 'mx-auto' : '' ?>">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="<?= base_url('img/' . ($item['foto'] ?? 'default.jpg')) ?>" alt="..." width="100%">
                        <h5 class="card-title mt-2">
                            <?= esc($item['nama']) ?><br>
                            Rp<?= number_format($item['harga'], 0, ',', '.') ?>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>

<!-- End Toko HP Pocong -->
<?= $this->endSection() ?>
