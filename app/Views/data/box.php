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
              <?php if (count($code) == count($data) && count($code) > 0) : ?>
                <a href="<?= base_url('data/coded') ?>" style="text-decoration: none;">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-primary text-white avatar">
                            <i class="fa fa-list-ol"></i>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium">
                            <b><?= lang('app.code') ?></b>
                          </div>
                          <div class="text-secondary">
                            <b><?= lang('app.registerCodes') ?></b>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              <?php else : ?>
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-muted text-white avatar">
                          <i class="fa fa-list-ol"></i>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                          <b><?= lang('app.code') ?></b>
                        </div>
                        <div class="text-secondary">
                          <b><?= lang('app.registeredCodes') ?></b>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            </div>
            <div class="col-md-6">
              <a href="<?= base_url('data/add-box') ?>" id="add" style="text-decoration: none;">
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
        <?php foreach ($data as $key => $dt) : ?>
          <div class="col-sm-6 col-lg-3">
            <a href="<?= base_url('data/view/' . $dt['id']) ?>" style="text-decoration: none;">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-<?= $dt['paid'] == 0 ? 'danger' : ($dt['paid'] < session('price') ? 'warning' : 'success') ?> text-white avatar">
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
                        <b><?= $dt['fikia'] ?> | <span class="badge bg-blue text-blue-fg"><?= $dt['code'] ?? $key + 1 ?></span></b>
                      </div>
                      <div class="text-secondary">
                        <b><?= lang('app.openBox') ?></b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach ?>
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