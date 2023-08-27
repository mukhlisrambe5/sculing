<?= $this->extend('main/layout') ?>


<?= $this->section('content') ?>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-bold mt-2">Tabel BOSCU</h3>
                        <a href="<?=base_url('boscu/add')?>"  class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>Rekam Data</a>

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
                        <table id="tblBoscu" class="table table-bordered table-striped" width="100%">

                            <thead>
                                <tr>
                                    <th style="width:20px">No</th>
                                    <th>Tahun</th>
                                    <th>Kuartal</th>
                                    <th>Kandidat</th>
                                    <th>Terpilih</th>
                                    <th>Kep</th>
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
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/tambahUser') ?>
            <div class="modal-body">
                <div class="form-group detail-content public-spacebetween">
                    <label for="username" class="label-width col-sm-3">Username</label>
                    <input type="text" class="form-control col-sm-9" id="username" name="username" required minlength=4
                        pattern="^[a-zA-Z0-9]+$">
                </div>

                <div class="form-group detail-content public-spacebetween">
                    <label for="password" class="label-width col-sm-3 ">Password</label>
                    <input type="password" class="form-control col-sm-9" id="password" name="password" required
                        minlength="4">
                </div>
                <div class="form-group detail-content public-spacebetween">
                    <label for="level" class="label-width col-sm-3 ">Level</label>
                    <select name="level" id="level" class="form-control col-sm-9" required>
                        <option value="">--Pilih Level--</option>
                        <option value="1">Admin</option>
                        <option value="2">Petugas</option>
                    </select>
                </div>
                <input type="hidden" name="status" value="Aktif">
                <div class="form-group detail-content public-spacebetween">
                    <label for="info" class="label-width col-sm-3 ">Info</label>
                    <textarea name="info" id="" cols="30" rows="10" class="form-control col-sm-9"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?=$this->endSection()?>