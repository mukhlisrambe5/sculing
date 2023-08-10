<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-bold mt-2">Tabel Pegawai</h3>
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
                        <table id="tblRolling" class="table table-bordered table-striped" width="100%">

                            <thead>
                                <tr>
                                    <th style="width:20px">No</th>
                                    <th>Nama Pegawai</th>

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

<!-- modal edit user -->
<?php
foreach ($pegawai as $key => $value) { ?>
    <div class="modal fade" id="edit/<?= $value['id_pegawai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold" id="exampleModalLabel">
                        Rolling pegawai a.n
                        <?= $value['nama_pegawai'] ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('rolling/rekamRolling/' . $value['id_pegawai']) ?>
                <div class="modal-body">
                    <input type="hidden" name="id_pegawai" value="<?= $value['id_pegawai'] ?>">
                    <div class="form-group detail-content public-spacebetween">
                        <label for="nama_pegawai" class="label-width col-sm-4">Nama Pegawai</label>
                        <input type="text" class="form-control col-sm-8" id="nama_pegawai" name="nama_pegawai" required
                            minlength=4 value="<?= $value['nama_pegawai'] ?>" readonly>
                    </div>
                    <div class="form-group detail-content public-spacebetween">
                        <label for="nip" class="label-width col-sm-4">NIP</label>
                        <input type="text" class="form-control col-sm-8" id="nip" name="nip" required minlength=4
                            value="<?= $value['nip'] ?>" readonly>
                    </div>
                    <div>unit_now</div>
                    <div>lama_unit_now</div>
                    <div>unit baru</div>
                    <div>TMT</div>
                    <div>kep</div>

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
    // const username = document.getElementById("username");
    // const password = document.getElementById("password");
    // const level = document.getElementById("level");
    // const status = document.getElementById("status");
    // const submit = document.getElementById("submit");


    // submit.addEventListener('click', () => {
    //     if (username.validity.valueMissing) {
    //         username.setCustomValidity('Username tidak boleh kosong');
    //     } else if (username.validity.tooShort) {
    //         username.setCustomValidity('Minimal 4 Karakter');
    //         username.setCustomValidity('');
    //         if (password.validity.valueMissing) {
    //             password.setCustomValidity('Password tidak boleh kosong');
    //         } else if (password.validity.tooShort) {
    //             password.setCustomValidity('Minimal 4 Karakter');
    //         } else {
    //             password.setCustomValidity('');
    //             if (level.validity.valueMissing) {
    //                 level.setCustomValidity('Level harus dipilih');
    //             } else {
    //                 level.setCustomValidity('');
    //                 if (status.validity.valueMissing) {
    //                     status.setCustomValidity('Status harus dipilih');
    //                 } else {
    //                     status.setCustomValidity('');
    //                 }
    //             }
    //         }
    //     }
    // })
</script>
<?= $this->endSection() ?>