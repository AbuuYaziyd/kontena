<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="align-items: center;"><b><?= $title ?></b></h2>
                        </div>
                    </div>
                </div>
                <?= form_open('user/receiver/' . session('id')) ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label>Mafikio</label>
                            <select name="fikia" class="custom-select">
                                <option value="DAR" <?= $user['fikia'] == 'DAR' ? 'selected' : '' ?>>DAR</option>
                                <option value="ZNZ" <?= $user['fikia'] == 'ZNZ' ? 'selected' : '' ?>>ZNZ</option>
                                <option value="PBA" <?= $user['fikia'] == 'PBA' ? 'selected' : '' ?>>PBA</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Jina la Mpokeaji</label>
                            <input class="form-control" type="text" name="mpokeaji" value="<?= $user['mpokeaji'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Namba ya Simu</label>
                            <input class="form-control" type="number" name="phone" value="<?= $user['phone'] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary btn-lg">Hifadhi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($box as $key => $dt) : ?>
            <div class="col-md-3 col-6">
                <a href="<?= base_url('data/view/' . $dt['id']) ?>">
                    <div class="small-box bg-<?= $dt['paid'] == 0 ? 'danger' : ($dt['paid'] < session('price') ? 'warning' : 'success') ?>">
                        <div class="inner">
                            <h3><?= $dt['code'] ?? $key + 1 ?><sub style="font-size: 20px"> <i class="fas fa-box-open"></i></sub></h3>
                            <p>Fungua</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>