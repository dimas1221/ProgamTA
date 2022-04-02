<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Validasi</h1>
        </div>
        <div class="section-body">
            <table class="table" style=" width: max-content;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nim</th>
                        <th scope="col">creted</th>
                        <th scope="col">updated</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $k = 1; ?>
                    <?php foreach ($viewvalidasi as $vv) : ?>
                        <tr>
                            <td><?= $k++; ?></td>
                            <td><?= $vv['nama_mahasiswa']; ?></td>
                            <td><?= $vv['nim_mahasiswa']; ?></td>
                            <td><?= $vv['created_at']; ?></td>
                            <td><?= $vv['updated_at']; ?></td>
                            <td><?= $vv['prodi']; ?></td>
                            <td><?= $vv['hasil_validasi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>