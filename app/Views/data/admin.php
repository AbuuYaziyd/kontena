<div class="col">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1><b>Admin:</b><a href="#" class="btn btn-lg btn-warning float-right"><i class="fa fa-cog"></i></a></h1>
          <div class="row">
            <div class="col-lg">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3><b>Malipo ya Kontena</b> <a href="<?= base_url('data/users') ?>" class="btn btn-outline-danger float-right"><i class="fa fa-users"></i></a></h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped dtTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Mhusika</th>
                        <th>Simu</th>
                        <th>Box</th>
                        <th>Malipo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $key => $dt) : ?>
                        <tr>
                          <?php $us = $data->user($dt['user_id']) ?>
                          <td><?= $key + 1 ?></td>
                          <td> <?= $us['name'] ?></td>
                          <td> <?= $us['phone'] ?></td>
                          <td> <?= intval($data->box($current['id'], $us['id'])) ?></td>
                          <td><a href="<?= base_url('malipo/user/' . $us['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
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