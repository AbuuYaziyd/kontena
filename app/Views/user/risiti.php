<?= $this->extend('layouts/print') ?>

<?= $this->section('content') ?>
<div class="page-body">
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h2><b><?= lang('app.appFullName') ?></b></h2>
                        <address>
                            <b><?= lang('app.umoja') ?></b><br>
                            <b><?= lang('app.IUM') ?></b><br>
                            <?= lang('app.location') ?><br>
                            <a href="mailto:tanzaniamadinah@gmail.com">tanzaniamadina@gmail.com</a>
                        </address>
                    </div>
                    <div class="col-4 text-center">
                        <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" alt="logo" class="brand-image" height="150px">
                    </div>
                    <div class="col-4 text-end">
                        <h2><b><?= lang('app.client') ?></b></h2>
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
                            <th><?= lang('app.fikia') ?></th>
                            <th><?= lang('app.paid') ?></th>
                            <th><?= lang('app.status') ?></th>
                        </tr>
                    </thead>
                    <?php if ($malipo) : ?>
                        <?php $finish = floor($user['malipo'] / session('price'));
                        $remain = $user['malipo'] % session('price') ?>
                        <?php for ($i = 0; $i < $user['box']; $i++) : ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $user['mpokeaji'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= lang('app.' . $user['fikia']) ?></td>
                                <?php if ($i < $finish) : ?>
                                    <td><?= session('price') ?> <?= lang('app.SAR') ?></td>
                                    <td><span class="badge bg-success text-success-fg"><?= lang('app.paid') ?></span></td>
                                <?php elseif ($remain > 0 && $i == $finish) : ?>
                                    <td><?= $remain ?> <?= lang('app.SAR') ?></td>
                                    <td><span class="badge bg-primary text-success-fg"><?= lang('app.notCompleted') ?></span></td>
                                <?php else : ?>
                                    <td>0 <?= lang('app.SAR') ?></td>
                                    <td><span class="badge bg-danger text-success-fg"><?= lang('app.notPaid') ?></span></td>
                                <?php endif ?>
                            </tr>
                        <?php endfor ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color:red;"><b>Hakuna Data za Malipo!</b></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td colspan="5" class="strong text-end"><?= lang('app.total') ?></td>
                        <td><b><?= $user['malipo'] ?> <?= lang('app.SAR') ?></b></td>
                    </tr>
                </table>
                <p class="text-secondary text-center mt-5"><?= lang('app.appFullName') ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>