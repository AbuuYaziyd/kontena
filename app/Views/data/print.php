<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $user['name'] ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
    <style>
        @media print {
            @page {
                size: landscape
            }
        }

        h1.ex1 {
            font-size: 170px;
        }
    </style>
</head>

<body class="">
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid"></div>
        </section>
        <div class="container-fluid mt-3">
            <h1 class="text-center h-1 mt-3">
                <b><i class="fas fa-box"></i> Maelezo ya Mzigo</b>
            </h1>
        </div>
        <section class="invoice ">
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="display-4 mt-3">
                    Mtumaji: <b><?= $user['name'] ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Simu No: <b><?= number_format($user['phone'], 0, '', " ")  ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Kutoka: <b>Madina</b>
                </h1>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="display-4 mt-3">
                    Mpokeaji: <b><?= $box['mpokeaji'] ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Simu No: <b><?= number_format($box['phone'], 0, '', " ")  ?></b>
                </h1>
            </div>
            <div class="container-fluid">
                <h1 class="display-4">
                    Mafikio: <b><?= $box['fikia'] ?></b>
                </h1>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <h1 class="text-center display-4 mt-3">
                    <b> Ahsante kwa Ushirikiano </b>
                </h1>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>