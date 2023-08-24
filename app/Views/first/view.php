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
                        <table id="tblFirst" class="table table-bordered table-striped" width="100%">

                            <thead>
                                <tr>
                                    <th style="width:20px">No</th>
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>

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

</section>
<!-- modal input rolling -->
<?php
foreach ($first as $key => $value) { ?>
<div class="modal fade" id="edit/<?= $value['id_pegawai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input penempatan <?= $value['nama_pegawai'] ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('rolling/rekamRolling')?>
            <div class="modal-body">
                <div class="form-group detail-content public-spacebetween">
                    <label for="nama_pegawai" class="label-width col-sm-4 mt-2">Nama Pegawai</label>
                    <input type="text" class="form-control col-sm-8" id="nama_pegawai_edit" name="nama_pegawai" readonly
                        minlength=4 value="<?= $value['nama_pegawai'] ?>">
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="nipp" class="label-width col-sm-4 mt-2">NIP</label>
                    <input type="text" class="form-control col-sm-8" id="nipp" name="nipp" readonly minlength=4
                        value="<?= $value['nipp'] ?>">
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="unit" class="label-width col-sm-4 ">Unit</label>

                    <select name="unit" id="unit" class="form-control col-sm-8" required>
                        <option value="">--Pilih Unit--</option>
                        <?php foreach ($unit as $key => $value) { ?>
                        <option value="<?=$value['id_unit']?>"><?=$value['nama_unit']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="tmt" class="label-width col-sm-4 mt-2">TMT</label>
                    <input type="date" class="form-control col-sm-8" id="tmt" name="tmt" required>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="file" class="col-sm-4 col-form-label">Kep</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" id="file" required>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?php } ?>


<script>
const unit = document.getElementById("unit");
const tmt = document.getElementById("tmt");
const kep = document.getElementById("file");

const submit = document.getElementById("submit");



submit.addEventListener('click', () => {
    if (unit.validity.valueMissing) {
        unit.setCustomValidity('Silahkan pilih unit');
    } else {
        unit.setCustomValidity('');
    }

    if (tmt.validity.valueMissing) {
        tmt.setCustomValidity('Silahkan isi tanggal mulai berlaku');
    } else {
        tmt.setCustomValidity('');
    }

    kep.addEventListener("change", function() {
        var allowedMimeTypes = ["application/pdf"];
        var fileInput = this;
        var file = fileInput.files[0];

        if (!file) {
            fileInput.setCustomValidity("Silahkan upload file Kep");
        } else {
            var fileMimeType = file.type;
            if (allowedMimeTypes.indexOf(fileMimeType) === -1) {
                fileInput.setCustomValidity("Invalid jenis file. Silahkan upload file PDF");
            } else {
                fileInput.setCustomValidity("");
            }
        }
    });
})
</script>
<?= $this->endSection() ?>