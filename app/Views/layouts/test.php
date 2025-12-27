<!DOCTYPE html>
<html lang="sw">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <title><?= APP_NAME ?> | <?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.svg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->renderSection('styles') ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> <b>Top Navigation</b></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-3">
                            <div class="small-box bg-<?= 5 <= 4 ? 'danger' : 'info' ?>">
                                <div class="inner">
                                    <h3><?= 4 ?><sub style="font-size: 20px"> <i class="fas fa-paper-plane"></i></sub>
                                    </h3>
                                    <p>Zinazohitajika</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="sw">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <title><?= APP_NAME ?> | <?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.svg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->renderSection('styles') ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/img/logo.svg') ?>" alt="kontena" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?= APP_NAME ?></span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <?php if (!session('isLoggedIn')) : ?>
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url('kontena') ?>" class="nav-link">Kontena</a>
                            </li>
                        </ul> -->
                    <?php else : ?>
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url('malipo') ?>" class="nav-link">Admin</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url('data') ?>" class="nav-link">Data</a>
                            </li>
                        </ul> -->
                    <?php endif ?>
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item">
                            <?php if (session('isLoggedIn') != true) : ?>
                                <a href="<?= base_url('login') ?>" class="btn btn-sm btn-warning">
                                    Ingia <i class="fas fa-sign-in-alt"></i> </a>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-sign-out-alt"></i> Ondoka</a>
                                </a>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
                    </div>
                </div>
            </section>

            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            <a href="https://abouyaziyd.rf.gd" target="_blank"> <strong>Abou Yaziyd</strong></a>
        </div>
        <strong>Hakimiliki &copy; <?= date('Y'); ?> <a href="<?= base_url('home') ?>"><?= APP_NAME ?></a>.</strong>
        Haki zote zimehifadhiwa.
    </footer>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/adminlte.min.js') ?>"></script>
    <script>
        <?php if (session()->getFlashdata('toast')) : ?>
            $(document).ready(function() {
                Swal.fire({
                    position: "center",
                    icon: "<?= session()->getFlashdata('toast') ?>",
                    title: "<?= session()->getFlashdata('title') ?>",
                    text: "<?= session()->getFlashdata('text') ?>",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        <?php endif ?>
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>