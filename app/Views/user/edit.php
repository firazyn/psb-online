<?= $this->extend('/user/main_template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Data Calon Siswa</h2>
            <form action="<?= base_url('/user/update/' . $calon['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Calon Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $calon['nama_calon'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wali" class="col-sm-2 col-form-label">Wali Calon Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="wali" name="wali" value="<?= $calon['wali_calon'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai" class="col-sm-2 col-form-label">Nilai Saintek</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_saintek" name="nilai_saintek" value="<?= $calon['nilai_saintek'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai" class="col-sm-2 col-form-label">Nilai Soshum</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_soshum" name="nilai_soshum" value="<?= $calon['nilai_soshum'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai" class="col-sm-2 col-form-label">Nilai Bahasa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_bahasa" name="nilai_bahasa" value="<?= $calon['nilai_bahasa'] ?>" required>
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('bukti')) ? 'is-invalid' : ''; ?>" id="bukti" name="bukti" onchange="previews()">
                    <div class="invalid-feedback">
                        <?= ($validation->getError('bukti')); ?>
                    </div>
                    <label class="custom-file-label" for="bukti">Upload bukti pembayaran</label>
                </div>
                <div col-sm-2>
                    <img class="img-fluid img-preview">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previews() {
        const picture = document.querySelector('#bukti');
        const preview = document.querySelector('.img-preview');
        const pictureName = document.querySelector('.custom-file-label');

        pictureName.textContent = picture.files[0].name;

        const filePic = new FileReader();
        filePic.readAsDataURL(picture.files[0]);

        filePic.onload = function(e) {
            preview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>