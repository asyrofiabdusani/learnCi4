<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">List People</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_people as $people) : ?>
        <tr>
            <th scope="row"><?= $page++; ?></th>
            <td><?= $people["name"]; ?></td>
            <td><?= $people["alamat"]; ?></td>
            <td><a href=""><button type="button" class="btn btn-success">Detail</button></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links('', 'people_pagination') ?>

<?= $this->endSection(); ?>