<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="bi bi-people text-light" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data Validasi</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumdata; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="bi bi-alarm text-light" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Time</h4>
                            </div>
                            <div class="card-body">
                                <span id="clock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-light">
                            <!-- <i class="bi bi-brightness-alt-high text-light" style="font-size: 30px;"></i> -->
                            <img alt="image" src="<?= base_url(); ?>/temp/assets/img/logo-uty-biru.png" class="rounded-circle mb-2" style="width: 3rem;">
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>UTY</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- <div class="card" style="width: 100%;">
                    <img style="width:40% ;" src="<?= base_url(); ?>/temp/assets/img/<?= user()->user_image; ?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?= user()->username; ?></h5>
                        <p class="card-text" id="caption2"></p>
                        <a href="#" class="btn btn-primary">Profil</a>
                    </div>
                </div> -->
            </div>
            <div class="col">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-journal-bookmark"></i>Note...</h5>
                        <p class="card-text">Sistem validasi kelayakan pengambilan tugas akhir hanya dapat memvalidasi KHS dalam bentuk PDF</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>