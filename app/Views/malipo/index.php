<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

  <div class="content">
    <div class="container">
    <h1><b><?= $title ?>:</b>
      <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tuma">
          <i class="nav-icon fas fa-paper-plane"></i> Sajili Wanafunzi
      </button>
    </h1>
      <div class="row">
        <?= $this->include('kontena/info') ?>
      </div>
      <div class="row">
        
        <?php if ($users) : ?>
          <div class="col-lg">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3>Malipo ya Kontena</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped dtTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mhusika</th>
                      <th>Idadi</th>
                      <th>Mafikio</th>
                      <th>Mpokeaji</th>
                      <th>Lipa</th>
                      <th>Baki</th>
                      <th>Jumla</th>
                      <th>Edit</th>
                      <th>WhatsApp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $key => $user) : ?>
                      <?php if ($user['paid']!= $user['jumla']) : ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td> <?= $user['mhusika'] ?></td>
                        <td><?= $user['idadi'] ?></td>
                        <td><?= $user['fikia'] ?></td>
                        <td><?= $user['mpokeaji'] ?></td>
                        <td><?= ($user['paid'] ? $user['paid'] : 0) ?></td>
                        <td><?= $user['jumla'] - $user['paid'] ?></td>
                        <td><?= $user['jumla'] ?></td>
                        <td><a href="<?= base_url('malipo/make/' . $user['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
                        <td><button class="btn btn-success btn-sm" class="btn btn-success float-right" data-toggle="modal" data-target="#whatsapp<?= $key+1 ?>"><i class="fab fa-whatsapp"></i></button></td>
                      <div class="modal fade" id="whatsapp<?= $key+1 ?>">
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
                                      $rem = $user['jumla']-$user['paid'];
                                      $ujumbe = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh!
                                      
Ndugu '.$user['mhusika'].'
Mpaka sasa umelipia kiasi cha *riyali '.$user['paid'].'*, bado kiasi cha *riyali '.$rem.'*.

*Je, unahitaji kupunguza Box?*
*Au unataraji lini kumaliza Malipo?*

Baarakallahu Fiykum!';
                                      $namba = preg_replace("/[^0-9]/", "", $user['simu1']); ?>
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
                                          <button id="<?= $key+1 ?>" href="https://wa.me/'.<?=$namba?>.'?text='.<?=rawurlencode($ujumbe)?>" class="btn btn-success btn-block btn-lg"><i class="nav-icon fas fa-paper-plane"></i> Tuma Ujumbe!</button>
                                          </form>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </tr>
                      <?php endif ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
      <div class="row">
        
        <?php if ($comp) : ?>
          <div class="col-lg">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3>Waliomaliza Malipo ya Kontena</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped dtTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mhusika</th>
                      <th>Idadi</th>
                      <th>Mafikio</th>
                      <th>Mpokeaji</th>
                      <th>Lipa</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($comp as $key => $user) : ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td> <?= $user['mhusika'] ?></td>
                        <td><?= $user['idadi'] ?></td>
                        <td><?= $user['fikia'] ?></td>
                        <td><?= $user['mpokeaji'] ?></td>
                        <td><?= $user['paid'] ?></td>
                        <td><a href="<?= base_url('malipo/make/' . $user['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
      <div class="row">
        
        <?php if ($mishkila) : ?>
          <div class="col-lg">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3>Wamesajili Kontena (Mushkila)</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped dtTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mhusika</th>
                      <th>Idadi</th>
                      <th>Mafikio</th>
                      <th>Mpokeaji</th>
                      <th>Lipa</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($mishkila as $key => $user) : ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td> <?= $user['mhusika'] ?></td>
                        <td><?= $user['idadi'] ?></td>
                        <td><?= $user['fikia'] ?></td>
                        <td><?= $user['mpokeaji'] ?></td>
                        <td><?= $user['paid'] ?></td>
                        <td><a href="<?= base_url('malipo/make/' . $user['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
  </div>

<div class="modal fade" id="tuma">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-none">Kontena</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Je, unahitaji kusajiliwa miongoni mwa watakaosafirisha vitabu kwa Kontena mwaka huu <b><?= date('Y') ?></b>?&hellip;</p>
                <p>Kama ndio, basi jianadae na Malipo ya Usafirishaji kwa makadirio mwaka huu inaweza kugharimu <b><?= $data['price'] ?> SAR</b> kwa kila box moja!</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hapana</button>
                <a href="<?= base_url('kontena/register') ?>" class="btn btn-success"><i class="nav-icon fas fa-paper-plane"></i> Ndio, Nahitajia!</a>
            </div>
        </div>
    </div>
</div>
<script>
  url = 
  window.open(url)
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>