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
    <link href="<?= base_url('app-assets/css/tabler' . (session('lang') != 'ar' ? '' : '.rtl') . '.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-flags' . (session('lang') != 'ar' ? '' : '.rtl') . '.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-payments' . (session('lang') != 'ar' ? '' : '.rtl') . '.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/tabler-vendors' . (session('lang') != 'ar' ? '' : '.rtl') . '.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('app-assets/css/demo' . (session('lang') != 'ar' ? '' : '.rtl') . '.min.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://use.fontawesome.com.js"></script>
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

<body>
    <script src="<?= base_url('app-assets/js/demo-theme.min.js') ?>"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" width="110" height="32" alt="Tabler" class="navbar-brand-image"> <?= lang('app.appFullName') ?>
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <?php if (session('isLoggedIn')) : ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="avatar avatar-sm" style="background-image: url(https://ui-avatars.com/api/?background=0D8ABC&name=<?= session('name') ?>)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div><?= ucwords(strtolower(session('name'))) ?></div>
                                    <div class="mt-1 small text-secondary"><?= lang('app.' . session('jamia')) ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="#" class="dropdown-item">Status</a>
                                <a href="./profile.html" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Feedback</a>
                                <div class="dropdown-divider"></div>
                                <a href="./settings.html" class="dropdown-item">Settings</a>
                                <a href="./sign-in.html" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <?= lang('app.print') ?> | <?= $title ?>
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                                <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                    <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                </svg>
                                <?= lang('app.print') ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->renderSection('content') ?>
            <?= $this->include('layouts/footer') ?>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('app-assets/js/tabler.min.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/js/demo.min.js') ?>" defer></script>
</body>

</html>