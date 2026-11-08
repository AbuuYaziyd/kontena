<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            <?= lang('app.boxInfo') ?>
          </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
          <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
              <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
              <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
            </svg>
            Print
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="card card-lg">
        <div class="card-header">
          <h2>
            <?= lang('app.boxInfo') ?>
          </h2>
        </div>
        <div class="card-body">
          <div id="table-default" class="table-responsive">
            <table class="table table-bordered dtTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?= lang('app.user') ?></th>
                  <th><?= lang('app.fikia') ?></th>
                  <th><?= lang('app.box') ?></th>
                  <th><?= lang('app.mpokeaji') ?></th>
                  <th><?= lang('app.phone') ?> | <?= lang('app.mpokeaji') ?></th>
                </tr>
              </thead>
              <tbody class="table-tbody">
                <?php foreach ($users as $key => $us) : ?>
                  <?php $percent = ($us['malipo'] > 0 ? (($us['malipo'] / (session('price') * $us['box'])) * 100) : 0) ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                      <?= $us['name'] ?><br>
                    </td>
                    <td>
                      <span class="badge bg-<?= $us['fikia'] == 'DAR' ? 'primary' : ($us['fikia'] == 'ZNZ' ? 'green' : 'cyan') ?> text-success-fg"><?= strtoupper(lang('app.' . $us['fikia'])) ?></span>
                    </td>
                    <td><?= $us['box'] ?></td>
                    <td><?= strtoupper($us['mpokeaji']) ?></td>
                    <td><?= $us['simu'] ?></td>
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
<?= $this->endSection() ?>