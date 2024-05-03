<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-<?= $box['paid'] != session('price') ? 'danger' : 'success' ?> card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="align-items: center;"><b><?= $title ?>: <?= $box['code'] ?></b>

                                <div class="float-right btn-group btn-sm">
                                    <a href="<?= base_url('data/print/' . $box['id']) ?>" target="_blank" class="btn btn-outline-secondary"><i class="fas fa-paste"></i></a>
                                    <a href="<?= base_url('data/code/' . $box['id']) ?>" target="_blank" class="btn btn-outline-warning"><i class="fas fa-box"></i></a>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
                <?= form_open('data/edit/' . $box['id']) ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label>Namba ya Iqama</label>
                            <input class="form-control" type="text" value="<?= $user['iqama'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Namba ya Simu Mtumaji</label>
                            <input class="form-control" type="text" readonly value="<?= $user['phone'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Jina la Mhusika</label>
                            <input class="form-control" type="text" readonly value="<?= $user['name'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Mafikio </label>
                            <select class="custom-select rounded-0" name="fikia">
                                <option value="DAR" <?= $box['fikia'] == 'DAR' ? 'selected' : '' ?>> DAR</option>
                                <option value="ZNZ" <?= $box['fikia'] == 'ZNZ' ? 'selected' : '' ?>>ZNZ</option>
                                <option value="PBA" <?= $box['fikia'] == 'PBA' ? 'selected' : '' ?>>PBA</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Jina la Mpokeaji</label>
                            <input class="form-control" type="text" name="mpokeaji" value="<?= $box['mpokeaji'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Namba ya Simu Mpokeaji</label>
                            <input class="form-control" type="text" maxlength="12" name="phone" value="<?= $box['phone'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <?php if ($box['code'] != null) : ?>
                            <button type="submit" class="btn btn-block btn-success btn-lg">Hifadhi Data</button>
                        <?php else : ?>
                            <div class="col-md-6">
                                <a href="<?= base_url('data/delete/' . $box['id']) ?>" id="delete" class="btn btn-block btn-danger btn-lg">Futa Box</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-<?= $box['paid'] != session('price') ? 'warning' : 'success' ?> btn-lg">Hifadhi Data</button>
                            </div>
                        <?php endif ?>
                    </div>
                    </form>
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