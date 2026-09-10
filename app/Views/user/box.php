<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-md-6">
              <a href="<?= base_url('user/add/' . $user['id']) ?>" style="text-decoration: none;">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-green text-white avatar">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package-export">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                            <path d="M12 12l8 -4.5" />
                            <path d="M12 12v9" />
                            <path d="M12 12l-8 -4.5" />
                            <path d="M15 18h7" />
                            <path d="M19 15l3 3l-3 3" />
                          </svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                          <b><?= lang('app.box') ?></b>
                        </div>
                        <div class="text-secondary">
                          <b><?= lang('app.addBox') ?></b>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <?php for ($i=0; $i < $user['box']; $i++) : ?>
          <?php $color = ($user['malipo'] == 0 ? 'danger' : ($user['malipo'] < (session('price') * $user['box']) ? 'info' : 'success')) ?>
          <div class="col-sm-6 col-lg-3 mb-2">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-<?= $color ?> text-white avatar">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                      </svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      <b><?= $user['fikia'] ?> | <span class="badge bg-<?= $color ?> text-<?= $color ?>-fg"></span></b>
                    </div>
                    <div class="text-secondary">
                      <b>...</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endfor ?>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#add').click(function(e) {
      e.preventDefault();
      url = $(this).attr('href');
      Swal.fire({
        title: 'Unahitaji kuongeza Box?',
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