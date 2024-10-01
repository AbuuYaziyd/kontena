<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>Tz</b> Kontena</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= $title ?></p>

      <?= form_open('recover') ?>
      <div class="input-group mb-3">
        <select name="jamia" class="custom-select">
          <option selected disabled>Chagua Jamia</option>
          <option value="IUM">Jamia Islamia</option>
          <option value="OTHER">Jamia Nyengine</option>
        </select>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-university"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <select name="nchi" class="custom-select">
          <option selected disabled>Chagua Nchi</option>
          <option value="TZ">Tanzania</option>
          <option value="JR">Nchi Jirani</option>
        </select>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-globe"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="number" name="iqama" class="form-control" placeholder="Iqama">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-credit-card"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-lg btn-dark btn-block">Tuma</button>
        </div>
      </div>
      </form>
      <hr>
      <div class="text-center">
        Umekumbuka Password! <a href="<?= base_url('recover') ?>">Ingia</a>
      </div>
    </div>
  </div>
</div>
<script>
  url = window.open(url)
</script>
<?= $this->endSection() ?>