<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="text-center mb-4">
  <a href="<?= base_url() ?>" class="navbar-brand navbar-brand-autodark">
    <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" width="100" height="100" alt="Tabler">
  </a>
</div>
<div class="card card-md">
  <div class="card-body">
    <h2 class="h2 text-center mb-4"><?= $name ?></h2>
    <?= form_open('update') ?>
    <div class="mb-3">
      <label class="form-label">
        <?= lang('app.country') ?>
        <?php if (isset(session('errors')['nchi'])) : ?>
          <span class="badge bg-red text-red-fg"><?= session('errors')['nchi'] ?></span>
        <?php endif ?>
      </label>
      <div class="input-group input-group-flat">
        <select name="nchi" class="form-select">
          <option selected disabled><?= lang('app.select') ?></option>
          <option value="tz"><?= lang('app.tz') ?></option>
          <option value="ke"><?= lang('app.ke') ?></option>
          <option value="ug"><?= lang('app.ug') ?></option>
          <option value="rw"><?= lang('app.rw') ?></option>
          <option value="br"><?= lang('app.br') ?></option>
          <option value="cn"><?= lang('app.cn') ?></option>
          <option value="zm"><?= lang('app.zm') ?></option>
          <option value="mz"><?= lang('app.mz') ?></option>
        </select>
      </div>
    </div>
    <div class="form-footer">
      <button type="submit" class="btn btn-primary w-100"><?= lang('app.submit') ?></button>
    </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>