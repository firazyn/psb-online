<?= $this->extend('/admin/template') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Calon Siswa</h1>
                </div>
                <table class="table table-hover" id="tabelCalon">
                    <thead>
                        <tr vertical-align="middle">
                            <th scope="col">Nomor Pendaftaran</th>
                            <th scope="col">Nama Calon Siswa</th>
                            <th scope="col">Wali Calon Siswa</th>
                            <th scope="col">Status Pendaftaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($calon as $c) : ?>
                            <tr vertical-align="middle">
                                <th scope="row"><?= $c['id'] ?></th>
                                <td><?= $c['nama_calon'] ?></td>
                                <td><?= $c['wali_calon'] ?></td>
                                <td><?= $c['status_calon'] ?></td>
                                <td>
                                    <a href="<?= base_url() ?>/admin/detail/<?= $c['user_calon']; ?>" class="btn btn-success">Detail</a>
                                    <a href="<?= base_url() ?>/admin/edit/<?= $c['user_calon']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url() ?>/admin/delete/<?= $c['id'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<?= $this->endSection() ?>