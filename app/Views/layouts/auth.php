<!doctype html>
<html lang="<?= session('lang') ?>" dir="<?= session('lang') != 'ar' ? 'ltr' : 'rtl' ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/img/logo/logo.svg') ?>">
    <title><?= lang('app.appName') ?> | <?= $title ?></title>
    <!-- CSS files -->
    <link href="<?= base_url('app-assets/css/tabler.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-flags.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-payments.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/demo.min.css') ?>" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://use.fontawesome.com/8dd27289c6.js"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="<?= base_url('app-assets/js/demo-theme.min.js') ?>"></script>
    <div class="page page-center">

        <div class="container container-tight py-4">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('app-assets/js/tabler.min.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/js/demo.min.js') ?>" defer></script>
</body>

</html>