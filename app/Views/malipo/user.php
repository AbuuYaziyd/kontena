<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <?php $jumla = session('price') * count($box) ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card card-<?= $sum < $jumla ? 'danger' : 'primary' ?> card-outline">
          <div class="card-header">
            <h3><b><?= $title ?>:</b> <span class="btn btn-<?= $sum < $jumla ? 'danger' : 'success' ?> float-right"><?= $jumla ?></span></h3>
          </div>
          <div class="card-body">
            <div class="row" style="text-align: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Kilichobaki</label><br>
                  <span class="btn btn-<?= $sum < $jumla ? 'danger' : 'success' ?> btn-block btn-lg"><?= $jumla - $sum ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Alicholipa</label><br>
                  <span class="btn btn-primary btn-block btn-lg"><?= $sum ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Idadi ya Box</label><br>
                  <span class="btn btn-warning btn-block btn-lg"><?= count($box) ?></span>
                </div>
              </div>
            </div>
            <hr>
            <?php if ($sum < $jumla) : ?>
              <?= form_open('malipo/edit/' . $user['id']) ?>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Malipo</label>
                      <span class="float-right">Chenji: <b><?= $chenji ?>SAR</b></span><br>
                      <input type="number" class="form-control mb-3" name="pesa" placeholder="Alichotoa leo" onkeyup="check();" id="pesa">
                      <input type="hidden" name="chenji" value="<?= $chenji ?>">
                      <button class="btn btn-primary btn-block btn-lg" disabled type="submit" id="submit">Tuma</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            <?php endif ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3><b>Mtumiaji:</b></h3>
          </div>
          <div class="card-body">
            <div class="row" style="text-align: center;">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputBorder">WhatsApp</label><br>
                  <a href="https://wa.me/<?= $user['phone'] ?>" target="_blank" class="btn btn-success btn-block btn-lg"><i class="fab fa-whatsapp"></i></a>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputBorder">Simu</label><br>
                  <a href="tel:<?= $user['phone'] ?>" class="btn btn-primary btn-block btn-lg"><i class="fa fa-phone"></i></a>
                </div>
              </div>
            </div>
            <hr>
            <?php if ($sum < $jumla) : ?>
              <?= form_open('forgot') ?>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Amesahau Password</label>
                      <input type="number" class="form-control mb-3" name="phone" value="<?= $user['phone'] ?>">
                      <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                      <input id="password" class="btn btn-warning btn-block btn-lg" value="Badili Password">
                    </div>
                  </div>
                </div>
              </div>
              </form>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3><b>Maelezo ya Mtumaji:</b></h3>
          </div>
          <div class="card-body">
            <div class="row" style="text-align: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Jina la Mhitaji</label><br>
                  <span class="btn btn-danger btn-block btn-lg"><?= $user['name'] ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Mpokeaji</label><br>
                  <span class="btn btn-primary btn-block btn-lg"><?= $kont['mpokeaji'] ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Nchi</label><br>
                  <span class="btn btn-warning btn-block btn-lg"><?= $user['nchi'] ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="form-group">
                    <label>Simu Mhusika</label><br>
                    <a class="btn btn-danger btn-block btn-lg" href="<?= base_url('malipo/whatsapp/' . preg_replace("/[^0-9]/", "", $user['phone']) . '/' . $kont['id']) ?>"><?= $kont['phone'] ?></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleSelectBorderWidth2">Simu Mpokeaji</label><br>
                  <span class="btn btn-info btn-block btn-lg"><?= $kont['phone'] ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleSelectBorderWidth2"> Mafikio</label><br>
                  <span class="btn btn-dark btn-block btn-lg"><?= $kont['fikia'] ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <?php foreach ($box as $key => $dt) : ?>
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
  </div>
</div>
<script>
  var check = function() {
    if (document.getElementById('pesa').value >= 1) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  };

  $(document).ready(function() {
    $('#password').click(function(e) {
      e.preventDefault();
      // url = $(this).attr('href');
      let $form = $(this).closest('form');
      Swal.fire({
        title: 'Je, Amesahau Password?',
        text: 'Namba za simu za Mtumiaji ni sahihi? <?= $user['phone'] ?>',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Hapana!',
        confirmButtonText: 'Ndio',
      }).then(function(result) {
        if (result.value) {
          // window.location.href = url;
          $form.submit();
        }
      })
    });
  });
</script>
<?= $this->endSection() ?>