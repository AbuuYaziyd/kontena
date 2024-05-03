<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><?= $title ?><b><?= APP_NAME ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h5 class="login-box-msg"><b>Chagua Kontena</b></h5>
      <hr>
      <div class="row">
        <div class="col-6">
          <a href="<?= base_url('kontena') ?>" class="btn btn-danger btn-block"> No: 1</a>
        </div>
        <div class="col-6">
          <a href="<?= base_url('jipya') ?>" class="btn btn-primary btn-block"> No: 2</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>