<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Risiti - <?= $user['mhusika'] ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <h2>
                            <img src="<?= base_url('asset/img/logo.svg') ?>" alt="Logo" class="brand-image" height="50px">
                             <?= APP_NAME ?>
                            <small class="float-right">Tarehe: <b><?= date('j/m/Y h:i:s A') ?></b></small>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Kutoka
                    <address>
                        <strong><?= APP_NAME ?></strong><br>
                        Umoja wa wanafunzi wa Tanzania IUM<br>
                        Al Jamiah, Medina 42351<br>
                        Simu: <br>
                        Email: <a href="mailto:tanzaniamadinah@gmail.com">tanzaniamadina@gmail.com</a>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $user['mhusika'] ?></strong><br>
                        <strong><?= $user['jamia'] ?></strong><br>
                        Al Jamiah, Medina 42351<br>
                        Simu KSA: <a href="tel:<?= $user['simu1'] ?>" style="text-decoration: none;"><?= $user['simu1'] ?></a><br>
                        Simu Nyumbani: <a href="tel:<?= $user['simu2'] ?>" style="text-decoration: none;"><?= $user['simu2'] ?></a><br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col"><br>
                    <br>
                    Risiti No: <b><?= $user['risiti'] ?></b><br>
                    Mchango wa: <b><?= strtoupper($kontena['set']) ?></b><br>
                    Deni: <b><?= $user['jumla'] - $user['paid'] ?></b><br>
                    Tarehe: <b><?= date('j/m/Y') ?></b><br>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Risiti #</th>
                                <th>Kwa ajili ya:</th>
                                <th>Muda wa Malipo</th>
                                <th>Jumla</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($malipo) : ?>
                                <?php foreach ($malipo as $key => $dt) : ?>
                                    <tr>
                                        <td><b><?= $dt['receipt'] ?></b></td>
                                        <td><?= strtoupper($dt['lengo']) ?></td>
                                        <td><?= $dt['created_at'] ?></td>
                                        <td><?= $dt['amount'] ?> SAR</td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr><td colspan="4" style="text-align: center; color:red;"><b>Hakuna Data za Malipo!</b></td></tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Ahsante kwa Ushirikiano wako!</td>
                                <td>Jumla Kuu: <b><?= $user['paid'] ?> SAR</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="center"><br><br>
        <h2><b>MAELEZO YA MSAFIRISHAJI</b></h2><br>
        <h3>
            Jina Kamili: <b><?= $user['mhusika'] ?></b><br>
            Mafikio: <b><?= strtoupper($user['fikia']) ?></b><br>
            Deni Alobakisha: <b><?= $user['jumla'] - $user['paid'] ?></b><br>
            Jina la Mpokeaji: <b><?= $user['mpokeaji'] ?></b><br>
            Simu KSA: <b><?= $user['simu1'] ?></b><br>
            Simu Nyumbani: <b><?= $user['simu2'] ?></b><br>
            Simu Dharura: <b><?= ($user['simu3'] ? $user['simu3'] : ('...')) ?></b><br>
        </h3>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>