<?php

use App\Models\Data;
use App\Models\Kontena;

$data = new Data();
$knt = new Kontena();

$kt = $knt->where('status', 1)->findAll();
// $kontena = $knt->where('status', 1)->first();

?>

<?php foreach ($kt as $dt) : ?>
    
    <div class="col-12">
        <h1><span class=""><b><?= $dt['title'] ?></b></span>
            <span class="float-right"><b><?= $dt['year'] ?></b></span>
        </h1>
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $dt['count'] <= $data->boxZote($dt['id']) ? 'danger' : 'info' ?>">
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
                <div class="small-box bg-<?= $dt['count'] <= $data->boxZote($dt['id']) ? 'danger' : 'success' ?>">
                    <div class="inner">
                        <h3>
                            <?= $data->waliomaliza($dt['id']) ?>
                            <sub style="font-size: 20px"> <i class="fas fa-thumbs-up"></i></sub></h3>
                        <p>Waliolipa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $dt['count'] <= $data->boxZote($dt['id']) ? 'danger' : 'warning' ?>" data-toggle="modal" data-target="#idadi">
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
                <div class="small-box bg-<?= $dt['count'] <= $data->boxZote($dt['id']) ? 'danger' : 'primary' ?>">
                    <div class="inner">
                        <h3><?= $dt['count'] - $data->boxZote($dt['id']) ?><sub style="font-size: 20px"> <i class="fas fa-boxes"></i></sub></h3>

                        <p>Nafasi (Makadirio)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>