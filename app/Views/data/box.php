<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <?php if (count($code) == count($data) && count($code) > 0) : ?>
      <div class="row">
        <div class="col-12">
          <a href="<?= base_url('data/coded') ?>">
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>CODE<sub style="font-size: 20px"> <i class="fas fa-list-ol"></i></sub></h3>
                <p>Sajili Namba za Box</p>
              </div>
              <div class="icon">
                <i class="fas fa-list-ol"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
      <hr>
      <?php if ($boxCount < $kontena['count']) : ?>
        <div class="row">
          <div class="col-12">
            <a href="<?= base_url('data/add-box') ?>" id="add">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>Box<sub style="font-size: 20px"> <i class="fas fa-box"></i></sub></h3>
                  <p>Ongeza Box</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <hr>
      <?php endif ?>
    <?php else : ?>
      <?php if ($boxCount < $kontena['count']) : ?>
        <div class="row">
          <div class="col-12">
            <a href="<?= base_url('data/add-box') ?>" id="add">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>Box<sub style="font-size: 20px"> <i class="fas fa-box"></i></sub></h3>
                  <p>Ongeza Box</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <hr>
      <?php endif ?>
    <?php endif ?>
    <div class="row">
      <?php foreach ($data as $key => $dt) : ?>
        <div class="col-md-3 col-6">
          <a href="<?= base_url('data/view/' . $dt['id']) ?>">
            <div class="small-box bg-<?= $dt['paid'] == 0 ? 'danger' : ($dt['paid'] < session('price') ? 'warning' : 'success') ?>">
              <div class="inner">
                <h3><?= $dt['code'] ?? $key + 1 ?><sub style="font-size: 20px"> <i class="fas fa-box-open"></i></sub></h3>
                <p>Fungua</p>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#add').click(function(e) {
      e.preventDefault();
      url = $(this).attr('href');
      Swal.fire({
        title: 'Unahutaji kuongeza Idadi ya Box zako?',
        text: "Fanya malipo mapema kuepusha Kuzuiwa box zako!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Hapana!',
        confirmButtonText: 'Ndio',
      }).then(function(result) {
        if (result.value) {
          window.location.href = url;
        }
      })
    });
  });
</script>
<?= $this->endSection() ?>