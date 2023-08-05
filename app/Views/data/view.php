<?= $this->extend('main/layout') ?>

<?= $this->section('content') ?>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-bold mt-2">Tabel Users</h3>

                        <a href="<?= base_url('data/tambahData') ?>" class="btn btn-primary float-right"><i
                                class="fas fa-plus"></i> Tambah Data</a>
                    </div>
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
                    <?php if (session()->getFlashdata('successUpdate')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>  <span> ';
                        echo session()->getFlashdata('successUpdate');
                        echo '</span></h5> </div>';
                    } ?>
                    <div class="card-body">
                        <table id="tblData" class="table table-bordered table-striped" width="100%">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>elemenVar</th>
                                    <th>elemenNum</th>
                                    <th>elementSelect</th>
                                    <th>elementRadio</th>
                                    <th>elementCheck</th>
                                    <th width="300px">elementTextArea</th>
                                    <th>elementDate</th>
                                    <th>elementImg</th>
                                    <th>elementFile</th>
                                    <th class="text-center" width="190px">Action</th>
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