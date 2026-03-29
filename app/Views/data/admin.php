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
                  <i class="fa fa-cog fa-spin"></i>
                </a>
                <a href="<?= base_url('data/users') ?>" class="justify-content-end btn btn-lg btn-primary text-end"><i class="fa fa-users"></i></a>
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
                    <?php $data = $dt->box($current['id'], $us['user_id']);
                    $user = $data['user'] ?>
                    <?php $percent = ($data['paid'] > 0 ? ($data['paid'] / $data['box']) * 100 : 0) ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td> <?= $user['name'] ?></td>
                      <td>
                        <div class="row align-items-center">
                          <div class="col-12 col-lg-auto"><?= $data['box'] ?>|<?= $data['paid'] ?></div>
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
                          <a href="<?= base_url('malipo/user/' . $user['id']) ?>" class="btn btn-outline-warning w-100"><i class="fa fa-credit-card"></i></a>
                          <a href="<?= base_url('data/user/' . $user['id']) ?>" target="_blank" class="btn btn-outline-danger w-100"><i class="fa fa-user"></i></a>
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