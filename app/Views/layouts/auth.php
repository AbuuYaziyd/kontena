<!DOCTYPE html>
<html lang="sw">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords"
        content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <title><?= APP_NAME ?> | <?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
</head>

<body class="hold-transition login-page">

    <?= $this->renderSection('content') ?>

    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
        var Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 3000
        });
        <?php if (session()->getFlashdata('toast')) : ?>
            $(document).ready(function() {
                Toast.fire({
                    icon: '<?= session()->getFlashdata('toast') ?>',
                    title: '<?= session()->getFlashdata('msg') ?>'
                })
            <?php endif ?>
            });
    </script>
</body>

</html>