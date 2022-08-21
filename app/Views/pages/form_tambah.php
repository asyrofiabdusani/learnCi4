<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">Tambah Data</h3>

<form action="\pages\save" method="post">
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul">
        </div>
    </div>
    <div class="row mb-3">
        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="pengarang" name="pengarang">
        </div>
    </div>
    <div class="row mb-3">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
    </div>
    <div class="row mb-3">
        <label for="tahun-terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="tahun-terbit" name="tahun-terbit">
        </div>
    </div>
    <div class="row mb-3">
        <label for="sampul" class="col-sm-2 col-form-label">Sampul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sampul" name="sampul">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit Data</button>
</form>

<?= $this->endSection(); ?>