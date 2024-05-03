<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<style>
    @media print {
        @page {
            size: landscape
        }
    }

    h1.ex1 {
        font-size: 300px;
    }
</style>
<div class="login-box">
    <h1 class="ex1"><?= $box['code'] ?? '####' ?></h1>
</div>
<script>
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection() ?>