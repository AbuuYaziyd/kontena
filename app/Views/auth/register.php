<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="login-box">
    <div class="card card-outline card-danger mt-4 mx-4">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h1"><b><?= $title ?></b></a>
        </div>
        <div class="card-body">
            <div class="text-center"><span>Gharama ya Box: <b><?= $kont['price'] ?>SAR</b></span></div>
            
            <hr>
            <?php $validation = \Config\Services::validation() ?>
            <?= form_open('register') ?>
            <div class="row">
                <div class="col-12">
                    <label>Iqama</label>
                    <?php if (isset(session('errors')['iqama'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['iqama'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" name="iqama" value="<?= old('iqama') ?>" placeholder="Iqama">
                    </div>
                </div>
                <div class="col-12">
                    <label>Jina la Mtumaji</label>
                    <?php if (isset(session('errors')['name'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['name'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="name" value="<?= old('name') ?>" placeholder="Jina Kamili">
                    </div>
                </div>
                <div class="col-12 mb-1">
                    <label>Nchi <code>!!!</code></label>
                    <?php if (isset(session('errors')['nchi'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['nchi'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <select class="custom-select rounded-0" name="nchi" value="<?= old('nchi') ?>">
                            <option selected disabled>Chagua Nchi unayotokea</option>
                            <option value="TZ">TZ</option>
                            <option value="JR">Nchi Jirani</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label>Jamia Unayosoma</label>
                    <?php if (isset(session('errors')['jamia'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['jamia'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <select name="jamia" class="custom-select">
                            <option selected disabled>Chagua Jamia</option>
                            <option value="IUM">Jamia Islamia</option>
                            <option value="OTHER">Jamia Nyengine</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-1">
                    <label>Namba za Simu</label>
                    <?php if (isset(session('errors')['phone'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['phone'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" name="phone" value="<?= old('phone') ?>" placeholder="0713102030">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-success btn-lg mt-2">Sajili</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
