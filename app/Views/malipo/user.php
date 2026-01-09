<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <?php $jumla = session('price') * count($box) ?>
    <div class="row">
      <div class="col-12">
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
</script>
<?= $this->endSection() ?>