<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="text-center mb-4">
  <a href="<?= base_url() ?>" class="navbar-brand navbar-brand-autodark">
    <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" height="200" alt="Tabler">
  </a>
</div>
<div class="card card-md">
  <div class="card-body text-center">
    <h2 class="h2 mb-4"><?= $title ?></h2>
    <svg width="124px" height="124px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M12,4a8,8,0,0,1,7.89,6.7A1.53,1.53,0,0,0,21.38,12h0a1.5,1.5,0,0,0,1.48-1.75,11,11,0,0,0-21.72,0A1.5,1.5,0,0,0,2.62,12h0a1.53,1.53,0,0,0,1.49-1.3A8,8,0,0,1,12,4Z" fill="#007bff">
        <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite" />
      </path>
    </svg>
  </div>

  <?= $this->endSection() ?>