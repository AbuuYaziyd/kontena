<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="container">
        <div class="row">
            <?= $this->include('layouts/info') ?>
        </div>
        <div class="row">
            <?php if (!session('isLoggedIn')) : ?>
                <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg btn-block">Ingia</a>
            <?php else : ?>
                <a href="<?= base_url('data') ?>" class="btn btn-outline-success btn-lg btn-block">Mwanzo</a>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>