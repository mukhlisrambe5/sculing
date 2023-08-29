<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>

<section class="content mt-3">
    <style>
        .custom-select {
            /* width: 300px;
            color: red; */
            /* Set the desired width */
            color: red;
            border: 1px solid #ccc;
            /* Add border */
            border-radius: 5px;
            /* Round the corners */
            background-color: #f5f5f5;
            /* Background color */
            padding: 5px;
        }

        .select2-selection--multiple {
            /* color: red;
            border: 1px solid #ccc;
            /* Add border */
            border-radius: 5px;
            /* Round the corners */
            background-color: #f5f5f5;
            /* Background color */
            padding: 5px;
            */
            /* Add some padding */
        }

        .select2-selection__choice {
            color: red;
            /* Selected options text color */
        }
    </style>
    <div class="container-fluid">

        <div class="card card-primary mt-6" style="max-width: 600px;  margin:auto">
            <div class="card-header">
                <h3 class="card-title">Rekam Data Boscu</h3>
            </div>
            <style>
                .select2-container--default .select2-selection__choice {
                    color: blue;
                    /* Change this to your desired color */
                }
            </style>

            <form>
                <div class="card-body">
                    <?php
                    $currentYear = date("Y");
                    ?>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">--Pilih Tahun--</option>
                            <option value="<?= $currentYear - 1 ?>"> <?= $currentYear - 1 ?></option>
                            <option value="<?= $currentYear ?>"> <?= $currentYear ?></option>
                            <option value="<?= $currentYear + 1 ?>"><?= $currentYear + 1 ?></option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kuartal">Kuartal</label>
                        <select name="kuartal" id="kuartal" class="form-control">
                            <option value="">--Pilih Kuartal--</option>

                            <option value="I"> I</option>
                            <option value="II"> II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kandidat">Kandidat</label>
                        <select id="mySelect" class="js-example-basic-single form-control custom-select"
                            name="kandidat[]" id="" multiple="multiple">

                            <option value="">Ketik nama dan pilih pegawai</option>
                            <?php foreach ($pegawai as $key => $value) { ?>
                                <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="terpilih">Terpilih</label>
                        <!-- <select id="mySelect2" class="js-example-basic-single form-control" name="terpilih" id=""
                            style="color:red"> -->
                        <select id="mySelect2" class="custom-select" multiple name="select2_options[]">

                            <option value="">Ketik nama dan pilih pegawai</option>
                            <?php foreach ($pegawai as $key => $value) { ?>
                                <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="terpilih">Kep</label>
                        <input type="file" name="kep" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="terpilih">Keterangan</label>
                        <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
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