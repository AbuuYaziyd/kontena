<div class="col">
  <div class="content">
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              <b><?= lang('app.setting') ?></b>
            </div>
            <h2 class="page-title">
              <b><?= lang('app.admins') ?></b>
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <div class="btn-group w-100" role="group">
                <a href="<?= base_url('user/admin') ?>" class="btn btn-lg btn-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065" />
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                  </svg>
                </a>
                <a href="<?= base_url('data/users') ?>" class="justify-content-end btn btn-lg btn-primary text-end">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-hexagon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6" />
                    <path d="M6.201 18.744a4 4 0 0 1 3.799 -2.744h4a4 4 0 0 1 3.798 2.741" />
                    <path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="row">
            <?php foreach ($wahasibu as $hsb) : ?>
            <?php $sum = $usr->malipoFull() ?>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="subheader"><?= lang('app.payments') ?></div>
                    <div class="ms-auto lh-1">
                    </div>
                  </div>
                  <div class="h1 mb-3"><?= $jm = $usr->malipoJamia($hsb['id']) ?? 0 ?> SAR</div>
                  <div class="d-flex mb-2">
                    <div class="ms-auto">
                    </div>
                  </div>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: <?= ($jm / $sum) * 100 ?>%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="<?= ($jm / $sum) * 100 ?>% Complete">
                      <span class="visually-hidden"></span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="<?= base_url('malipo/mhasibu/' . $hsb['id']) ?>" class="btn btn-primary w-100"><?= $hsb['name'] ?></a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          </div>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="card">
          <div class="col card-header">
            <h3><b>Malipo ya Kontena</b>
            </h3>
          </div>
          <div class="card-body">
            <div id="table-default" class="table-responsive">
              <table class="table table-bordered dtTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?= lang('app.user') ?></th>
                    <th><?= lang('app.box') ?></th>
                    <th><?= lang('app.select') ?></th>
                  </tr>
                </thead>
                <tbody class="table-tbody">
                  <?php foreach ($users as $key => $us) : ?>
                    <?php $percent = ($us['malipo'] > 0 ? (($us['malipo'] / (session('price') * $us['box'])) * 100) : 0) ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td> <?= $us['name'] ?></td>
                      <td>
                        <div class="row align-items-center">
                          <div class="col-12 col-lg-auto"><?= $us['box'] ?>|<?= $us['malipo'] ?></div>
                          <div class="col">
                            <div class="progress" style="width: 5rem">
                              <div class="progress-bar" style="width: <?= $percent ?>%" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100">
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= base_url('user/page/' . $us['id']) ?>" class="btn btn-outline-success w-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                              <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                            </svg>
                          </a>
                          <a href="<?= base_url('malipo/user/' . $us['id']) ?>" class="btn btn-outline-warning w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M3 8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -8" />
                              <path d="M3 10l18 0" />
                              <path d="M7 15l.01 0" />
                              <path d="M11 15l2 0" />
                            </svg>
                          </a>
                          <a href="<?= base_url('user/page/' . $us['id']) ?>" class="btn btn-outline-danger w-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                              <path d="M9 10a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                              <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                            </svg>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->include('layouts/table') ?>