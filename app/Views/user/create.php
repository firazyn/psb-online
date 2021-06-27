<?= $this->extend('/user/main_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Pendaftaran Calon Siswa</h2>

            <form action="<?= base_url('/user/save') ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Calon Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wali" class="col-sm-2 col-form-label">Wali Calon Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="wali" name="wali" value="<?= old('wali') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>