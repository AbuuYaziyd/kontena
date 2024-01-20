<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

    <div class="content">
        <div class="container">
            <h1><b><?= $title ?>:</b></h1>
            <div class="row">
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Karibu sana</h5>
                        </div>
                        <div class="card-body">
                            <h1>Karibu katika Website yetu!</h1>
                            <p class="card-text">Website ya wanafunzi wa Tanzania - Chuo Kikuu cha Kiisalamu
                                Madina.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($all)) : ?>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="kontena">
                        <div class="info-box shadow">
                            <span class="info-box-icon bg-warning"><i class="fas fa-box"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="color: black;">Kontena</span>
                                <span class="info-box-number" style="color: black;"><?= $box??0 ?>/<?= $all ?></span>
                            </div>
                        </div></a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>