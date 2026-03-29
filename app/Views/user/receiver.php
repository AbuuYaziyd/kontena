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
                            <h2 style="align-items: center;"><b><?= $title ?></b></h2>
                        </div>
                    </div>
                </div>
                <?= form_open('user/receiver/' . session('id')) ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label>Mafikio</label>
                            <select name="fikia" class="form-select">
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
                    <button type="submit" class="btn w-100 btn-primary btn-lg">Hifadhi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>