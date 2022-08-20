<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">Detail buku</h3>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/img/<?= $detailBuku[0]["sampul"]; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $detailBuku[0]["judul_buku"]; ?></h5>
                <p class="card-text m-0">Pengarang : <?= $detailBuku[0]["pengarang"]; ?></p>
                <p class="card-text m-0">Penerbit : <?= $detailBuku[0]["penerbit"]; ?></p>
                <p class="card-text"><small class="text-muted"><?= $detailBuku[0]["tahun_terbit"]; ?></small></p>
                <a href="\pages\list_buku" class="card-link">Lihat daftar buku lainnya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>