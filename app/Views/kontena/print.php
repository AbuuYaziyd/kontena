<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $user['mhusika'] ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
</head>

<body class="bg">
    <div class="wrapper"><br><br><br>
        <section class="content">
            <div class="container-fluid">
                <h1 class="display-1 mt-3 ml-4">
                    <img src="<?= base_url('asset/img/logo.svg') ?>" alt="Logo" class="brand-image" height="300px">
                    <b><?= APP_NAME ?></b>
                </h1>
            </div>
        </section><br><br><br>
        <!-- Main content -->
        <div class="container-fluid mt-3">
            <h1 class="text-center display-4 mt-3">
                <b><i class="fas fa-box"></i> Maelezo ya Mzigo</b>
            </h1>
        </div>
        <section class="invoice ">
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="display-4 mt-3">
                    Mtumaji: <b><?= $user['mhusika'] ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Simu No: <b><?= number_format($user['simu1'], 0,'', " ")  ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Mafikio: <b><?= $user['fikia'] ?></b>
                </h1>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="display-4 mt-3">
                    Mpokeaji: <b><?= $user['mpokeaji'] ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Simu No: <b><?= number_format($user['simu2'], 0,'', " ")  ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Mahali: <b><?= $user['fikia'] ?></b>
                </h1>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="text-center display-4 mt-3">
                    Dharura: <b> tanzaniamadinah@gmail.com </b><br>
                    Simu: <b> <?= number_format($user['simu3'], 0,'', " ")  ?> </b>
                </h1>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="text-center display-4 mt-3">
                    <b> Ahsante kwa Ushirikiano </b>
                </h1>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>