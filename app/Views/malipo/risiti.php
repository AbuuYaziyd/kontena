<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <title>Risiti - <?= $user['name'] ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <h2>
                            <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" class="brand-image" height="50px">
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
                        <strong><?= $user['name'] ?></strong><br>
                        <strong><?= $user['jamia'] ?></strong><br>
                        Al Jamiah, Medina 42351<br>
                        Simu KSA: <a href="tel:<?= $user['phone'] ?>" style="text-decoration: none;"><?= $user['phone'] ?></a><br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col"><br>
                    <br>
                    Risiti No: <b><?= $user['risiti'] ?></b><br>
                    Mchango wa: <b><?= strtoupper($kontena['title']) ?></b><br>
                    Deni: <b><?= $jumla - $paid ?></b><br>
                    Tarehe: <b><?= date('j/m/Y') ?></b><br>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mpokeaji</th>
                                <th>Simu</th>
                                <th>Mafikio</th>
                                <th>Muda wa Malipo</th>
                                <th>Jumla</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($malipo) : ?>
                                <?php foreach ($malipo as $key => $dt) : ?>
                                    <tr>
                                        <td><b><?= $key + 1 ?></b></td>
                                        <td><?= $dt['mpokeaji'] ?></td>
                                        <td><?= $dt['phone'] ?></td>
                                        <td><?= $dt['fikia'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($dt['created_at'])) ?></td>
                                        <td><?= $dt['paid'] ?> SAR</td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; color:red;"><b>Hakuna Data za Malipo!</b></td>
                                </tr>
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
                                <td>Jumla Kuu: <b><?= $paid ?> SAR</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>