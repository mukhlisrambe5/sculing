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
                        <!-- <table id="tblSkillPegawai" class="table table-bordered table-striped" width="100%"> -->
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

<?= $this->endSection() ?>