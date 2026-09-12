<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <?php $color = ($user['malipo'] == 0 ? 'danger' : ($user['malipo'] < (session('price') * $user['box']) ? 'info' : 'success')) ?>
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-<?= $color ?> text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-packages">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3l0 -5.5" />
                                                    <path d="M2 13.5v5.5l5 3" />
                                                    <path d="M7 16.545l5 -3.03" />
                                                    <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3l0 -5.5" />
                                                    <path d="M12 19l5 3" />
                                                    <path d="M17 16.5l5 -3" />
                                                    <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5" />
                                                    <path d="M7 5.03v5.455" />
                                                    <path d="M12 8l5 -3" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <b><?= $kontena['year'] ?> | <span class="badge bg-<?= $color ?> text-<?= $color ?>-fg"><?= $user['box'] ?></span></b>
                                            </div>
                                            <div class="text-secondary">
                                                <b><?= lang('app.boxes') ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="<?= base_url('user/profile/' . $user['id']) ?>" style="text-decoration: none;">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-yellow text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package-export">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                                        <path d="M12 12l8 -4.5" />
                                                        <path d="M12 12v9" />
                                                        <path d="M12 12l-8 -4.5" />
                                                        <path d="M15 18h7" />
                                                        <path d="M19 15l3 3l-3 3" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <b><?= lang('app.about') ?></b>
                                                </div>
                                                <div class="text-secondary">
                                                    <b><?= lang('app.userData') ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <?php if ($user['risiti'] != null) : ?>
                                <a href="<?= base_url('user/risiti/' . $user['id']) ?>" style="text-decoration: none;">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-secondary text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M15 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                                            <path d="M3 9l4 0" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <b><?= lang('app.receipt') ?></b>
                                                    </div>
                                                    <div class="text-secondary">
                                                        <b><?= lang('app.paymentReceipt') ?></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php else : ?>
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-muted text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M15 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                                        <path d="M3 9l4 0" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <b><?= lang('app.receipt') ?></b>
                                                </div>
                                                <div class="text-secondary">
                                                    <b><?= lang('app.paymentReceipt') ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <?php if (session('role') == 'admin' || session('role') == 'mhasibu') : ?>
                            <div class="col-sm-6 col-lg-3">
                                <a href="<?= base_url('user/admin') ?>" style="text-decoration: none;">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-warning text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-key">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h5" />
                                                            <path d="M18.5 18.5l-3.5 3.5l-1.5 -1.5" />
                                                            <path d="M18.554 18.414a2 2 0 1 1 2.828 -2.828a2 2 0 0 1 -2.828 2.828" />
                                                            <path d="M16 19l1 1" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <b><?= lang('app.admin') ?></b>
                                                    </div>
                                                    <div class="text-secondary">
                                                        <b><?= lang('app.settings') ?></b>
                                                    </div>
                                                </div>
                                            </div>
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
                <?php $finish = floor($user['malipo'] / session('price'));
                $remain = $user['malipo'] % session('price'); ?>
                <?php for ($i = 0; $i < $user['box']; $i++) : ?>
                    <?php if ($i < $finish) : ?>
                        <div class="col-sm-6 col-lg-3 mb-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-success text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                    <path d="M12 12l8 -4.5" />
                                                    <path d="M12 12l0 9" />
                                                    <path d="M12 12l-8 -4.5" />
                                                    <path d="M16 5.25l-8 4.5" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <b><?= $user['fikia'] ?> | <span class="badge bg-success text-success-fg"><?= session('price') ?></span></b>
                                            </div>
                                            <div class="text-secondary">
                                                <b><?= ucwords(strtolower($user['mpokeaji'])) ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($remain > 0 && $i == $finish) : ?>
                        <div class="col-sm-6 col-lg-3 mb-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                    <path d="M12 12l8 -4.5" />
                                                    <path d="M12 12l0 9" />
                                                    <path d="M12 12l-8 -4.5" />
                                                    <path d="M16 5.25l-8 4.5" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <b><?= $user['fikia'] ?> | <span class="badge bg-primary text-primary-fg"><?= $remain ?></span></b>
                                            </div>
                                            <div class="text-secondary">
                                                <b><?= ucwords(strtolower($user['mpokeaji'])) ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-sm-6 col-lg-3 mb-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-danger text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                    <path d="M12 12l8 -4.5" />
                                                    <path d="M12 12l0 9" />
                                                    <path d="M12 12l-8 -4.5" />
                                                    <path d="M16 5.25l-8 4.5" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <b><?= $user['fikia'] ?> | <span class="badge bg-danger text-danger-fg">0</span></b>
                                            </div>
                                            <div class="text-secondary">
                                                <b><?= ucwords(strtolower($user['mpokeaji'])) ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>