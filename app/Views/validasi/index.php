<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>list Mahasiswa</h1>
        </div>
        <div class="section-body">
        <table class="table" style=" width: max-content;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nim</th>
                    <th scope="col">creted_at</th>
                    <th scope="col">updated_at</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $k = 1; ?>
                <?php foreach ($viewvalidasi as $vv) : ?>
                    <tr>
                        <td><?= $k++; ?></td>
                        <td><?= $vv['nama_mhs']; ?></td>
                        <td><?= $vv['nim']; ?></td>
                        <td><?= $vv['created_at']; ?></td>
                        <td><?= $vv['updated_at']; ?></td>
                        <td><?= $vv['status_ta']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>