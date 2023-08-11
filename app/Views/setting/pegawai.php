<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold mt-2">Tabel Pegawai</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
              data-target="#tambah_pegawai"><i class="fas fa-plus mr-2"></i>Tambah Pegawai</button>
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
            <table id="tblPegawai" class="table table-bordered table-striped" width="100%">

              <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Jabatan</th>
                  <th>Status</th>

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

<!-- modal add pegawai -->
<div class="modal fade" id="tambah_pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('pegawai/tambahPegawai') ?>
      <div class="modal-body">
        <div class="form-group detail-content public-spacebetween">
          <label for="nama_pegawai" class="label-width col-sm-4">Nama Pegawai</label>
          <input type="text" class="form-control col-sm-8" id="nama_pegawai" name="nama_pegawai" required minlength=4>
        </div>

        <div class="form-group detail-content public-spacebetween">
          <label for="text" class="label-width col-sm-4 ">NIP</label>
          <input type="number" class="form-control col-sm-8" id="nipp" name="nipp" required>
        </div>

        <div class="form-group detail-content public-spacebetween">
          <label for="jabatan" class="label-width col-sm-4 ">Jabatan</label>

          <select name="jabatan" id="jabatan" class="form-control col-sm-8" required>
            <option value="">--Pilih Jabatan--</option>
            <option value="Fungsional">Fungsional</option>
            <option value="Pelaksana">Pelaksana</option>
          </select>
        </div>
        <input type="hidden" class="form-control col-sm-9" id="status" name="status" value="Aktif">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>


<!-- modal edit pegawai -->
<?php
foreach ($pegawai as $key => $value) { ?>
  <div class="modal fade" id="edit/<?= $value['id_pegawai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit pegawai
            <?= $value['nama_pegawai'] ?>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open('pegawai/editPegawai/' . $value['id_pegawai']) ?>
        <div class="modal-body">
          <input type="hidden" name="id_pegawai" value="<?= $value['id_pegawai'] ?>">
          <div class="form-group detail-content public-spacebetween">
            <label for="nama_pegawai" class="label-width col-sm-4 mt-2">Nama Pegawai</label>
            <input type="text" class="form-control col-sm-8" id="nama_pegawai_edit" name="nama_pegawai" required
              minlength=4 value="<?= $value['nama_pegawai'] ?>">
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="nipp" class="label-width col-sm-4 mt-2">NIP</label>
            <input type="text" class="form-control col-sm-8" id="nipp" name="nipp" required minlength=4
              value="<?= $value['nipp'] ?>">
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="jabatan" class="label-width col-sm-4 ">Jabatan</label>

            <select name="jabatan" id="jabatan" class="form-control col-sm-8" required>
              <option value="Pelaksana" <?= $value['jabatan'] == 'Pelaksana' ? 'selected' : '' ?>>Pelaksana</option>
              <option value="Fungsional" <?= $value['jabatan'] == 'Fungsional' ? 'selected' : '' ?>>Fungsional</option>
            </select>
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="status" class="label-width col-sm-4 ">Status</label>

            <select name="status" id="status" class="form-control col-sm-8" required>
              <option value="Aktif" <?= $value['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
              <option value="Tidak Aktif" <?= $value['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submitEdit" class="btn btn-primary">Update</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>

<?php } ?>


<script>
  const nama_pegawai = document.getElementById("nama_pegawai");
  const nipp = document.getElementById("nipp");
  const submit = document.getElementById("submit");



  submit.addEventListener('click', () => {
    if (nama_pegawai.validity.valueMissing) {
      nama_pegawai.setCustomValidity('Nama Pegawai tidak boleh kosong');
    } else if (nama_pegawai.validity.tooShort) {
      nama_pegawai.setCustomValidity('Minimal 4 Karakter');
    } else {
      nama_pegawai.setCustomValidity('');
    }

    if (nipp.validity.valueMissing) {
      nipp.setCustomValidity('NIP tidak boleh kosong');
    } else {
      nipp.setCustomValidity('');
    }
  })


</script>

<?= $this->endSection() ?>