<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">List People</h3>

<form action="" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian"
            aria-label="Masukkan keyword pencarian" aria-describedby="button-addon2" name="keyword">
        <button class="btn btn-primary" type="submit" id="button-addon2">Cari Orang</button>
    </div>
</form>

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

<?= $pager->links('people', 'people_pagination'); ?>

<?= $this->endSection(); ?>