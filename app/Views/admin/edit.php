<?= $this->extend('/admin/template') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Edit Data Calon Siswa</h2>
                    <form action="<?= base_url('/admin/update/' . $calon['id'] . '') ?>" method="POST">
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
                            <label class="col-sm-2 col-form-label">Status Calon</label>
                            <select class="form-select form-control fc col-sm-10" name="status" id="status">
                                <option disabled selected>Select..</option>
                                <option value="Diterima" <?= $calon['status_calon'] == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                                <option value="Cadangan" <?= $calon['status_calon'] == 'Cadangan' ? 'selected' : ''; ?>>Cadangan</option>
                                <option value="Tidak Diterima" <?= $calon['status_calon'] == 'Tidak Diterima' ? 'selected' : ''; ?>>Tidak Diterima</option>
                            </select>
                        </div>
                        <input type="hidden" id="user" name="user" value="<?= $calon['user_calon'] ?>">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
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