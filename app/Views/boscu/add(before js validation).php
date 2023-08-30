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
                <h3 class="card-title">Rekam Data BOSCU</h3>
            </div>

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismisable">
                    <h5>Terdapat Kesalahan:</h5>
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                            <li>
                                <?= esc($value) ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            <?php } ?>

            <?php
            if (session()->getFlashdata('success')) {
                echo '<script type="text/javascript">';
                echo '
                
                    swal({
                        icon: "success",
                        title: "Sukses",
                        text: "Perekaman Data BOSCU Berhasil",
                        timer: 2000
                    })
                    .then(function(){
                        window.location="./";    
                });';
                echo '</script>';
            }
            ?>
            <form action="<?= base_url('boscu/save') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php
                    $currentYear = date("Y");
                    $validation = \Config\Services::validation();

                    ?>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" value="<?php echo set_value('tahun'); ?>">
                            <option value="">--Pilih Tahun--</option>
                            <option value="<?= $currentYear - 1 ?>"> <?= $currentYear - 1 ?></option>
                            <option value="<?= $currentYear ?>"> <?= $currentYear ?></option>
                            <option value="<?= $currentYear + 1 ?>"><?= $currentYear + 1 ?></option>
                        </select>
                    </div>
                    <?php if ($validation->hasError('tahun')) {
                        echo "<div class='warningValidation'>" . $validation->getError('tahun') . "</div>";
                    } ?>
                    <p>
                        <?= $validation->getError('tahun'); ?>
                    </p>
                    <div class="form-group">
                        <label for="kuartal">Kuartal</label>
                        <select name="kuartal" id="kuartal" class="form-control"
                            value="<?php echo set_value('kuartal'); ?>">
                            <option value="">--Pilih Kuartal--</option>
                            <option value="I"> I</option>
                            <option value="II"> II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kandidat">Kandidat</label>
                        <select id="mySelect" class="js-example-basic-single form-control" name="kandidat[]" id=""
                            multiple data-placeholder="Cari dan pilih kandidat">
                            <option value="">Pilih pegawai</option>

                            <?php foreach ($pegawai as $key => $value) { ?>
                                <option value="<?= $value['nipp'] ?>"><?= $value['nama_pegawai'] ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="terpilih">Terpilih</label>
                        <select id="mySelect2" class="js-example-basic-single form-control" name="terpilih" id="">

                            <option value="">Pilih pemenang</option>
                            <?php foreach ($pegawai as $key => $value) { ?>
                                <option value="<?= $value['nipp'] ?>"><?= $value['nama_pegawai'] ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kep">Kep</label>
                        <input type="file" name="kep" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="" cols="30" rows="4" class="form-control"
                            value="<?= old('ket') ?>"></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#mySelect').select2();
        $('#mySelect2').select2();
    });
</script>
<?= $this->endSection('content') ?>