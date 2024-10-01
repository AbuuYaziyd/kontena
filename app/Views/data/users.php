<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="container">
        <div class="row">
            <?php if ($users) : ?>
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3>Malipo ya Kontena</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped dtTable text-center">
                                <thead>
                                    <tr>
                                        <th>Jina</th>
                                        <th>Simu</th>
                                        <th>Iqama</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $dt) : ?>
                                        <tr>
                                            <td> <?= $dt['name'] ?></td>
                                            <td><?= $dt['phone'] ?></td>
                                            <td><?= $dt['iqama'] ?></td>
                                            <td><a href="<?= base_url('data/revert/' . $dt['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-lock"></i></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>