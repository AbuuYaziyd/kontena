<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="card card-outline card-danger mt-4 mx-4">
    <div class="card-header text-center">
        <a href="#" class="h1"><b><?= $title ?></b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg"><b>Kila box litagharimu <?= $data['price'] ?> SAR</b></p>
        <?php $validation = \Config\Services::validation() ?>
        <form action="<?= base_url('kontena/check') ?>" method="POST">
            <div class="row">
                <div class="col">
                    <label>Iqama <code>(1234567890)</code></label>
                    <?php if ($validation->getError('iqama')) : ?>
                        <span class="badge badge-danger badge-sm"> <?= $errors = $validation->getError('iqama'); ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="iqama" maxlength="10" placeholder="Weka Namba ya Iqama">
                    </div>
                </div>
            <input type="hidden" name="amount" value="<?= $data['price'] ?>">
            <button type="submit" class="btn btn-block btn-success btn-lg mt-2">Sajili kusafirisha Vitabu</button>
    </div>



    <script>
        var amount = document.getElementById('idadi').value;

        var check = function() {
            // if (document.getElementById('password').value ==
            //     document.getElementById('confpass').value) {
            //     document.getElementById('submit').disabled = false;
            // } else {
            //     document.getElementById('submit').disabled = true;
            // }
            // $(document).ready(function () {
            //     alert(amount);
            // });
        }
    </script>

    <?= $this->endSection('content') ?>