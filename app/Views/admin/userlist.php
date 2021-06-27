<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="m-0">Daftar User</h1>
                </div>
                <table class="table table-hover" id="tabelCalon">
                    <thead>
                        <tr vertical-align="middle">
                            <th scope="col">Nomor</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($users as $u) : ?>
                            <tr vertical-align="middle">
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td>
                                    <a href="<?= base_url() ?>/admin/editUser/<?= $u['username']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url() ?>/admin/deleteUser/<?= $u['username'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?');">Delete</a>
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