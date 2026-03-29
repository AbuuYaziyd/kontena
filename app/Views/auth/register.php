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
        <div class="hr-text text-danger"><?= lang('app.gharama') ?>: <?= $kont['price'] ?><?= lang('app.SAR') ?></div>
        <?php $validation = \Config\Services::validation() ?>
        <?= form_open('register') ?>
        <div class="mb-3">
            <label class="form-label">
                <?= lang('app.iqama') ?>
                <?php if (isset(session('errors')['iqama'])) : ?>
                    <span class="badge bg-red text-red-fg"><?= session('errors')['iqama'] ?></span>
                <?php endif ?>
            </label>
            <input type="number" name="iqama" class="form-control" placeholder="<?= lang('app.iqama') ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">
                <?= lang('app.userName') ?>
                <?php if (isset(session('errors')['name'])) : ?>
                    <span class="badge bg-red text-red-fg"><?= session('errors')['name'] ?></span>
                <?php endif ?>
            </label>
            <input type="text" name="name" class="form-control" placeholder="<?= lang('app.userName') ?>">
        </div>
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
        <div class="mb-3">
            <label class="form-label">
                <?= lang('app.uni') ?>
                <?php if (isset(session('errors')['jamia'])) : ?>
                    <span class="badge bg-red text-red-fg"><?= session('errors')['jamia'] ?></span>
                <?php endif ?>
            </label>
            <div class="input-group input-group-flat">
                <select name="jamia" class="form-select">
                    <option selected disabled><?= lang('app.select') ?></option>
                    <option value="IUM"><?= lang('app.IUM') ?></option>
                    <option value="JED"><?= lang('app.JED') ?></option>
                    <option value="IMS"><?= lang('app.IMS') ?></option>
                    <option value="MSU"><?= lang('app.MSU') ?></option>
                    <option value="OTHER"><?= lang('app.OTHER') ?></option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">
                <?= lang('app.phone') ?>
                <?php if (isset(session('errors')['phone'])) : ?>
                    <span class="badge bg-red text-red-fg"><?= session('errors')['phone'] ?></span>
                <?php endif ?>
            </label>
            <div class="input-group input-group-flat">
                <input type="number" name="phone" class="form-control" placeholder="<?= lang('app.phone') ?>">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100"><?= lang('app.signup') ?></button>
        </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>