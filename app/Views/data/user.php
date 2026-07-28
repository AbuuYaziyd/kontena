<?php
$jumla = session('price') * count($box);
$remain = $jumla - $sum;
$text = ('السلام عليكم ورحمة الله وبركاته
أخي: ' . $user['name'] . '

لقد سددت: ' . $sum . ' ريالًا حتى الحين، وما زال المبلغ المتبقي ' . $remain . ' ريالًا. 
هل ترغب في تخفيض عدد الكراتين؟
أو متى تتوقع تسديد المبلغ المتبقي؟

بارك الله فيكم!


Assalaamu Alaikum warahmatullahi Wabarakaatuh! 

Ndugu ' . $user['name'] . ' 
Mpaka sasa umelipia kiasi cha riyali  ' . $sum . ', bado kiasi cha riyali ' . $remain . '. 

Je, unahitaji kupunguza idadi ya Box?
Au unataraji lini kumaliza Malipo?

Baarakallahu Fiykum!');
?>
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3><b>Mtumiaji:</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style="text-align: center;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputBorder">WhatsApp</label><br>
                                    <?php if ($sum < $jumla) : ?>
                                        <button type="button" data-toggle="modal" data-target="#whatsapp" class="btn btn-success w-100 btn-lg"><i class="fa fa-whatsapp"></i></button>
                                    <?php else : ?>
                                        <span class="btn btn-outline-success w-100 btn-lg"><i class="fa fa-whatsapp"></i></span>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Simu</label><br>
                                    <a href="tel:<?= $user['phone'] ?>" class="btn btn-primary w-100 btn-lg"><i class="fa fa-phone"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?= form_open('forgot') ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Amesahau Password</label>
                                        <input type="number" class="form-control mb-3" name="phone" value="<?= $user['phone'] ?>">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <button type="button" id="password" class="btn btn-warning w-100 btn-lg">Badili Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if ($kont != null) : ?>
                <div class="col-md-8">
                    <div class="card card-<?= $sum < $jumla ? 'danger' : 'primary' ?> card-outline">
                        <div class="card-header">
                            <h3><b><?= $title ?>:</b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Kilichobaki</label><br>
                                        <span class="btn btn-<?= $sum < $jumla ? 'danger' : 'success' ?> w-100 btn-lg"><?= $jumla - $sum ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Alicholipa</label><br>
                                        <span class="btn btn-primary w-100 btn-lg"><?= $sum ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Idadi ya Box</label><br>
                                        <span class="btn btn-warning w-100 btn-lg"><?= count($box) ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?= form_open('data/admin') ?>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Ongeza Idadi ya Box |
                                            <div class="btn-group">
                                                <span class="btn btn-danger btn-sm mb-2"><?= count($box) ?></span>
                                                <?php if ($sum <= 0 && count($box) > 2) : ?>
                                                    <a href="<?= base_url('data/reset/' . $user['id']) ?>" id="trash" class="btn btn-dark btn-sm"><i class="fas fa-trash"></i></a>
                                                <?php endif ?>
                                            </div>
                                        </label><br>
                                        <input type="number" name="box" class="form-control mb-2" placeholder="Ongeza Idadi ya Box za Mtumiaji">
                                    </div>
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-primary btn-lg w-100" id="add">Ongeza Box</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <?php if ($kont != null) : ?>
            <div class="row">
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3><b>Maelezo ya Mtumaji:</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Jina la Mhitaji</label><br>
                                        <span class="btn btn-danger w-100 btn-lg"><?= $user['name'] ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Mpokeaji</label><br>
                                        <span class="btn btn-primary w-100 btn-lg"><?= $kont['mpokeaji'] ?? 'N/A' ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Nchi</label><br>
                                        <span class="btn btn-warning w-100 btn-lg"><?= $user['nchi'] ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Simu Mhusika</label><br>
                                            <a class="btn btn-danger w-100 btn-lg" href="<?= base_url('malipo/whatsapp/' . preg_replace("/[^0-9]/", "", $user['phone']) . '/' . $kont['id']) ?>"><?= $kont['phone'] ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleSelectBorderWidth2">Simu Mpokeaji</label><br>
                                        <span class="btn btn-info w-100 btn-lg"><?= $kont['phone'] ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="exampleSelectBorderWidth2"> Mafikio</label><br>
                                        <span class="btn btn-dark w-100 btn-lg"><?= $kont['fikia'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <?php foreach ($box as $key => $dt) : ?>
                            <div class="col-sm-6 col-lg-3">
                                <a href="<?= base_url('data/view/' . $dt['id']) ?>" style="text-decoration: none;">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-<?= $dt['paid'] == 0 ? 'danger' : ($dt['paid'] < session('price') ? 'warning' : 'success') ?> text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                            <path d="M12 12l8 -4.5" />
                                                            <path d="M12 12l0 9" />
                                                            <path d="M12 12l-8 -4.5" />
                                                            <path d="M16 5.25l-8 4.5" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <b><?= $dt['fikia'] ?> | <span class="badge bg-blue text-blue-fg"><?= $dt['code'] ?? $key + 1 ?></span></b>
                                                    </div>
                                                    <div class="text-secondary">
                                                        <b><?= lang('app.openBox') ?></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>

<div class="modal fade" id="whatsapp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Whatsapp | <?= $user['name'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('data/send') ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                                <input type="text" name="namba" class="form-control" value="<?= $user['phone'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputBorder">Ujumbe</label>
                                <textarea name="ujumbe" cols="10" rows="10" class="form-control"><?= $text ?></textarea>
                            </div>
                        </div>
                        <button id="tuma" class="btn btn-success w-100 btn-lg"><i class="fab fa-whatsapp"></i></button>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    var check = function() {
        if (document.getElementById('pesa').value >= 1) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    };

    $(document).ready(function() {
        $('#password').click(function(e) {
            e.preventDefault();
            // url = $(this).attr('href');
            let $form = $(this).closest('form');
            Swal.fire({
                title: 'Je, Amesahau Password?',
                text: 'Namba za simu za Mtumiaji ni sahihi? <?= $user['phone'] ?>',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Hapana!',
                confirmButtonText: 'Ndio',
            }).then(function(result) {
                if (result.value) {
                    // window.location.href = url;
                    $form.submit();
                }
            })
        });
    });

    $(document).ready(function() {
        $('#add').click(function(e) {
            e.preventDefault();
            // url = $(this).attr('href');
            let $form = $(this).closest('form');
            Swal.fire({
                title: 'Unahakika?',
                text: 'Unataka koungeza Box za - <?= $user['name'] ?>',
                icon: 'question',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Hapana!',
                confirmButtonText: 'Ndio',
            }).then(function(result) {
                if (result.value) {
                    // window.location.href = url;
                    $form.submit();
                }
            })
        });
    });

    $(document).ready(function() {
        $('#trash').click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            Swal.fire({
                title: 'UNAFUTA Box za - <?= $user['name'] ?>?',
                text: 'Box zote zitafutwa na Kubakishwa box mbili tu!',
                icon: 'question',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Hapana!',
                confirmButtonText: 'Ndio',
            }).then(function(result) {
                if (result.value) {
                    window.location.href = url;
                }
            })
        });
    });
</script>
<?= $this->endSection() ?>