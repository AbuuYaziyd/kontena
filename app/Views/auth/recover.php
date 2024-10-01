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
      <p class="login-box-msg"><?= $title ?></p>

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
      <hr>
      <div class="text-center">
      <a href="<?= base_url('recover') ?>">Umesahau Password?</a>
      </div>
    </div>
  </div>
</div>
<script>
  url = window.open(url)
</script>
<?= $this->endSection() ?>