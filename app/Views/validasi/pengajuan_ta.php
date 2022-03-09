<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>UPLOAD DATA KHS</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <form action="/validasi/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <span>Nama</span>
                            <input type="text" name="nama_mhs" class="form-control <?= ($validation->hasError('nama_mhs')) ? 'is-invalid' : ''; ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_mhs'); ?>
                            </div>

                            <br>

                            <span>Nim</span>
                            <input type="text" name="nim" class="form-control" aria-label="nim" aria-describedby="addon-wrapping">

                            <br>
                            <span>File Khs</span>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping" style="width: 70px;">choose</span>
                                <input type="file" name="khs" class="form-control" placeholder="choose your file" aria-label="choose" aria-describedby="addon-wrapping" value="Extact Text">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-success" style="width: 60px;">Add</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->endSection(); ?>