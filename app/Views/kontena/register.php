<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="card card-outline card-danger mt-4 mx-4">
    <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h1"><b><?= $title ?></b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg"><b>Kila box litagharimu <?= $data['price'] ?> SAR</b></p>
        <?php $validation = \Config\Services::validation() ?>
        <form action="<?= base_url('kontena/register') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>Iqama</label>
                    <?php if (isset(session('errors')['iqama'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['iqama'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="iqama" value="<?= old('iqama') ?>" placeholder="Iqama">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Jina la Mtumaji</label>
                    <?php if (isset(session('errors')['mhusika'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['mhusika'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="mhusika" value="<?= old('mhusika') ?>" placeholder="Jina Kamili">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Jina la Mpokeaji</label>
                    <?php if (isset(session('errors')['mpokeaji'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['mpokeaji'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="mpokeaji" value="<?= old('mpokeaji') ?>" placeholder="Jina Kamili">
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <label>Idadi ya Box</label>
                    <?php if (isset(session('errors')['idadi'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['idadi'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" min="1" id="idadi" name="idadi" value="<?= old('idadi') ?>" placeholder="Idadi ya Box">
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <label>Mafikio ya Vitabu</label>
                    <?php if (isset(session('errors')['fikia'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['fikia'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <select class="custom-select rounded-0" name="fikia" value="<?= old('fikia') ?>">
                            <option selected disabled>Chagua Mafikio</option>
                            <option value="DAR">DAR</option>
                            <option value="ZNZ">ZNZ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <label>Namba ya Simu Mtumaji</label>
                    <?php if (isset(session('errors')['simu1'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['simu1'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="simu1" value="<?= old('simu1') ?>" placeholder="255123456789">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Namba ya Simu Mpokeaji</label>
                    <?php if (isset(session('errors')['simu2'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['simu2'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="simu2" value="<?= old('simu2') ?>" placeholder="255987654321">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Namba ya Simu ya Dharura</label>
                    <?php if (isset(session('errors')['simu3'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['simu3'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="simu3" value="<?= old('simu3') ?>" placeholder="255123123123">
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <label>Nchi <code>!!!</code></label>
                    <?php if (isset(session('errors')['nchi'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['nchi'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <select class="custom-select rounded-0" name="nchi" value="<?= old('nchi') ?>">
                            <option selected disabled>Chagua Mafikio</option>
                            <option value="TZ">TZ</option>
                            <option value="JR">Nchi Jirani</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Jamia Unayosoma</label>
                    <?php if (isset(session('errors')['jamia'])) : ?>
                        <span class="badge badge-danger badge-sm"> <?= session('errors')['jamia'] ?></span>
                    <?php endif ?>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="jamia" value="<?= old('jamia') ?>" placeholder="Jamia Unayosoma">
                    </div>
                </div>
            </div>
            <input type="hidden" name="amount" value="<?= $data['price'] ?>">
            <button type="submit" class="btn btn-block btn-success btn-lg mt-2">Sajili kusafirisha Vitabu</button>
    </div>

    <?= $this->endSection() ?>