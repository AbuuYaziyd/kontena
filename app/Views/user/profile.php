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
                <?= form_open('user/edit/' . session('id')) ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3 mb-2">
                            <label>Mhusika</label>
                            <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label>Namba ya Iqama</label>
                            <input class="form-control" type="number" maxlength="10" value="<?= $user['iqama'] ?>" name="iqama">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label>Namba ya Simu</label>
                            <input class="form-control" type="number" name="phone" value="<?= $user['phone'] ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label>Jamia</label>
                            <select name="jamia" class="custom-select">
                                <option value="IUM" <?= $user['jamia'] == 'IUM' ? 'selected' : '' ?>>Jamia Islamia</option>
                                <option value="JED" <?= $user['jamia'] == 'JED' ? 'selected' : '' ?>>Jamia Malik Abdul-Aziz</option>
                                <option value="IMS" <?= $user['jamia'] == 'IMS' ? 'selected' : '' ?>>Jamia Imam</option>
                                <option value="MSU" <?= $user['jamia'] == 'MSU' ? 'selected' : '' ?>>Jamia Malik saud</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary btn-lg">Hifadhi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>