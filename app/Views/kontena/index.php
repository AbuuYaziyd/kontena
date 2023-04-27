<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

    <div class="content">
        <div class="container">
            <h1><b><?= $title ?>:</b></h1>
            <div class="row">
                <?= $this->include('kontena/info') ?>
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 style="align-items: center;">Kontena
                                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#tuma" <?= ($data['count'] <= $box ? 'disabled' : '') ?> disabled>
                                    <i class="nav-icon fas fa-paper-plane"></i> Jisajili
                                </button>
                            </h3>
                        </div>
                        <?php if ($total > 0) : ?>
                            <div class="card-body">
                                <?= form_open('kontena/find') ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label>Namba ya Iqama  <code>(1234567890)</code></label>
                                            <input class="form-control" type="number" name="iqama" placeholder="Weka Namba ya Iqama">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Namba ya Simu ya Mtumaji  <code>(255123456789)</code></label>
                                            <input class="form-control" type="text" name="password" placeholder="Weka Namba ya Simu ya Mtumaji">
                                        </div>
                                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-3"> Tafuta</button>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="tuma">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-none">Kontena</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Je, unahitaji kusajiliwa miongoni mwa watakaosafirisha vitabu kwa Kontena mwaka huu <b><?= date('Y') ?></b>?&hellip;</p>
                <p>Kama ndio, basi jianadae na Malipo ya Usafirishaji kwa makadirio mwaka huu inaweza kugharimu <b><?= $data['price'] ?> SAR</b> kwa kila box moja!</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hapana</button>
                <a href="<?= base_url('kontena/register') ?>" class="btn btn-success"><i class="nav-icon fas fa-paper-plane"></i> Ndio, Nahitajia!</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>