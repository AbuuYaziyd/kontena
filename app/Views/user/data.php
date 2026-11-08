<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="content">
  <div class="container">
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="card">
          <div class="col card-header">
            <h2>
              <b><?= lang('app.boxInfo') ?></b>
            </h2>
          </div>
          <div class="card-body">
            <div id="table-default" class="table-responsive">
              <table class="table table-bordered dtTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?= lang('app.user') ?></th>
                    <th><?= lang('app.fikia') ?></th>
                    <th><?= lang('app.box') ?></th>
                    <th><?= lang('app.mpokeaji') ?></th>
                    <th><?= lang('app.select') ?></th>
                  </tr>
                </thead>
                <tbody class="table-tbody">
                  <?php foreach ($users as $key => $us) : ?>
                    <?php $percent = ($us['malipo'] > 0 ? (($us['malipo'] / (session('price') * $us['box'])) * 100) : 0) ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td>
                        <?= $us['name'] ?><br>
                      </td>
                      <td>
                        <span class="badge bg-<?= $us['fikia'] == 'DAR' ? 'primary' : ($us['fikia'] == 'ZNZ' ? 'green' : 'purple') ?> text-success-fg"><?= strtoupper(lang('app.' . $us['fikia'])) ?></span>
                      </td>
                      <td><?= $us['box'] ?></td>
                      <td><?= strtoupper($us['mpokeaji']) ?></td>
                      <td></td>
                    </tr>
                    <div class="modal modal-blur fade" id="send" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <?= form_open('user/send') ?>
                            <?php
                            $rem = ($us['box'] * session('price')) - $us['malipo'];
                            $ujumbe = 'Assalaamu Alaikum warahmatullahi Wabarakaatuh!

Ndugu: ' . $us['name'] . '
Mpaka sasa umelipia kiasi cha *riyali ' . $us['malipo'] . '*, bado kiasi cha *riyali ' . $rem . '*.

*Je, unahitaji kupunguza Box?*
*Ikifika tarehe 26 Tunataraji kuondosha Box zote ambazo hazijalipiwa!*

Tanbihi: Kama umemaliza Malipo wasiliana na Abuu Qutayba Ili kuweka sawa Udhibiti wa Pesa!

Baarakallahu Fiykum!

---------------------------------------------------

السلام عليكم ورحمة الله وبركاته!

الأخ: ' . $us['name'] . '، 
لقد سددت حتى الآن مبلغاً إجمالياً قدره *' . $us['malipo'] . ' ريالاً*، وهناك رصيد متبقٍ قدره *' . $rem . ' ريالاً*. 

*هل ترغب في تقليص حجم الصندوق؟* 
*  في هذا الشهر نعتزم إزالة جميع الصناديق غير المدفوع ثمنها بحلول يوم 26.*

ملاحظة: إذا كنت قد أتممت الدفع، يرجى التواصل مع "أبي قتيبة" لمطابقة الحسابات.* 
                             
بارك الله فيك!';
                            $namba = preg_replace("/[^0-9]/", "", $us['phone']); ?>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 mb-2">
                                  <div class="form-group">
                                    <label style="color:red;">Namba ya Simu ianze na 255000000000</label>
                                    <input type="text" name="namba" class="form-control" value="<?= $namba ?>">
                                  </div>
                                </div>
                                <div class="col-12 mb-2">
                                  <div class="form-group">
                                    <label for="exampleInputBorder">Ujumbe</label>
                                    <textarea name="ujumbe" cols="10" rows="10" class="form-control"><?= $ujumbe ?></textarea>
                                  </div>
                                </div>
                                <button id="<?= $key + 1 ?>" href="https://wa.me/'.<?= $namba ?>.'?text='.<?= rawurlencode($ujumbe) ?>" class="btn btn-success btn-block btn-lg"><i class="nav-icon fas fa-paper-plane"></i> Tuma Ujumbe!</button>
                                </form>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>