<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="my-3">Tambah Data</h3>

<form action="\pages\save" method="post" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                id="judul" name="judul">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= old('pengarang'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="tahun-terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="tahun-terbit" name="tahun-terbit"
                value="<?= old('tahun-terbit'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="sampul" class="col-sm-2 col-form-label">Sampul Buku</label>
        <img class="img-review col-sm-2 img-thumbnail border-0"></img>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="sampul" name="sampul" value="<?= old('sampul'); ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit Data</button>
</form>

<script>
const imgBox = document.querySelector('.img-review');
const imgFile = document.querySelector('#sampul');
imgFile.addEventListener('change', (event) => {
    const fileList = event.target.files;
    const reader = new FileReader();
    console.log(reader.readAsDataURL(fileList[0]));

    reader.onload = (e) => {
        imgBox.src = e.target.result;
    };
});
</script>
<?= $this->endSection(); ?>