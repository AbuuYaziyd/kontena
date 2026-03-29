<?= $this->extend('layouts/print') ?>

<?= $this->section('content') ?>
<div class="page-body">
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <p class="h2">
                            <?= lang('app.appFullName') ?>
                        </p>
                        <address>
                            <strong><?= lang('app.appFullName') ?></strong><br>
                            <b><?= lang('app.umoja') ?></b><br>
                            <?= lang('app.location') ?><br>
                            <?= lang('app.email') ?>: <a href="mailto:tanzaniamadinah@gmail.com">tanzaniamadina@gmail.com</a>
                        </address>
                    </div>
                    <div class="col-4 text-center">
                        <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" alt="logo" class="brand-image" height="150px">
                    </div>
                    <div class="col-4 text-end">
                        <p class="h2"><?= lang('app.client') ?></p>
                        <address>
                            <strong><?= $user['name'] ?></strong><br>
                            <strong><?= lang('app.' . $user['jamia']) ?></strong><br>
                            <?= lang('app.location') ?><br>
                            <?= lang('app.phone') ?>: <a href="tel:<?= $user['phone'] ?>" style="text-decoration: none;"><?= $user['phone'] ?></a><br>
                        </address>
                    </div>
                    <hr>
                    <div class="col-12 my-2 text-center">
                        <h1><?= $title ?>: <?= $user['risiti'] ?></h1>
                    </div>
                </div>
                <table class="table table-transparent table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= lang('app.receiver') ?></th>
                            <th><?= lang('app.phone') ?></th>
                            <th><?= lang('app.location') ?></th>
                            <th><?= lang('app.paid') ?></th>
                            <th><?= lang('app.total') ?></th>
                        </tr>
                    </thead>
                    <?php $sum = 0 ?>
                    <?php if ($malipo) : ?>
                        <?php foreach ($malipo as $key => $dt) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $dt['mpokeaji'] ?></td>
                                <td><?= $dt['phone'] ?></td>
                                <td><?= $dt['fikia'] ?></td>
                                <td><?= date('d/m/Y', strtotime($dt['created_at'])) ?></td>
                                <td><?= $dt['paid'] ?> <?= lang('app.SAR') ?></td>
                            </tr>
                            <?php $sum = $sum + $dt['paid'] ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color:red;"><b>Hakuna Data za Malipo!</b></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td colspan="5" class="strong text-end"><?= lang('app.total') ?></td>
                        <td><b><?= $sum ?> <?= lang('app.SAR') ?></b></td>
                    </tr>
                </table>
                <p class="text-secondary text-center mt-5"><?= lang('app.appFullName') ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>