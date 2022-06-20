<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Validasi</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <a href="/validasi/export" class="btn btn-success shadow float-left">Export <i class="bi bi-file-earmark-text-fill"></i></a>
                    </div>
                    <div class="col">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <table class="table" style="width:auto;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nim</th>
                                    <th scope="col">creted</th>
                                    <th scope="col">updated</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 + (4 * ($currentPage - 1)); ?>
                                <?php foreach ($viewvalidasi as $vv) : ?>
                                    <tr>
                                        <td><?= $k++; ?></td>
                                        <td><?= $vv['nama_mahasiswa']; ?></td>
                                        <td><?= $vv['nim_mahasiswa']; ?></td>
                                        <td><?= $vv['created_at']; ?></td>
                                        <td><?= $vv['updated_at']; ?></td>
                                        <td><?= $vv['prodi']; ?></td>
                                        <td><?= $vv['hasil_validasi']; ?></td>
                                        <td><a class="btn btn-warning" href="/validasi/edit/ <?= $vv['id_validasi']; ?>"><i class="bi bi-pencil-fill"></i></a></td>
                                        <!-- <td><a class="btn btn-danger" href="/validasi/delete/<?= $vv['id_validasi'] ?>"><i class="bi bi-trash3-fill"></i></a></td> -->
                                        <td>
                                            <form action="/validasi/<?= $vv['id_validasi']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure ?');"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('viewvalidasi', 'validasi_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>