<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <h1><b><?= $title ?>:</b></h1>
    <div class="row">
      <div class="col-lg">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 style="align-items: center;">Wasiliana Whatsapp</h3>
          </div>
          <?= form_open('malipo/send') ?>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                    <input type="text" name="namba" class="form-control" value="<?= $namba ?>">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="exampleInputBorder">Ujumbe</label>
                    <textarea name="ujumbe" cols="10" rows="10" class="form-control"><?= $ujumbe ?></textarea>
                  </div>
                </div>
                <button id="tuma" class="btn btn-success btn-block btn-lg"><i class="fab fa-whatsapp"></i></button>
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>