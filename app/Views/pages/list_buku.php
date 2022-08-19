<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">List Buku</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Judul buku</th>
            <th scope="col">Sampul</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Akuntansi Pengantar 1</td>
            <td><img src="/img/akutansi_1.jpg" alt="" class="sampul"></td>
            <td><button type="button" class="btn btn-success">Detail</button></td>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>