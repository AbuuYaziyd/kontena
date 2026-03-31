<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="align-items: center;"><b><?= $title ?>: </b>
                                <span class="btn btn-secondary float-right "><?= $knt['year'] ?></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <?= form_open('data/create') ?>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label>Mafikio </label>
                            <select class="form-select rounded-0" name="fikia">
                                <option selected disabled>Chagua Mafikio</option>
                                <option value="DAR">DAR</option>
                                <option value="ZNZ">ZNZ</option>
                                <option value="PBA">PBA</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Jina la Mpokeaji</label>
                            <input class="form-control" type="text" name="mpokeaji" placeholder="Jina la Mpokeaji">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Namba ya Simu ya Mpokeaji</label>
                            <input class="form-control" type="number" placeholder="255123456789" name="phone">
                        </div>

                        <div class="col-md-6 mb-2">
                        
                            <label>Idadi ya Box | <span class="text-center text-danger"><b>Ukiwa na Box zaidi ya 30 wasiliana na Kamati ya Kontena</b></span></label>
                            <input class="form-control" type="number" max="30" placeholder="3" name="idadi">
                        </div>
                    </div>
                    <input type="hidden" name="kontena_id" value="<?= $knt['id'] ?>">
                    <div class="row">
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Hifadhi</button>
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