<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="text-center mb-4">
  <a href="<?= base_url() ?>" class="navbar-brand navbar-brand-autodark">
    <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" width="100" height="100" alt="Tabler">
  </a>
</div>
<div class="card card-md">
  <div class="card-body">
    <h2 class="h2 text-center mb-4"><?= $title ?></h2>
    <?= form_open('login') ?>
    <div class="mb-3">
      <label class="form-label"><?= lang('app.iqama') ?></label>
      <input type="number" name="iqama" class="form-control" placeholder="<?= lang('app.iqama') ?>">
    </div>
    <div class="mb-2">
      <label class="form-label">
        <?= lang('app.password') ?>
        <span class="form-label-description">
          <a href="<?= base_url('recover') ?>"><?= lang('app.forgotPassword') ?></a>
        </span>
      </label>
      <div class="input-group input-group-flat">
        <input type="password" name="password" class="form-control" placeholder="<?= lang('app.password') ?>">
      </div>
    </div>
    <div class="form-footer">
      <button type="submit" class="btn btn-primary w-100"><?= lang('app.login') ?></button>
    </div>
    </form>
  </div>
  <div class="hr-text"><?= lang('app.or') ?></div>
  <div class="card-body">
    <div class="row">
      <div class="col"><span data-bs-toggle="modal" data-bs-target="#register" class="btn w-100">
          <?= lang('app.signup') ?>
        </span></div>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= lang('app.appFullName') ?> | <?= lang('app.signup') ?></h5>
      </div>
      <div class="modal-body">
        <p><?= lang('app.regQn1') ?> <b><?= $kont['year'] ?></b></p>
        <p><?= lang('app.regQn2') ?> <b><?= $kont['price'] ?><?= lang('app.SAR') ?></b> <?= lang('app.regQn3') ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal"><?= lang('app.no') ?></button>
        <a href="<?= base_url('register') ?>" class="btn btn-primary"><?= lang('app.yesRegister') ?></a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>