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
                        <div class="card-icon bg-primary">
                            <i class="bi bi-people text-light" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data Validasi</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
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
                        <div class="card-icon bg-warning">
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
                        <div class="card-icon bg-success">
                            <i class="bi bi-brightness-alt-high text-light" style="font-size: 30px;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 id="caption2"></h4>
                            </div>
                            <div class="card-body">
                                <p id="caption1"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>