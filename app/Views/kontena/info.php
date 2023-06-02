
<div class="col-lg-3">
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $total ?><sub style="font-size: 20px"> <i class="fas fa-paper-plane"></i></sub>
            </h3>
            <p>Wanaohitajia</p>
        </div>
        <div class="icon">
            <i class="fas fa-box"></i>
        </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $maliza ?><sub style="font-size: 20px"> <i class="fas fa-thumbs-up"></i></sub></h3>
            <p>Waliolipa</p>
        </div>
        <div class="icon">
            <i class="fas fa-box-open"></i>
        </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="small-box bg-warning" data-toggle="modal" data-target="#idadi">
        <div class="inner">
            <h3><?= $box ?><sub style="font-size: 20px"> <i class="fas fa-shipping-fast"></i></sub></h3>

            <p>Idadi ya Boxi</p>
        </div>
        <div class="icon">
            <i class="fas fa-parachute-box"></i>
        </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $data['count'] - $box ?><sub style="font-size: 20px"> <i class="fas fa-boxes"></i></sub></h3>

            <p>Nafasi (Makadirio)</p>
        </div>
        <div class="icon">
            <i class="fas fa-people-carry"></i>
        </div>
    </div>
</div> 
<?php if (session('isLoggedIn')) : ?>
<div class="modal fade" id="idadi">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Idadi ya Box</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('kontena/count') ?>" method="post">
            <div class="modal-body">
                <fieldset>
                <label><b>Idadi ya Box zinazohitajika</b></label>
                <input type="text" name="count" class="form-control" value="<?= $data['count'] ?>">
                </fieldset>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Funga</button>
                <button type="submit" class="btn btn-outline-primary">Hifadhi</button>
            </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
</div>
<?php endif ?>