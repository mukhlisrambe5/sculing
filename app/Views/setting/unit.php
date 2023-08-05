<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold mt-2">Tabel Unit</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah_unit"><i
                class="fas fa-plus mr-2"></i>Tambah Unit</button>
          </div>
          <div>
            <?php if (session()->getFlashdata('success')) {
              echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>  <span> ';
              echo session()->getFlashdata('success');
              echo '</span></h5> </div>';
            } ?>

            <?php if (session()->getFlashdata('successDelete')) {
              echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>  <span> ';
              echo session()->getFlashdata('successDelete');
              echo '</span></h5> </div>';
            } ?>
            <?php if (session()->getFlashdata('successEdit')) {
              echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>  <span> ';
              echo session()->getFlashdata('successEdit');
              echo '</span></h5> </div>';
            } ?>
          </div>

          <div class="card-body">
            <table id="tblUnit" class="table table-bordered table-striped" width="100%">

              <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>Unit</th>
                  <th class="text-center" width="170px">Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>

            </table>
          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- modal add user -->
<div class="modal fade" id="tambah_unit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('unit/tambahUnit') ?>
      <div class="modal-body">
        <div class="form-group detail-content public-spacebetween">
          <label for="nama_unit" class="label-width col-sm-3">Nama Unit</label>
          <input type="text" class="form-control col-sm-9" id="nama_unit" name="nama_unit" required minlength=4>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
  const nama_unit = document.getElementById("nama_unit");

  const submit = document.getElementById("submit");


  submit.addEventListener('click', () => {
    if (nama_unit.validity.valueMissing) {
      nama_unit.setCustomValidity('Nama Unit tidak boleh kosong');
    } else if (nama_unit.validity.tooShort) {
      nama_unit.setCustomValidity('Minimal 4 Karakter');
    } else {
      nama_unit.setCustomValidity('');
    }




  })
</script>

<?= $this->endSection() ?>