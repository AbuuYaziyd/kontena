<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <h1><b><?= $title ?>:</b></h1>
    <div class="row">
      <div class="col-lg">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 style="align-items: center;">Malipo ya Kontena <a href="<?= base_url('malipo/risiti/' . $kont['id']) ?>" target="_blank" class="btn btn-success float-right">Risiti</a></h3>
          </div>
          <div class="card-body">
            <?= form_open('malipo/edit/' . $kont['id']) ?>
              <div class="row" style="text-align: center;">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputBorder">Jina la Mhitaji</label><br>
                    <span class="btn btn-danger btn-block btn-lg"><?= $kont['mhusika'] ?></span>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputBorder">Mtu wa Dharura</label><br>
                    <span class="btn btn-primary btn-block btn-lg"><?= $kont['mpokeaji'] ?></span>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Idadi</label><br>
                      <input type="number" name="idadi" class="form-control form-control-lg" value="<?= $kont['idadi'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="text-align: center;">
              <?php if ($kont['simu1']!=$kont['simu3']) : ?>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Simu Mhusika</label><br>
                      <a class="btn btn-<?= $kont['jumla']-$kont['paid']>0?'outline-':'' ?>danger btn-block btn-lg" href="<?= base_url('malipo/whatsapp/'.preg_replace("/[^0-9]/", "", $kont['simu1']).'/'.$kont['id']) ?>"><?= $kont['simu1'] ?></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Simu Dharura</label><br>
                      <a class="btn btn-<?= $kont['jumla']-$kont['paid']>0?'outline-':'' ?>danger btn-block btn-lg" href="<?= base_url('malipo/whatsapp/'.preg_replace("/[^0-9]/", "", $kont['simu3']).'/'.$kont['id']) ?>"><?= $kont['simu3'] ?></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2">Simu Mpokeaji</label><br>
                      <span class="btn btn-primary btn-block btn-lg"><?= $kont['simu2'] ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2"> Mafikio</label><br>
                      <span class="btn btn-warning btn-block btn-lg"><?= $kont['fikia'] ?></span>
                  </div>
                </div>
              </div>
                <?php else : ?>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Simu Mhusika</label><br>
                      <a class="btn btn-<?= $kont['jumla']-$kont['paid']>0?'outline-':'' ?>danger btn-block btn-lg" href="<?= base_url('malipo/whatsapp/'.preg_replace("/[^0-9]/", "", $kont['simu1']).'/'.$kont['id']) ?>"><?= $kont['simu1'] ?></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2">Simu Mpokeaji</label><br>
                      <span class="btn btn-primary btn-block btn-lg"><?= $kont['simu2'] ?></span>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2"> Mafikio</label><br>
                      <span class="btn btn-warning btn-block btn-lg"><?= $kont['fikia'] ?></span>
                  </div>
                </div>
              </div>
                <?php endif ?>
              <?php if ($kont['jumla']!=$kont['paid'] || $kont['idadi']<1) : ?>
              <div class="row" style="text-align: center;">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputBorder">Alicholipa</label><br>
                      <span class="btn btn-outline-success btn-block btn-lg"><?= $kont['paid'] ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Kilichobaki</label><br>
                      <span class="btn btn-outline-danger btn-block btn-lg"><?= $kont['jumla'] - $kont['paid'] ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="text-align: center;">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2">Jumla</label><br>
                      <span class="btn btn-secondary btn-block btn-lg"><?= $kont['jumla'] ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputBorder">Malipo</label>
                    <input type="text" class="form-control form-control-border" onkeyup="check();" <?= $kont['jumla']==$kont['paid']?'disabled':'' ?> id="leo" placeholder="Anacholipa leo" name="leo">
                  </div>
                </div>
              </div>
              <input type="hidden" name="lengo" value="kontena">
              <input type="hidden" name="price" value="<?= $data['price'] ?>">
              <button type="submit" class="btn btn-primary btn-block btn-lg mt-1"><i class="fas fa-paper-plane"></i> Hifadhi</button>
              <?php else :?>
              <div class="row" style="text-align: center;">
                <div class="col-12">
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2">Jumla ya Malipo</label><br>
                      <span class="btn btn-secondary btn-block btn-lg"><?= $kont['jumla'] ?></span>
                  </div>
                </div>
              </div>
              <?php endif ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>