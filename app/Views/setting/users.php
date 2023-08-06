<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold mt-2">Tabel Users</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah_user"><i
                class="fas fa-plus mr-2"></i>Tambah User</button>
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
            <table id="tbl1" class="table table-bordered table-striped" width="100%">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Info</th>
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
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('admin/tambahUser') ?>
      <div class="modal-body">
        <div class="form-group detail-content public-spacebetween">
          <label for="username" class="label-width col-sm-3">Username</label>
          <input type="text" class="form-control col-sm-9" id="username" name="username" required minlength=4
            pattern="^[a-zA-Z0-9]+$">
        </div>

        <div class="form-group detail-content public-spacebetween">
          <label for="password" class="label-width col-sm-3 ">Password</label>
          <input type="password" class="form-control col-sm-9" id="password" name="password" required minlength="4">
        </div>
        <div class="form-group detail-content public-spacebetween">
          <label for="level" class="label-width col-sm-3 ">Level</label>
          <select name="level" id="level" class="form-control col-sm-9" required>
            <option value="">--Pilih Level--</option>
            <option value="1">Admin</option>
            <option value="2">Petugas</option>
          </select>
        </div>
        <!-- <div class="form-group detail-content public-spacebetween">
          <label for="status" class="label-width col-sm-3 ">Status</label>

          <select name="status" id="status" class="form-control col-sm-9" required>
            <option value="">--Pilih Status--</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </div> -->
        <input type="hidden" name="status" value="Aktif">
        <div class="form-group detail-content public-spacebetween">
          <label for="info" class="label-width col-sm-3 ">Info</label>
          <textarea name="info" id="" cols="30" rows="10" class="form-control col-sm-9"></textarea>
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

<!-- modal edit user -->
<?php
foreach ($users as $key => $value) { ?>
  <div class="modal fade" id="edit/<?= $value['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User
            <?= $value['username'] ?>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open('admin/editUser/' . $value['id_user']) ?>
        <div class="modal-body">
          <input type="hidden" name="id_user" value="<?= $value['id_user'] ?>">
          <div class="form-group detail-content public-spacebetween">
            <label for="username" class="label-width col-sm-3">Username</label>
            <input type="text" class="form-control col-sm-9" id="username" name="username" required minlength=4
              pattern="^[a-zA-Z0-9]+$" value="<?= $value['username'] ?>">
          </div>

          <div class="form-group detail-content public-spacebetween">
            <label for="password" class="label-width col-sm-3 ">Password</label>
            <input type="password" class="form-control col-sm-9" id="password" name="password" required minlength="4"
              value="<?= $value['password'] ?>">
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="level" class="label-width col-sm-3 ">Level</label>
            <select name="level" id="level" class="form-control col-sm-9" required>
              <option value="1" <?= $value['level'] == '1' ? 'selected' : '' ?>>Admin</option>
              <option value="2" <?= $value['level'] == '2' ? 'selected' : '' ?>>Petugas</option>
            </select>
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="status" class="label-width col-sm-3 ">Status</label>

            <select name="status" id="status" class="form-control col-sm-9" required>
              <option value="Aktif" <?= $value['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
              <option value="Tidak Aktif" <?= $value['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
          </div>
          <div class="form-group detail-content public-spacebetween">
            <label for="info" class="label-width col-sm-3 ">Info</label>
            <textarea name="info" id="" cols="30" rows="10" class="form-control col-sm-9"></textarea>
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

<?php } ?>
<script>
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const level = document.getElementById("level");
  const status = document.getElementById("status");
  const submit = document.getElementById("submit");


  submit.addEventListener('click', () => {
    if (username.validity.valueMissing) {
      username.setCustomValidity('Username tidak boleh kosong');
    } else if (username.validity.tooShort) {
      username.setCustomValidity('Minimal 4 Karakter');
    } else if (username.validity.patternMismatch) {
      username.setCustomValidity('Karakter hanya angka dan huruf');
    } else {
      username.setCustomValidity('');
      if (password.validity.valueMissing) {
        password.setCustomValidity('Password tidak boleh kosong');
      } else if (password.validity.tooShort) {
        password.setCustomValidity('Minimal 4 Karakter');
      } else {
        password.setCustomValidity('');
        if (level.validity.valueMissing) {
          level.setCustomValidity('Level harus dipilih');
        } else {
          level.setCustomValidity('');
          if (status.validity.valueMissing) {
            status.setCustomValidity('Status harus dipilih');
          } else {
            status.setCustomValidity('');
          }
        }
      }
    }
  })
</script>
<?= $this->endSection() ?>