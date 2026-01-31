<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>
          <span><b>Kontena:</b></span><a href="<?= base_url('logout') ?>" class="btn btn-lg btn-outline-danger float-right" id="logout"> <i class="fas fa-sign-out-alt"></i> Ondoka</a>
        </h1>
        <div class="row">
          <?php if (count($knt) > 0) : ?>
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
          <?php else : ?>
            <div class="col-md-4">
              <a href="<?= base_url('data/new') ?>">
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>Sajili<sub style="font-size: 20px"> <i class="fas fa-box"></i> </sub></h3>
                    <p>Sajili Box Zako</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                </div>
              </a>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <?php if ($users) : ?>
        <div class="col-lg">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3><b>Watumiaji</b></h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped dtTable text-center">
                <thead>
                  <tr>
                    <th>Jina</th>
                    <th>Simu</th>
                    <th>Iqama</th>
                    <th>Fungua</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $dt) : ?>
                    <tr>
                      <td> <?= $dt['name'] ?></td>
                      <td><?= $dt['phone'] ?></td>
                      <td><?= $dt['iqama'] ?></td>
                      <td><a href="<?= base_url('data/user/' . $dt['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i></a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>