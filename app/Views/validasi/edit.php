<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Hasil Validasi</h1>
        </div>
        <div class="section-body">
            <form action="/validasi/updated/<?= $viewvalidasi['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nama</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" id="exampleInputName" value="<?= $viewvalidasi['nama_mahasiswa'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputNim" class="form-label">Nim</label>
                    <input type="text" name="nim_mahasiswa" class="form-control" id="exampleInputNim" value="<?= $viewvalidasi['nim_mahasiswa'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputProdi" class="form-label">Prodi</label>
                    <input type="text" name="prodi" class="form-control" id="exampleInputProdi" aria-describedby="emailHelp" value="<?= $viewvalidasi['prodi'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputStatus" class="form-label">Status</label>
                    <input type="text" name="hasil_validasi" class="form-control" id="exampleInputStatus" value="<?= $viewvalidasi['hasil_validasi'] ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>