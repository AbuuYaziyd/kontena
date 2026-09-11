<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
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
                      <td>
                        <?= $us['name'] ?><br>
                        <span class="badge bg-primary text-success-fg"><?= lang('app.' . $us['jamia']) ?></span>
                      </td>
                      <td>
                        <div class="row align-items-center">
                          <div class="col-12 col-lg-auto"><?= $us['box'] ?? '-' ?>|<?= $us['malipo'] ?></div>
                          <div class="col-12">
                            <div class="progress" style="width: 5rem">
                              <div class="progress-bar" style="width: <?= $percent ?>%" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100">
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
<?php
$rem = ($us['box'] * session('price')) - $us['malipo']; $ujumbe = htmlspecialchars('
Assalaamu Alaikum warahmatullahi Wabarakaatuh!%0A%0A
Ndugu ' . $us['name'] . '%0A
Mpaka sasa umelipia kiasi cha *riyali ' . $us['malipo'] . '*, bado kiasi cha *riyali ' . $rem . '*.%0A%0A
*Je, unahitaji kupunguza Box?*%0A
*Au unataraji lini kumaliza Malipo?*%0A%0A
Baarakallahu Fiykum!'); 
?>
                          <a href="https://wa.me/<?= str_replace(' ', '', $us['phone']) ?>?text=<?= $ujumbe ?>" class="btn btn-outline-success" target="_blank" data-bs-target="#send"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
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
                    <div class="modal modal-blur fade" id="send" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <?= form_open('user/send') ?>
                            <?php
                            $rem = ($us['box'] * session('price')) - $us['malipo'];
                            $ujumbe = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh!
                             Ndugu ' . $us['name'] . '
                             Mpaka sasa umelipia kiasi cha *riyali ' . $us['malipo'] . '*, bado kiasi cha *riyali ' . $rem . '*.
                             
                             *Je, unahitaji kupunguza Box?*
                             *Au unataraji lini kumaliza Malipo?*
                             Baarakallahu Fiykum!';
                            $namba = preg_replace("/[^0-9]/", "", $us['phone']); ?>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 mb-2">
                                  <div class="form-group">
                                    <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                                    <input type="text" name="namba" class="form-control" value="<?= $namba ?>">
                                  </div>
                                </div>
                                <div class="col-12 mb-2">
                                  <div class="form-group">
                                    <label for="exampleInputBorder">Ujumbe</label>
                                    <textarea name="ujumbe" cols="10" rows="10" class="form-control"><?= $ujumbe ?></textarea>
                                  </div>
                                </div>
                                <button id="<?= $key + 1 ?>" href="https://wa.me/'.<?= $namba ?>.'?text='.<?= rawurlencode($ujumbe) ?>" class="btn btn-success btn-block btn-lg"><i class="nav-icon fas fa-paper-plane"></i> Tuma Ujumbe!</button>
                                </form>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>