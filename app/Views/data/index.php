<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>
          <span><b>Kontena:</b></span>
        </h1>
        <div class="row">
          <?php foreach ($knt as $dt) : ?>
            <div class="col-md-4">
              <a href="<?= base_url('data/box/' . $dt['kontena_id'] . '/' . session('id')) ?>">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $data->kontena($dt['kontena_id'])['title'] ?><sub style="font-size: 20px"> <i class="fas fa-box"></i> </sub></h3>
                    <p>Idadi ya Box Zako: <b><?= $data->box($dt['kontena_id'], session('id')) ?></b></p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach ?>
          <div class="col-md-4">
            <a href="<?= base_url('user/profile') ?>">
              <div class="small-box bg-warning" data-toggle="modal" data-target="#idadi">
                <div class="inner">
                  <h3>Kuhusu<sub style="font-size: 20px"> <i class="fas fa-shipping-fast"></i></sub></h3>
                  <p>Data za Mtumiaji</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('user/receiver') ?>">
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3>Mpokeaji<sub style="font-size: 20px"> <i class="fas fa-boxes"></i></sub></h3>
                  <p>Maelezo ya Mpokeaji</p>
                </div>
                <div class="icon">
                  <i class="fas fa-people-carry"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div><hr>
    <?php if (session('role') == 'admin') : ?>
      <?= $this->include('data/admin') ?>
    <?php endif ?>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>