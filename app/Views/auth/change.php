<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>Tz</b> Kontena</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= $title ?></p>

      <?= form_open('password') ?>
      <div class="input-group mb-3">
        <input type="password" id="old" name="old" class="form-control" placeholder="Password ya Zamani">
        <div class="input-group-append">
          <button type="button" class="input-group-text">
            <span class="fas fa-eye-slash" id="togglePasswordOld"></span>
          </button>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" id="password" name="new" class="form-control" placeholder="Password Mpya" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Lazima iwe na angalau nambari moja na herufi kubwa na ndogo, na angalau herufi 8 au zaidi"
          required>
        <div class="input-group-append">
          <button type="button" class="input-group-text">
            <span class="fas fa-eye-slash" id="togglePasswordNew"></span>
          </button>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" id="repeat" class="form-control" placeholder="Rudia Password Mpya" onkeyup="check();">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-eye-slash"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-lg btn-dark btn-block" disabled id="submit">Tuma</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  // Old
  const togglePasswordOld = document.getElementById('togglePasswordOld');
  const old = document.getElementById('old');

  togglePasswordOld.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = old.getAttribute('type') === 'password' ? 'text' : 'password';
    old.setAttribute('type', type);

    // Update the button text or icon
    if (type === 'password') {
      // this.textContent = 'Show';
      this.classList.remove('fa-eye');
      this.classList.add('fa-eye-slash');
    } else {
      // this.textContent = 'Hide';
      this.classList.remove('fa-eye-slash');
      this.classList.add('fa-eye');
    }
  });

  // New
  const togglePasswordNew = document.getElementById('togglePasswordNew');
  const password = document.getElementById('password');

  togglePasswordNew.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Update the button text or icon
    if (type === 'password') {
      // this.textContent = 'Show';
      this.classList.remove('fa-eye');
      this.classList.add('fa-eye-slash');
    } else {
      // this.textContent = 'Hide';
      this.classList.remove('fa-eye-slash');
      this.classList.add('fa-eye');
    }
  });

  var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('repeat').value) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  };
</script>
<?= $this->endSection() ?>