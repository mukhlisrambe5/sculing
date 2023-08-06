<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold mt-2">Tabel Skill</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah_skill"><i
                class="fas fa-plus mr-2"></i>Tambah Skill</button>
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
            <table id="tblSkill" class="table table-bordered table-striped" width="100%">

              <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>Keahlian</th>
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

<!-- modal add skill -->
<div class="modal fade" id="tambah_skill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Skill
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('skill/tambahSkill') ?>
      <div class="modal-body">
        <div class="form-group detail-content public-spacebetween">
          <label for="nama_skill" class="label-width col-sm-3">Keahlian</label>
          <input type="text" class="form-control col-sm-9" id="nama_skill" name="nama_skill" required minlength=4>
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

<!-- modal edit skill -->
<?php
foreach ($skill as $key => $value) { ?>
  <div class="modal fade" id="edit/<?= $value['id_skill'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Keahlian
            <?= $value['nama_skill'] ?>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open('skill/editSkill/' . $value['id_skill']) ?>
        <div class="modal-body">
          <input type="hidden" name="id_skill" value="<?= $value['id_skill'] ?>">
          <div class="form-group detail-content public-spacebetween">
            <label for="nama_skill" class="label-width col-sm-3">Keahlian</label>
            <input type="text" class="form-control col-sm-9" id="nama_skill_edit" name="nama_skill" required minlength=4
              value="<?= $value['nama_skill'] ?>">
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
  const nama_skill = document.getElementById("nama_skill");
  const submit = document.getElementById("submit");

  const nama_skill_edit = document.getElementById("nama_skill_edit");
  const submitEdit = document.getElementById("submitEdit");



  submit.addEventListener('click', () => {
    if (nama_skill.validity.valueMissing) {
      nama_skill.setCustomValidity('Nama Unit tidak boleh kosong');
    } else if (nama_skill.validity.tooShort) {
      nama_skill.setCustomValidity('Minimal 4 Karakter');
    } else {
      nama_skill.setCustomValidity('');
    }
  })

  submitEdit.addEventListener('click', () => {
    if (nama_skill_edit.validity.valueMissing) {
      nama_skill_edit.setCustomValidity('Nama Unit tidak boleh kosong');
    } else if (nama_skill_edit.validity.tooShort) {
      nama_skill_edit.setCustomValidity('Minimal 4 Karakter');
    } else {
      nama_skill_edit.setCustomValidity('');
    }


  })
</script>

<?= $this->endSection() ?>