<?= $this->extend('/admin/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Detail Data Calon Siswa</h2>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Calon Siswa</label>
                        <span><?= $calon['nama_calon'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label for="wali" class="col-sm-2 col-form-label">Wali Calon Siswa</label>
                        <span><?= $calon['wali_calon'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Calon</label>
                        <span><?= $calon['status_calon'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nilai Saintek</label>
                        <span><?= $calon['nilai_saintek'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nilai Soshum</label>
                        <span><?= $calon['nilai_soshum'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nilai Bahasa</label>
                        <span><?= $calon['nilai_bahasa'] ?></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                        <a href="<?= base_url() ?>/admin/download/<?= $calon['id']; ?>" class="btn btn-success">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>
<?= $this->endSection() ?>