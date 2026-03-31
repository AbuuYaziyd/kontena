<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
              <?php if (count($knt)) : ?>
                <a href="<?= base_url('data/box/' . $kontena['id'] . '/' . session('id')) ?>" style="text-decoration: none;">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-primary text-white avatar">
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
                            <b><?= $dt->kontena($kontena['id'])['year'] ?> | <span class="badge bg-blue text-blue-fg"><?= $dt->box($kontena['id'], session('id'))['box'] ?></span></b>
                          </div>
                          <div class="text-secondary">
                            <b><?= lang('app.yourBoxCount') ?></b>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              <?php else : ?>
                <a href="<?= base_url('data/new') ?>" style="text-decoration: none;">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-yellow text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-database-cog">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                              <path d="M4 6v6c0 1.657 3.582 3 8 3c.21 0 .42 -.003 .626 -.01" />
                              <path d="M20 11.5v-5.5" />
                              <path d="M4 12v6c0 1.657 3.582 3 8 3" />
                              <path d="M17.001 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                              <path d="M19.001 15.5v1.5" />
                              <path d="M19.001 21v1.5" />
                              <path d="M22.032 17.25l-1.299 .75" />
                              <path d="M17.27 20l-1.3 .75" />
                              <path d="M15.97 17.25l1.3 .75" />
                              <path d="M20.733 20l1.3 .75" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <b><?= lang('app.addBox') ?> | <span class="badge bg-yellow text-yellow-fg"><?= lang('app.new') ?></span></b>
                          </div>
                          <div class="text-secondary">
                            <b><?= lang('app.startHere') ?></b>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              <?php endif ?>
            </div>
            <div class="col-sm-6 col-lg-3">
              <a href="<?= base_url('user/profile') ?>" style="text-decoration: none;">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-green text-white avatar">
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
              <a href="<?= base_url('user/receiver') ?>" style="text-decoration: none;">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-facebook text-white avatar">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-window-maximize">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 17a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1l0 -3" />
                            <path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6" />
                            <path d="M12 8h4v4" />
                            <path d="M16 8l-5 5" />
                          </svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                          <b><?= lang('app.receiver') ?></b>
                        </div>
                        <div class="text-secondary">
                          <b><?= lang('app.receiverData') ?></b>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-lg-3">
              <?php if ($user['risiti'] != null) : ?>
                <a href="<?= base_url('data/risiti/' . session('id')) ?>" style="text-decoration: none;">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-twitter text-white avatar">
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
          </div>
        </div>
      </div>
      <hr>
    </div>
  </div>
</div>
<div class="content">
  <?php if (session('role') == 'admin' || session('role') == 'mhasibu') : ?>
    <?= $this->include('data/admin') ?>
  <?php endif ?>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>