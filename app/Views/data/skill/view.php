<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#tambah_skill"><i class="fas fa-plus mr-2"></i>Tambah Pegawai</button>
                        <h3 class="card-title text-bold mt-2">Tabel Keahlian Pegawai</h3>
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

                    <div class="card-body table-responsive">
                        <table id="tblSkillPegawai" class="table " width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:20px">No</th>
                                    <th class="text-center" width="150px">Action</th>
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Keahlian</th>
                                    <th>Bukti</th>
                                    <th>Detail</th>
                                    <th class="text-center" width="150px">Action</th>
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

<!-- modal tambsh skill pegawai -->
<div class="modal fade" id="tambah_skill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keahlian Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pegawai/tambahSkillPegawai') ?>
            <div class="modal-body">
                <div class="form-group detail-content public-spacebetween">
                    <label for="nama_pegawai" class="label-width col-sm-4">Nama Pegawai</label>
                    <input type="text" class="form-control col-sm-8" id="nama_pegawai" name="nama_pegawai" required
                        minlength=4>
                </div>

                <div class="form-group detail-content public-spacebetween">
                    <label for="text" class="label-width col-sm-4 ">NIP</label>
                    <input type="number" class="form-control col-sm-8" id="nipp" name="nipp" required>
                </div>

                <div class="form-group detail-content public-spacebetween">
                    <label for="keahlian" class="label-width col-sm-4 ">Keahlian</label>

                    <select name="keahlian" id="keahlian" class="form-control col-sm-8" required>
                        <option value="">--Pilih Keahlian--</option>
                        <?php foreach ($skill as $key => $value) { ?>
                            <option value="<?= $value['id_skill'] ?>"><?= $value['nama_skill'] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="file_keahlian" class="col-sm-4 col-form-label">Bukti Keahlian</label>
                    <div class="col-sm-8">
                        <input type="file" name="file_keahlian" id="file_keahlian" required>
                    </div>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="detail" class="label-width col-sm-4 mt-2">Detail</label>
                    <textarea class="col-sm-8" name="detail" id="detail" cols="40" rows="10"
                        placeholder="Optional"></textarea>
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

<!-- modal tambah skill pegawai yang sudah ada di tabel -->
<?php
foreach ($skill_pegawai as $key => $value) {
    $index = $value['nip_skill'] ?>
    <div class="modal fade" id="add/<?= $value['nip_skill'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Keahlian <b>
                            <?= $value['nama_pegawai'] ?>
                        </b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('skill/rekamSkillPegawai') ?>
                <div class="modal-body">
                    <input type="hidden" name="nip_skill" value="<?= $value['nip_skill'] ?>">
                    <div class="form-group detail-content public-spacebetween">
                        <label for="keahlian_<?= $index ?>" class="label-width col-sm-4 ">Keahlian</label>

                        <select name="keahlian" id="keahlian_<?= $index ?>" class="form-control col-sm-8" required>
                            <option value="">--Pilih Keahlian--</option>
                            <?php foreach ($skill as $key => $value) { ?>
                                <option value="<?= $value['id_skill'] ?>"><?= $value['nama_skill'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group detail-content public-spacebetween">
                        <label for="file_keahlian_<?= $index ?>" class="col-sm-4 col-form-label">Bukti Keahlian</label>
                        <div class="col-sm-8">
                            <input type="file" name="file_keahlian" id="file_keahlian_<?= $index ?>" required>
                        </div>
                    </div>
                    <div class="form-group detail-content public-spacebetween">
                        <label for="detail_<?= $index ?>" class="label-width col-sm-4 mt-2">Detail</label>
                        <textarea class="col-sm-8" name="detail" id="detail_<?= $index ?>" cols="40" rows="10"
                            placeholder="Optional"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_<?= $index ?>" class="btn btn-primary">Save</button>
                </div>
                <?= form_close() ?>
            </div>
            <script>
                //    script add skill pegawai
                const keahlian_<?= $index ?> = document.getElementById("keahlian_<?= $index ?>");
                const fileInput_<?= $index ?> = document.getElementById("file_keahlian_<?= $index ?>");
                const detail_<?= $index ?> = document.getElementById("detail_<?= $index ?>");

                const submit_<?= $index ?> = document.getElementById("submit_<?= $index ?>");

                fileInput_<?= $index ?>.addEventListener("change", function () {
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

                submit_<?= $index ?>.addEventListener('click', () => {
                    if (keahlian_<?= $index ?>.validity.valueMissing) {
                        keahlian_<?= $index ?>.setCustomValidity('Pilih keahlian');
                    } else {
                        keahlian_<?= $index ?>.setCustomValidity('');
                    }

                    if (fileInput_<?= $index ?>.validity.valueMissing) {
                        fileInput_<?= $index ?>.setCustomValidity('Upload bukti dukung keahlian');
                    }
                })
            </script>
        </div>
    </div>

<?php } ?>

<!-- modal edit skill pegawai-->
<?php
foreach ($skill_pegawai as $key => $value) {
    $index = $value['id_skill_pegawai'] ?>
    <div class="modal fade" id="edit/<?= $value['id_skill_pegawai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Keahlian <b>
                            <?= $value['nama_pegawai'] ?>
                        </b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('skill/editSkillPegawai/' . $value['id_skill_pegawai']) ?>
                <div class="modal-body">
                    <input type="hidden" name="nip_skill" value="<?= $value['nip_skill'] ?>">
                    <div class="form-group detail-content public-spacebetween">
                        <label for="keahlian<?= $index ?>" class="label-width col-sm-4 ">Keahlian</label>

                        <select name="keahlian" id="keahlian<?= $index ?>" class="form-control col-sm-8" required>
                            <option value="<?= $value['keahlian'] ?>"><?= $value['nama_skill'] ?></option>
                            <?php foreach ($skill as $key => $val) { ?>
                                <option value="<?= $val['id_skill'] ?>"><?= $val['nama_skill'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group detail-content public-spacebetween">
                        <label for="file_keahlian<?= $index ?>" class="col-sm-4 col-form-label">Bukti Keahlian <small
                                class="text-danger">(*Biarkan jika
                                tidak ingin diganti)</small> </label>
                        <div class="col-sm-8">
                            <input type="file" name="file_keahlian" id="file_keahlian<?= $index ?>">
                        </div>
                    </div>
                    <div class="form-group detail-content public-spacebetween">
                        <label for="detail<?= $index ?>" class="label-width col-sm-4 mt-2">Detail</label>
                        <textarea class="col-sm-8" name="detail" id="detail<?= $index ?>" cols="40" rows="10"
                            placeholder="Optional"><?= $value['detail'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit<?= $index ?>" class="btn btn-primary">Save</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <script>
            //    script edit skill pegawai

            const keahlian<?= $index ?> = document.getElementById("keahlian<?= $index ?>");
            const fileInput<?= $index ?> = document.getElementById("file_keahlian<?= $index ?>");
            const detail<?= $index ?> = document.getElementById("detail<?= $index ?>");

            const submit<?= $index ?> = document.getElementById("submit<?= $index ?>");

            fileInput<?= $index ?>.addEventListener("change", function () {
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
        </script>
    </div>

<?php } ?>



<?= $this->endSection() ?>