<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
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
<!-- modal tambah skill -->
<?php
foreach ($skill_pegawai as $key => $value) { ?>
<div class="modal fade" id="add/<?= $value['nip_skill'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Keahlian <b><?= $value['nama_pegawai'] ?></b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('skill/rekamSkillPegawai') ?>
            <div class="modal-body">
                <input type="hidden" name="nip_skill" value="<?= $value['nip_skill'] ?>">
                <div class="form-group detail-content public-spacebetween">
                    <label for="keahlian" class="label-width col-sm-4 ">Keahlian</label>

                    <select name="keahlian" id="keahlian" class="form-control col-sm-8" required >
                        <option value="">--Pilih Keahlian--</option>
                        <?php foreach($skill as $key=>$value) { ?>
                            <option value="<?=$value['id_skill']?>"><?=$value['nama_skill']?></option>

                        <?php }?>
                    </select>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="file_keahlian" class="col-sm-4 col-form-label">Bukti Keahlian</label>
                    <div class="col-sm-8">
                        <input type="file" name="file_keahlian" id="file_keahlian" required >
                    </div>
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="detail" class="label-width col-sm-4 mt-2">Detail</label>
                   <textarea class="col-sm-8" name="detail" id="detail" cols="40" rows="10" placeholder="Optional"></textarea>
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
const keahlian = document.getElementById("keahlian");
const file = document.getElementById("file_keahlian");
const detail = document.getElementById("detail");

const submit = document.getElementById("submit");



submit.addEventListener('click', () => {
    if (keahlian.validity.valueMissing) {
        keahlian.setCustomValidity('Pilih keahlian');
    } else {
        keahlian.setCustomValidity('');
    }

    file.addEventListener("change", function() {
        var allowedMimeTypes = ["application/pdf"];
        var fileInput = this;
        var file = fileInput.files[0];

        if (!file) {
            fileInput.setCustomValidity("Silahkan upload file pdf");
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