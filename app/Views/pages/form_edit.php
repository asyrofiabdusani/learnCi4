<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">Edit Data</h3>



<?php if (session()->getFlashdata('message')) : ?>
<div class="alert alert-danger" role="alert">
    <?= session()->getFlashdata('message') ?>
</div>
<?php endif; ?>


<form action="\pages\update" method="post">
    <input type="hidden" name="id" value="<?= $data_buku[0]["id_buku"]; ?>">
    <input type="hidden" name="slug" value="<?= $data_buku[0]["slug_judul"]; ?>">
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul"
                value="<?= (old("judul")) ? old("judul") : $data_buku[0]["judul_buku"]; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="pengarang" name="pengarang"
                value="<?= (old("pengarang")) ? old("pengarang") : $data_buku[0]["pengarang"]; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit"
                value="<?= (old("penerbit")) ?  old("penerbit") : $data_buku[0]["penerbit"]; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="tahun-terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="tahun-terbit" name="tahun-terbit"
                value="<?= (old("tahun-terbit")) ? old("tahun-terbit") : $data_buku[0]["tahun_terbit"]; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="sampul" class="col-sm-2 col-form-label">Sampul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sampul" name="sampul"
                value="<?= (old("sampul")) ? old("sampul") : $data_buku[0]["sampul"]; ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Data</button>
</form>

<?= $this->endSection(); ?>