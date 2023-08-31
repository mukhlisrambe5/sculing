<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: transparent;
            color: #999;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            padding: 0 4px;
            position: relative;
            left: 0;
            top: 0;
            right: 0;
            color: #000;
            margin-right: -0.65rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: transparent;
            color: #000;
            padding: 0 10px;
            margin-top: 0.31rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px;

        }

        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 95%;
            margin-top: 0px;
            margin-left: 12px;
            margin-bottom: 2px;
            padding: 0;
            max-width: 100%;
            resize: none;
            height: 20px;
            vertical-align: bottom;
            font-family: sans-serif;
            overflow: hidden;
            word-break: keep-all;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0px;
            padding-right: 20px;
            margin-top: -10px;
        }
    </style>
    <div class="container-fluid">
        <div class="card card-primary mt-6" style="max-width: 600px;  margin:auto">
            <div class="card-header">
                <h3 class="card-title">Edit Data BOSCU</h3>
            </div>
            <?php
            if (session()->getFlashdata('success')) {
                echo '<script type="text/javascript">';
                echo '
                
                    swal({
                        icon: "success",
                        title: "Sukses",
                        text: "Update Data BOSCU Berhasil",
                        timer: 2000
                    })
                    .then(function(){
                        window.location="./";    
                });';
                echo '</script>';
            }
            ?>
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
            <?= form_open_multipart('boscu/update/' . $boscu['id_boscu']) ?>
            <div class="card-body">
                <?php
                $currentYear = date("Y");
                ?>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control" required>
                        <option value="<?= $boscu['tahun'] ?>">
                            <?= $boscu['tahun'] ?>
                        </option>
                        <option value="<?= $currentYear - 1 ?>"><?= $currentYear - 1 ?></option>
                        <option value="<?= $currentYear ?>"><?= $currentYear ?></option>
                        <option value="<?= $currentYear + 1 ?>"><?= $currentYear + 1 ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tahun">Kuartal</label>
                    <select name="kuartal" id="kuartal" class="form-control" required>
                        <option value="<?= $boscu['kuartal'] ?>"><?= $boscu['kuartal'] ?></option>
                        <option value="I"> I</option>
                        <option value="II"> II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kandidat">Kandidat</label>
                    <select id="kandidat" class="js-example-basic-single form-control" name="kandidat[]" multiple
                        required>

                        <?php foreach ($pegawai as $key => $value) { ?>
                            <option value="<?= $value['nipp'] ?>"><?= $value['nama_pegawai'] ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="terpilih">Terpilih</label>
                    <select id="terpilih" class="js-example-basic-single form-control" name="terpilih" required>

                        <option value="<?= $boscu['terpilih'] ?>"><?= $boscu['nama_pegawai'] ?></option>
                        <?php foreach ($pegawai as $key => $value) { ?>
                            <option value="<?= $value['nipp'] ?>"><?= $value['nama_pegawai'] ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kep">Kep (<small class="text-danger">Biarkan jika tidak ingin diganti</small>)</label>
                    <input type="file" name="kep" id="kep" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea name="ket" id="ket" cols="30" rows="4" class="form-control"
                        value="<?= old('ket') ?>"><?= $boscu['ket'] ?></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <a href="<?= base_url('boscu') ?>" class="btn btn-secondary">Close</a>
                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>


    </div>
</section>


<script>

    $(document).ready(function () {
        $('#kandidat').select2();
        $('#terpilih').select2();

        <?php
        $keys = $id_kandidat;
        $values = $kandidat;
        $combinedArray = array_combine($keys, $values);
        foreach ($combinedArray as $key => $value): ?>
            $('#kandidat').append(new Option('<?= $value ?>', '<?= $key ?>', true, true))

        <?php endforeach; ?>

        const tahun = document.getElementById("tahun");
        const kuartal = document.getElementById("kuartal");
        const kandidat = document.getElementById("kandidat");
        const terpilih = document.getElementById("terpilih");
        const fileInput = document.getElementById("kep");
        const ket = document.getElementById("ket");

        const submit = document.getElementById("submit");

        fileInput.addEventListener('change', function () {
            var allowedMimeTypes = ['application/pdf'];
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
        })

        submit.addEventListener('click', () => {

            if (tahun.validity.valueMissing) {
                tahun.setCustomValidity('Tahun tidak boleh kosong');
            } else {
                tahun.setCustomValidity('');
            }

            if (kuartal.validity.valueMissing) {
                kuartal.setCustomValidity('Kuartal tidak boleh kosong');
            } else {
                kuartal.setCustomValidity('');
            }

            if (kandidat.validity.valueMissing) {
                kandidat.setCustomValidity('Kandidat tidak boleh kosong');
            } else {
                kandidat.setCustomValidity('');
            }

            if (terpilih.validity.valueMissing) {
                terpilih.setCustomValidity('Pegawai terpilih tidak boleh kosong');
            } else {
                terpilih.setCustomValidity('');
            }
            if (kep.validity.valueMissing) {
                kep.setCustomValidity('Silahkan upload kep BOSCU');
            }

        })

    });
</script>
<?= $this->endSection() ?>