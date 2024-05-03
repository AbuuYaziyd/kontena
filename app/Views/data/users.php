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
                            <table class="table table-bordered table-striped dtTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mhusika</th>
                                        <th>Idadi</th>
                                        <th>Mafikio</th>
                                        <th>Mpokeaji</th>
                                        <th>Lipa</th>
                                        <th>Baki</th>
                                        <th>Jumla</th>
                                        <th>Edit</th>
                                        <th>WhatsApp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $user) : ?>
                                        <tr>
                                            <?php $us = $data->user($user['user_id']) ?>
                                            <td><?= $key + 1 ?></td>
                                            <td> <?= $us['name'] ?></td>
                                            <td><?= $user['idadi'] ?></td>
                                            <td><?= $user['fikia'] ?></td>
                                            <td><?= $user['mpokeaji'] ?></td>
                                            <td><?= ($user['paid'] ? $user['paid'] : 0) ?></td>
                                            <td><?= $user['jumla'] - $user['paid'] ?></td>
                                            <td><?= $user['jumla'] ?></td>
                                            <td><a href="<?= base_url('malipo/make/' . $us['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-credit-card"></i></a></td>
                                            <td><button class="btn btn-success btn-sm" class="btn btn-success float-right" data-toggle="modal" data-target="#whatsapp<?= $key + 1 ?>"><i class="fab fa-whatsapp"></i></button></td>
                                            <div class="modal fade" id="whatsapp<?= $key + 1 ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title float-none">WhatsApp</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?= form_open('malipo/send') ?>
                                                            <?php
                                                            $rem = $user['jumla'] - $user['paid'];
                                                            $ujumbe = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh!<br> Ndugu ' . $us['name'] . '<br>Mpaka sasa umelipia kiasi cha *riyali ' . $user['paid'] . '*, bado kiasi cha *riyali ' . $rem . '*.<br>*Je, unahitaji kupunguza Box?*<br>*Au unataraji lini kumaliza Malipo?*<br>Baarakallahu Fiykum!';
                                                            $namba = preg_replace("/[^0-9]/", "", $us['phone']); ?>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                                                                            <input type="text" name="namba" class="form-control" value="<?= $namba ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputBorder">Ujumbe</label>
                                                                            <textarea name="ujumbe" cols="10" rows="10" class="form-control"><?= $ujumbe ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <button id="<?= $key + 1 ?>" href="https://wa.me/'.<?= $namba ?>.'?text='.<?= rawurlencode($ujumbe) ?>" class="btn btn-success btn-block btn-lg"><i class="nav-icon fas fa-paper-plane"></i> Tuma Ujumbe!</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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