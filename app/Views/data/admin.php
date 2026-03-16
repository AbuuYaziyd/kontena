<div class="col">
  <div class="content">
    <div class="container">
      <h1>
        <b>Admins:</b>
        <span href="<?= base_url('user/admin') ?>" class="btn btn-lg btn-warning float-right"><i class="fa fa-cog fa-spin"></i></span>
      </h1>
      <hr>

      <div class="row">
        <div class="col-12">
          <div class="row">
            <?php foreach ($wahasibu as $hsb) : ?>
              <div class="col-lg-4">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $usr->malipoJamia($hsb['id']) ?? 0 ?> SAR<sub style="font-size: 20px"> <i class="fas fa-wallet"></i></sub></h3>
                    <p><?= lang('app.' . $hsb['jamia']) ?></p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-credit-card"></i>
                  </div>
                  <a href="<?= base_url('malipo/mhasibu/' . $hsb['id']) ?>" class="small-box-footer"><?= $hsb['name'] ?></a>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
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
                        <th>Boxi Zote</th>
                        <th>Zilizolipiwa</th>
                        <th>Data</th>
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
                          <td>
                            <div class="btn-group">
                              <a href="<?= base_url('malipo/user/' . $user['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a>
                              <a href="<?= base_url('data/user/' . $user['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i></a>
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
  </div>
</div>