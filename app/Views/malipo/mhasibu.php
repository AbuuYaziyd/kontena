<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <div class="col">
      <div class="content">
        <div class="container">
          <div class="col-12">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg">
                <div class="card">
                  <div class="card-header">
                    <h3><b><?= lang('app.payments') ?> | <?= $user['name'] ?></b></h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered dtTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?= lang('app.user') ?></th>
                          <th><?= lang('app.box') ?></th>
                          <th><?= lang('app.paid') ?></th>
                          <th><?= lang('app.status') ?></th>
                          <th><?= lang('app.receipt') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $key => $us) : ?>
                          <?php $data = $dt->box($current['id'], $us['user_id']);
                          $user = $data['user'] ?>
                          <?php $percent = ($data['paid'] > 0 ? ($data['paid'] / $data['box']) * 100 : 0) ?>
                          <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $data['box'] ?></td>
                            <td><?= $data['paid'] ?></td>
                            <td>
                              <div class="row align-items-center">
                                <div class="col">
                                  <div class="progress" style="width: 5rem">
                                    <div class="progress-bar" style="width: <?= $percent ?>%" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="<?= base_url('data/risiti/' . $user['id']) ?>" class="btn btn-dark">
                                <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                  <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                  <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                </svg>
                                <?= lang('app.receipt') ?>
                              </a>
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
    </div>
  </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>