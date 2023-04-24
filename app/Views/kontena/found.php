<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>
<?php
$baki = $kont['jumla'] - $kont['paid']
?>

<div class="container">
    <h1><b><?= $title ?>:</b></h1>
    <div class="row">
        <?= $this->include('kontena/info') ?>
        <div class="col-lg">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h2 style="align-items: center;">Data za Kontena</h2>
                        </div>
                        <div class="col-4 float-right">
                        <a href="<?= base_url('kontena/print/'.$kont['id']) ?>" class="btn btn-outline-secondary btn-lg float-right"><i class="nav-icon fas fa-paste"></i> Print</a>
                        </div>
                    </div>
                </div>
                <?= form_open('kontena/sasisha/' . $kont['id']) ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label>Namba ya Iqama</label>
                            <input class="form-control" type="text" name="iqama" value="<?= $kont['iqama'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Mafikio </label>
                            <select class="custom-select rounded-0" name="fikia">
                                <option value="DAR" <?= $kont['fikia'] == 'DAR'?'selected':'' ?>> DAR</option>
                                <option value="ZNZ" <?= $kont['fikia'] == 'ZNZ'?'selected':'' ?>>ZNZ</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label>Jina la Mhusika</label>
                            <input class="form-control" type="text" name="mhusika" value="<?= $kont['mhusika'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Jina la Mpokeaji</label>
                            <input class="form-control" type="text" name="mpokeaji" value="<?= $kont['mpokeaji'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Idadi ya Box </label>
                            <input class="form-control" type="number" id="idadi" name="idadi" value="<?= $kont['idadi'] ?>" onkeyup="check();"  <?= $data['count'] - $box<1?'readonly':'' ?>>
                        </div>
                        <div class="col-md-6">
                            <label>Namba ya Simu Mtumaji</label>
                            <input class="form-control" type="text" name="simu1" maxlength="13" value="<?= $kont['simu1'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Namba ya Simu Mpokeaji</label>
                            <input class="form-control" type="text" maxlength="13" name="simu2" value="<?= $kont['simu2'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Namba ya Simu Dharura</label>
                            <input class="form-control" type="text" maxlength="13" name="simu3" value="<?= $kont['simu3'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2" style="text-align: center;">
                            <label>Pesa Iliyolipwa</label>
                            <a class="btn btn-block btn-<?= ($baki != 0 ? '' : 'outline-') ?>success" disabled><?= $kont['paid'] ?></a>
                        </div>
                        <div class="col-md-3 mt-2" style="text-align: center;">
                            <label>Pesa Iliyobaki</label><br>
                            <a class="btn btn-block btn-<?= ($baki != 0 ? '' : 'outline-') ?>danger" disabled><?= ($baki != 0 ? $baki : 'MALIPO YAMEKAMILIKA') ?></a>
                        </div>
                        <div class="col-md-3 mt-2" style="text-align: center;">
                            <label>Pesa Yote</label><br>
                            <a class="btn btn-block btn-<?= ($baki != 0 ? '' : 'outline-') ?>warning" disabled><?= ($kont['jumla'] ?? 0) ?></a>
                        </div>
                        <?php if ($kont['risiti'] != null) : ?>
                        <div class="col-md-3 mt-2" style="text-align: center;">
                            <label>Risiti </label>
                                <a href="<?= base_url('malipo/risiti/' . $kont['id']) ?>" target="_blank" class="btn btn-block btn-primary <?= ($kont['risiti'] ??"disabled") ?>" ><?= $kont['risiti'] ?></a>
                        </div>
                        <?php endif ?>
                    </div>
                    <input type="hidden" name="price" value="<?= $data['price'] ?>">
                    <input type="hidden" name="jamia" value="<?= $kont['jamia'] ?>">
                    <button type="submit" class="btn btn-block btn-success btn-lg">Hifadhi Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>