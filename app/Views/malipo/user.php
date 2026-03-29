<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <?php $jumla = session('price') * count($box) ?>
    <div class="row">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <h2 class="page-title">
              <b><?= $title ?></b>
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <div class="btn-group w-100" role="group">
                <span class="btn btn-<?= $sum < $jumla ? 'danger' : 'success' ?>"><?= $jumla ?></span>
                <a href="<?= base_url('data/risiti/' . $user['id']) ?>" class="btn btn-dark">
                  <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                    <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row" style="text-align: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Kilichobaki</label><br>
                  <span class="btn btn-<?= $sum < $jumla ? 'danger' : 'success' ?> w-100 btn-lg"><?= $jumla - $sum ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Alicholipa</label><br>
                  <span class="btn btn-primary w-100 btn-lg"><?= $sum ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputBorder">Idadi ya Box</label><br>
                  <span class="btn btn-warning w-100 btn-lg"><?= count($box) ?></span>
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
                      <button class="btn btn-primary w-100 btn-lg" disabled type="submit" id="submit"><?= lang('app.submit') ?></button>
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