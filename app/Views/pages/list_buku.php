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
        <?= $i = 1; ?>
        <?php foreach ($list_buku as $buku) : ?>
        <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $buku["judul_buku"]; ?></td>
            <td><img src="/img/<?= $buku["sampul"]; ?>" alt="" class="sampul"></td>
            <td><a href="http://localhost:8080/pages/detail_buku/<?= $buku["slug_judul"]; ?>"><button type="button"
                        class="btn btn-success">Detail</button></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>