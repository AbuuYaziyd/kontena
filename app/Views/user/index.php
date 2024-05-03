<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="col-12">
    <h1><span class=""><b><?= $dt['title'] ?></b></span>
        <span class="float-right"><b><?= $dt['year'] ?></b></span>
    </h1>
    <div class="row">
        <div class="col-md-3 col-6">
            <div class="small-box bg-<?= $dt['count'] <= $data->box($dt['id']) ? 'danger' : 'info' ?>">
                <div class="inner">
                    <h3><?= $data->wanaohitajia($dt['id']) ?><sub style="font-size: 20px"> <i class="fas fa-paper-plane"></i></sub>
                    </h3>
                    <p>Wanaohitajia</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="small-box bg-<?= $dt['count'] <= $data->box($dt['id']) ? 'danger' : 'success' ?>">
                <div class="inner">
                    <h3><?= $data->waliomaliza($dt['id']) ?><sub style="font-size: 20px"> <i class="fas fa-thumbs-up"></i></sub></h3>
                    <p>Waliolipa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="small-box bg-<?= $dt['count'] <= $data->box($dt['id']) ? 'danger' : 'warning' ?>" data-toggle="modal" data-target="#idadi">
                <div class="inner">
                    <h3><?= $dt['count'] ?><sub style="font-size: 20px"> <i class="fas fa-shipping-fast"></i></sub></h3>

                    <p>Idadi ya Boxi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-parachute-box"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="small-box bg-<?= $dt['count'] <= $data->box($dt['id']) ? 'danger' : 'primary' ?>">
                <div class="inner">
                    <h3><?= $dt['count'] - $data->box($dt['id']) ?><sub style="font-size: 20px"> <i class="fas fa-boxes"></i></sub></h3>

                    <p>Nafasi (Makadirio)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-people-carry"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>