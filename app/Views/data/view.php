<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        <b></b>
                    </div>
                    <h2 class="page-title">
                        <b><?= $title ?> | <?= $box['code'] ?></b>
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="btn-group w-100" role="group">
                            <a href="<?= base_url('data/print/' . $box['id']) ?>" target="_blank" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                    <path d="M7 15a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2l0 -4" />
                                </svg>
                            </a>
                            <a href="<?= base_url('data/code/' . $box['id']) ?>" target="_blank" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="card card-primary card-outline">
                    <?= form_open('data/edit/' . $box['id']) ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 mb-4">
                                <label>Namba ya Iqama</label>
                                <input class="form-control" type="text" value="<?= $user['iqama'] ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Namba ya Simu Mtumaji</label>
                                <input class="form-control" type="text" readonly value="<?= $user['phone'] ?>">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Jina la Mhusika</label>
                                <input class="form-control" type="text" readonly value="<?= $user['name'] ?>">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Mafikio </label>
                                <select class="form-select" name="fikia" <?= $box['code'] != null ? 'disabled' : '' ?>>
                                    <option value="DAR" <?= $box['fikia'] == 'DAR' ? 'selected' : '' ?>> DAR</option>
                                    <option value="ZNZ" <?= $box['fikia'] == 'ZNZ' ? 'selected' : '' ?>>ZNZ</option>
                                    <option value="PBA" <?= $box['fikia'] == 'PBA' ? 'selected' : '' ?>>PBA</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Jina la Mpokeaji</label>
                                <input class="form-control" type="text" name="mpokeaji" value="<?= $box['mpokeaji'] ?>">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Namba ya Simu Mpokeaji</label>
                                <input class="form-control" type="text" maxlength="12" name="phone" value="<?= $box['phone'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($box['code'] != null || $box['paid'] == $kontena['price']) : ?>
                                <button type="submit" class="btn btn-block btn-primary btn-lg"><?= lang('app.submit') ?></button>
                            <?php else : ?>
                                <div class="col-md-6">
                                    <a href="<?= base_url('data/delete/' . $box['id']) ?>" id="delete" class="btn btn-block btn-danger btn-lg mb-2"><?= lang('app.delete') ?></a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-block btn-<?= $box['paid'] != session('price') ? 'warning' : 'primary' ?> btn-lg"><?= lang('app.submit') ?></button>
                                </div>
                            <?php endif ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#delete').click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            Swal.fire({
                title: 'Una uhakika unahitaji kufuta Box?',
                text: "Ukishafuta huwezi kurejesha data tena!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                reverseButtons: false,
                cancelButtonText: 'Hapana!',
                confirmButtonText: 'Futa',
            }).then(function(result) {
                if (result.value) {
                    window.location.href = url;
                }
            })
        });
    });
</script>
<?= $this->endSection() ?>