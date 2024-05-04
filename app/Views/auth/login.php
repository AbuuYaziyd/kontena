<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="login-box">
  <?php if (session()->getFlashdata('toast')) : ?>
    <div class="alert alert-<?= session()->getFlashdata('toast') ?>" style="text-align: center;">
      <?= session()->getFlashdata('msg') ?>
    </div>
  <?php endif ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>Tz</b> Kontena</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingia kwenye ukurasa wako!</p>

      <?= form_open('login') ?>
      <div class="input-group mb-3">
        <input type="number" name="iqama" class="form-control" placeholder="Iqama">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <span data-toggle="modal" data-target="#tuma" class="btn btn-lg btn-dark btn-block">Jisajili</span>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-lg btn-primary btn-block">Ingia</button>
        </div>
      </div>
      </form>
    </div>
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
        <p>Je, unahitaji kusajiliwa miongoni mwa watakaosafirisha vitabu kwa Kontena mwaka huu <b><?= $kont['year'] ?></b>?&hellip;</p>
        <p>Kama ndio, basi jianadae na Malipo ya Usafirishaji kwa makadirio mwaka huu inaweza kugharimu <b><?= $kont['price'] ?>SAR</b> kwa kila box moja!</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Hapana</button>
        <a href="<?= base_url('register') ?>" class="btn btn-lg btn-success"><i class="nav-icon fas fa-paper-plane"></i> Ndio, Nahitajia!</a>
      </div>
    </div>
  </div>
</div>
<script>
  url = window.open(url)
</script>
<?= $this->endSection() ?>