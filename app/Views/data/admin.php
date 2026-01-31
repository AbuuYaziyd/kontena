<div class="col">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1><b>Admin:</b><a href="<?= base_url('user/admin') ?>" class="btn btn-lg btn-warning float-right"><i class="fa fa-cog fa-spin"></i></a></h1>
          <div class="row">
            <div class="col-lg">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3><b>Malipo ya Kontena</b> </h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped dtTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Mhusika</th>
                        <th>Boxi Zote</th>
                        <th>Zilizolipiwa</th>
                        <th>Malipo</th>
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
                          <td><a href="<?= base_url('malipo/user/' . $user['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
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