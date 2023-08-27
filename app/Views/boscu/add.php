<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>

<section class="content mt-3">
    <div class="container-fluid">

        <div class="card card-primary mt-6"
            style="max-width: 600px;  margin:auto">
            <div class="card-header">
                <h3 class="card-title">Rekam Data Boscu</h3>
            </div>


            <form>
                <div class="card-body">
                    <?php 
                $currentYear =  date("Y");
            ?>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">--Pilih Tahun--</option>
                            <option value="<?=$currentYear - 1?>"> <?=$currentYear - 1?></option>
                            <option value="<?=$currentYear?>"> <?=$currentYear?></option>
                            <option value="<?=$currentYear + 1?>"><?=$currentYear + 1?></option>

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
                        <select class="js-example-basic-single form-control" name="kadnidat[]" id=""></select>
                    </div>
                    <div class="form-group">
                        <label for="terpilih">Terpilih</label>
                        <input type="text" name="terpilih" class="form-control" />
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
$(document).ready(function() {
    $('.js-example-basic-single').select2({
        ajax: {
            url: "<?= base_url('boscu/getDataPegawai') ?>",
            dataType: "json",
            type: "post",
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page
                }
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Ketik nama kandidat',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: formatSelection
    });
});

function format(repo) {
    if (repo.loading) {
        return repo.text;
    }

    var $container = $(
        "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__title'></div>" +
        "</div>"
    );

    $container.find(".select2-result-repository__title").text(repo.text);

    return $container;
}

function formatSelection(repo) {
    return repo.text;
}
</script>
<?= $this->endSection('content') ?>