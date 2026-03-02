<?= $this->extend('layouts/home') ?>

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
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3><b>Malipo ya Kontena | <?= $user['name'] ?></b></h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped dtTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mhusika</th>
                          <th>Boxi Zote</th>
                          <th>Zilizolipiwa</th>
                          <th>Risiti</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $key => $us) : ?>
                          <tr>
                            <?php $data = $dt->box($current['id'], $us['user_id']);
                            $user = $data['user'] ?>
                            <td><?= $key + 1 ?></td>
                            <td> <?= $user['name'] ?></td>
                            <td> <?= $data['box'] ?></td>
                            <td> <?= $data['paid'] ?></td>
                            <td><a href="<?= base_url('data/risiti/' . $user['id']) ?>" class="btn btn-dark btn-sm"><i class="fas fa-receipt"></i></a></td>
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