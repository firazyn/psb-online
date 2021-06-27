<?= $this->extend('/user/main_template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Pendaftar</h1>
            <table class="table table-hover" id="tabelCalon">
                <thead>
                    <tr vertical-align="middle">
                        <th scope="col">Nomor Pendaftaran</th>
                        <th scope="col">Nama Calon Siswa</th>
                        <th scope="col">Status Pendaftaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($calon as $c) : ?>
                        <tr vertical-align="middle">
                            <th scope="row"><?= $c['id'] ?></th>
                            <td><?= $c['nama_calon'] ?></td>
                            <td><?= $c['status_calon'] ?></td>
                            <td>
                                <?php if (session()->get('username') == $c['user_calon']) : ?>
                                    <a href="<?= base_url() ?>/edit/<?= $c['user_calon']; ?>" class="btn btn-warning">Edit</a>
                                <?php else : ?>
                                    <i class="fas fa-times-circle"></i>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabelCalon').DataTable();
    });
</script>
<?= $this->endSection(); ?>