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
    <?php $validation = \Config\Services::validation() ?>
    <?= form_open('register') ?>
    <div class="mb-3">
      <label class="form-label"><?= lang('app.oldPassword') ?></label>
      <input type="password" id="old" name="old" class="form-control" placeholder="<?= lang('app.oldPassword') ?>">
    </div>
    <div class="mb-3">
      <label class="form-label"><?= lang('app.newPassword') ?></label>
      <input type="password" id="password" name="new" class="form-control" placeholder="<?= lang('app.newPassword') ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="<?= lang('app.passwordCheck') ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label"><?= lang('app.confirmNewPassword') ?></label>
      <input type="password" id="repeat" class="form-control" placeholder="<?= lang('app.confirmNewPassword') ?>" onkeyup="check();">
    </div>
    <div class="form-footer">
      <button type="submit" class="btn btn-primary w-100" disabled id="submit"><?= lang('app.submit') ?></button>
    </div>
    </form>
  </div>
</div>
<script>
  var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('repeat').value) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  };
</script>
<?= $this->endSection() ?>