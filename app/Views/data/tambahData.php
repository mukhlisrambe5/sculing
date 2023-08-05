<?= $this->extend('main/layout') ?>

<?= $this->section('content') ?>
<section class="content mt-3 ">
    <div class="container-fluid" style="width: 700px;">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- <form class="form-horizontal"> -->
                    <?= form_open_multipart('data/simpanData') ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="elemenVar" class="col-sm-3 col-form-label">elemenVar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="elemenVar" name="elemenVar" placeholder="elemenVar" value="<?=old('elemenVar')?>">
                                <p class="text text-danger ml-1">
                                <?= isset($errors['elemenVar']) == isset($errors['elemenVar']) ? validation_show_error('elemenVar') : '' ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="elemenNum" class="col-sm-3 col-form-label">elemenNum</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control"  name="elemenNum" id="elemenNum" placeholder="elemenNum" value="<?=old('elemenNum')?>">
                                <p class="text text-danger ml-1">
                                <?= isset($errors['elemenNum']) == isset($errors['elemenNum']) ? validation_show_error('elemenNum') : '' ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="elementSelect" class="col-sm-3 col-form-label">elementSelect</label>
                            <div class="col-sm-9">
                                <select name="elementSelect" id="select" class="form-control" >
                                    <option value="">--Pilih Select--</option>
                                    <option value="1" <?=old('elementSelect') =='1' ?'selected' : ''?>>1</option>
                                    <option value="2" <?=old('elementSelect') =='2' ?'selected' : ''?>>2</option>
                                </select>
                                <p class="text text-danger ml-1">
                                <?= isset($errors['elementSelect']) == isset($errors['elementSelect']) ? validation_show_error('elementSelect') : '' ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="elementRadio" class="col-sm-3 col-form-label">elementRadio</label>
                            <div class="col-sm-9">
                                <div class="row ml-2">
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="elementRadio"
                                            id="elementRadio" value="1" <?=old('elementRadio') =='1' ?'checked' : ''?>>
                                        <label class="form-check-label" for="1">
                                            1
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="elementRadio"
                                            id="elementRadio" value="2"  <?=old('elementRadio') =='2' ?'checked' : ''?>>
                                        <label class="form-check-label" for="2">
                                            2
                                        </label>
                                    </div>
                                </div>
                                <p class="text text-danger ml-1">
                                <?= isset($errors['elementRadio']) == isset($errors['elementRadio']) ? validation_show_error('elementRadio') : '' ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="elementCheck" class="col-sm-3 col-form-label">elementCheck</label>
                            <div class="col-sm-9">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="elementCheck1"
                                            name="elementCheck[]" value="1" <?=in_array( 1, (array) old('elementCheck')) ?'checked' : ''?> >     
                                                
                                                
                                            <label class="form-check-label">1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="elementCheck2"
                                                name="elementCheck[]" value="2" <?=in_array( 2, (array) old('elementCheck')) ?'checked' : ''?>>
                                            <label class="form-check-label">2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="elementCheck3"
                                                name="elementCheck[]" value="3" <?=in_array( 3, (array) old('elementCheck')) ?'checked' : ''?>>
                                            <label class="form-check-label">3</label>
                                        </div>

                                    </div>
                                </div>
                                <p class="text text-danger ml-1">
                                    <?= isset($errors['elementCheck']) == isset($errors['elementCheck']) ? validation_show_error('elementCheck') : '' ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="elementTextArea" class="col-sm-3 col-form-label">elementTextArea</label>
                            <div class="col-sm-9">
                                <textarea name="elementTextArea" id="elementTextArea" cols="62" rows="3"
                                    width="100%"><?=old('elementTextArea')?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="elementDate" class="col-sm-3 col-form-label">elementDate</label>
                            <div class="col-sm-9">
                                <input type="date" name="elementDate" value="<?=old('elementDate')?>">
                                <p><?=old('elementDate')?></p>
                                <p class="text text-danger ml-1">
                                <?= isset($errors['elementDate']) == isset($errors['elementDate']) ? validation_show_error('elementDate') : '' ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="elementImg" class="col-sm-3 col-form-label">elementImg</label>
                            <div class="col-sm-9">
                                <input type="file" name="elementImg" required >
                                <p class="text text-danger ml-1">
                                    <?= isset($errors['elementImg']) == isset($errors['elementImg']) ? validation_show_error('elementImg') : '' ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="elementFile" class="col-sm-3 col-form-label">elementFile</label>
                            <div class="col-sm-9">
                                <input type="file" name="elementFile" required>
                                <p class="text text-danger ml-1">
                                    <?= isset($errors['elementFile']) == isset($errors['elementFile']) ? validation_show_error('elementFile') : '' ?>
                                </p>
                            </div>
                            
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>

        </div>

    </div>

</section>
<?= $this->endSection() ?>