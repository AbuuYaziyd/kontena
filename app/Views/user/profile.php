<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="align-items: center;"><b><?= lang('app.information') ?></b></h2>
                        </div>
                    </div>
                </div>
                <?= form_open('user/update') ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.user') ?></label>
                            <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.iqama') ?></label>
                            <input class="form-control" type="number" maxlength="10" value="<?= $user['iqama'] ?>" name="iqama">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.phone') ?></label>
                            <input class="form-control" type="number" name="phone" value="<?= $user['phone'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.jamia') ?></label>
                            <select name="jamia" class="form-select">
                                <option value="IUM" <?= $user['jamia'] == 'IUM' ? 'selected' : '' ?>><?= lang('app.IUM') ?></option>
                                <option value="JED" <?= $user['jamia'] == 'JED' ? 'selected' : '' ?>><?= lang('app.JED') ?></option>
                                <option value="IMS" <?= $user['jamia'] == 'IMS' ? 'selected' : '' ?>><?= lang('app.IMS') ?></option>
                                <option value="MSU" <?= $user['jamia'] == 'MSU' ? 'selected' : '' ?>><?= lang('app.MSU') ?></option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.mpokeaji') ?></label>
                            <input class="form-control" type="text" name="mpokeaji" value="<?= $user['mpokeaji'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.mpokeajiPhone') ?></label>
                            <input class="form-control" type="number" name="simu" value="<?= $user['simu'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.box') ?> | <span class="badge bg-primary text-success-fg"><?= $user['box'] ?></span></label>
                            <input class="form-control" type="number" name="box" placeholder="1" <?= $kontena['count'] == $boxes ? 'disabled' : '' ?> max="<?= $kontena['count'] - ($boxes + $user['box']) ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label><?= lang('app.fikia') ?></label>
                            <select name="jamia" class="form-select">
                                <option value="DAR" <?= $user['fikia'] == 'DAR' ? 'selected' : '' ?>><?= lang('app.DAR') ?></option>
                                <option value="ZNZ" <?= $user['fikia'] == 'ZNZ' ? 'selected' : '' ?>><?= lang('app.ZNZ') ?></option>
                                <option value="PBA" <?= $user['fikia'] == 'PBA' ? 'selected' : '' ?>><?= lang('app.PBA') ?></option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button type="submit" class="btn w-100 btn-primary btn-lg"><?= lang('app.submit') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>