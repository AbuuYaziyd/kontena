<!doctype html>
<html lang="<?= session('lang') ?>" dir="<?= session('lang') != 'ar' ? 'ltr' : 'rtl' ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="keywords" content="Umoja wa Watanzania Chuo Kikuu cha Kiislamu Madina">
    <meta name="author" content="abouyaziyd">
    <link rel="manifest" href="./manifest.json" />
    <meta name="theme-color" content="#06694c">
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
    <script src="https://use.fontawesome.com/8dd27289c6.js"></script>
    <?= $this->renderSection('styles') ?>
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
                    <a href="<?= base_url() ?>" style="text-decoration: none;">
                        <img src="<?= base_url('app-assets/img/logo/logo.png') ?>" width="110" height="32" alt="Tabler" class="navbar-brand-image"> <?= lang('app.appFullName') ?>
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <?php if (session('isLoggedIn')) : ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="avatar avatar-sm" style="background-image: url('https://ui-avatars.com/api/?background=0D8ABC&name=<?= session('name') ?>')"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div><?= ucwords(strtolower(session('name'))) ?></div>
                                    <div class="mt-1 small text-secondary"><?= lang('app.' . session('jamia')) ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <!-- <div class="dropdown-divider"></div>
                                <a href="./settings.html" class="dropdown-item">Settings</a> -->
                                <a href="<?= base_url('logout') ?>" class="dropdown-item logout"><?= lang('app.logout') ?></a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                <b><?= $title ?></b>
                            </div>
                            <h2 class="page-title">
                                <b><?= lang('app.appFullName') ?></b>
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <div class="btn-group w-100" role="group">
                                    <?php if (session('isLoggedIn')) : ?>
                                        <?php if ($title == lang('app.welcome')) : ?>
                                            <a href="<?= base_url('data') ?>" class="btn btn-primary">
                                                <?= lang('app.dashboard') ?>
                                            </a>
                                        <?php endif ?>
                                        <a href="<?= base_url('logout') ?>" class="btn btn-danger logout">
                                            <?= lang('app.logout') ?>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('login') ?>" class="btn btn-indigo">
                                            <?= lang('app.login') ?>
                                        </a>
                                    <?php endif ?>
                                    <?php if (session('lang') != 'ar') : ?>
                                        <a href="<?= base_url('locale/ar') ?>" class="btn btn-outline-primary">
                                            <span class="flag flag-xs flag-country-sa me-1"></span>
                                            العربية
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('locale/sw') ?>" class="btn btn-outline-primary">
                                            <span class="flag flag-xs flag-country-tz me-1"></span>
                                            Kiswahili
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <?= $this->renderSection('content') ?>
            <?= $this->include('layouts/footer') ?>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="<?= base_url('app-assets/libs/apexcharts/dist/apexcharts.min.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/libs/jsvectormap/dist/js/jsvectormap.min.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/libs/jsvectormap/dist/maps/world.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/libs/jsvectormap/dist/maps/world-merc.js') ?>" defer></script>
    <!-- Tabler Core -->
    <script src="<?= base_url('app-assets/js/tabler.min.js') ?>" defer></script>
    <script src="<?= base_url('app-assets/js/demo.min.js') ?>" defer></script>
    <?= $this->renderSection('scripts') ?>
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
    <script>
        $('.logout').click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            Swal.fire({
                title: "<?= lang('app.sureLogout') ?>",
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: "<?= lang('app.yes') ?>",
                denyButtonText: '<?= lang('app.changePassword') ?>',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                } else if (result.isDenied) {
                    window.location.href = '<?= base_url('change') ?>';
                }
            });
        });
    </script>
</body>

</html>