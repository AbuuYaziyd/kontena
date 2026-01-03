<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>
          <span><b>Kontena:</b></span><a href="<?= base_url('logout') ?>" class="btn btn-lg btn-outline-danger float-right" id="logout"> <i class="fas fa-sign-out-alt"></i> Ondoka</a>
        </h1>
        <div class="row">
          <?php if (count($knt) > 0) : ?>
            <?php foreach ($knt as $dt) : ?>
              <div class="col-md-4">
                <a href="<?= base_url('data/box/' . $dt['kontena_id'] . '/' . session('id')) ?>">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= $data->kontena($dt['kontena_id'])['title'] ?><sub style="font-size: 20px"> <i class="fas fa-box"></i> </sub></h3>
                      <p>Idadi ya Box Zako: <b><?= $data->box($dt['kontena_id'], session('id')) ?></b></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-box-open"></i>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach ?>
            <div class="col-md-4">
              <a href="<?= base_url('user/profile') ?>">
                <div class="small-box bg-warning" data-toggle="modal" data-target="#idadi">
                  <div class="inner">
                    <h3>Kuhusu<sub style="font-size: 20px"> <i class="fas fa-shipping-fast"></i></sub></h3>
                    <p>Data za Mtumiaji</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="<?= base_url('user/receiver') ?>">
                <div class="small-box bg-dark">
                  <div class="inner">
                    <h3>Mpokeaji<sub style="font-size: 20px"> <i class="fas fa-boxes"></i></sub></h3>
                    <p>Maelezo ya Mpokeaji</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-people-carry"></i>
                  </div>
                </div>
              </a>
            </div>
          <?php else : ?>
            <div class="col-md-4">
              <a href="<?= base_url('data/new') ?>">
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>Sajili<sub style="font-size: 20px"> <i class="fas fa-box"></i> </sub></h3>
                    <p>Sajili Box Zako</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                </div>
              </a>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <hr>
    <?php if (session('role') == 'admin') : ?>
      <?= $this->include('data/admin') ?>
    <?php endif ?>
  </div>
</div>
<script>
  $('#logout').click(function(e) {
    e.preventDefault();
    url = $(this).attr('href');
    Swal.fire({
      title: "Unahitaji Kuondoka?",
      icon: 'question',
      showDenyButton: true,
      confirmButtonText: "Ndio",
      denyButtonText: 'Badili Password',
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      } else if (result.isDenied) {
        window.location.href = '<?= base_url('change') ?>';
      }
    });
    // Swal.fire({
    //   title: 'Una uhakika unahitaji kufuta Box?',
    //   text: "Ukishafuta huwezi kurejesha data tena!",
    //   icon: 'warning',
    //   showCancelButton: true,
    //   cancelButtonColor: '#3085d6',
    //   confirmButtonColor: '#d33',
    //   reverseButtons: false,
    //   cancelButtonText: 'Hapana!',
    //   confirmButtonText: 'Futa',
    // }).then(function(result) {
    //   if (result.value) {
    //     window.location.href = url;
    //   }
    // })
  });
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>