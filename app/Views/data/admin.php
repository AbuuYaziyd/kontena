<div class="col">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1><span><b>Admin:</b></span></h1>
          <div class="row">
            <div class="col-lg">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3><b>Malipo ya Kontena</b></h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped dtTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Mhusika</th>
                        <th>Simu</th>
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
                          <td><a href="<?= base_url('malipo/user/' . $us['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
                          <!-- <td><button class="btn btn-success btn-sm" class="btn btn-success float-right" data-toggle="modal" data-target="#whatsapp<?= $key + 1 ?>"><i class="fab fa-whatsapp"></i></button></td>
                          <div class="modal fade" id="whatsapp<?= $key + 1 ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title float-none">WhatsApp</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <?= form_open('malipo/send') ?>
                                  <?php
                                  $ujumbe = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh! Ndugu ' . $us['name'] . ' Mpaka sasa, bado hujamaliza kulipia pesa za box! *Huu ni ujumbe kwa ajili ya kukukumbusha!* Baarakallahu Fiykum!';
                                  $namba = preg_replace("/[^0-9]/", "", $us['phone']); ?>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                                          <input type="text" name="namba" class="form-control" value="<?= $namba ?>">
                                        </div>
                                      </div>
                                      <div class="col-12">
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
                          </div> -->
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