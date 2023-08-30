<?= form_open('boscu/save') ?>
<div class="modal-body">
    <div class="form-group detail-content public-spacebetween">
        <label for="nama_pegawai" class="label-width col-sm-4">Nama Pegawai</label>
        <input type="text" class="form-control col-sm-8" id="nama_pegawai" name="nama_pegawai" required minlength=4>
    </div>

    <div class="form-group detail-content public-spacebetween">
        <label for="text" class="label-width col-sm-4 ">NIP</label>
        <input type="number" class="form-control col-sm-8" id="nipp" name="nipp" required>
    </div>

    <div class="form-group detail-content public-spacebetween">
        <label for="jabatan" class="label-width col-sm-4 ">Jabatan</label>

        <select name="jabatan" id="jabatan" class="form-control col-sm-8" required>
            <option value="">--Pilih Jabatan--</option>
            <option value="Fungsional">Fungsional</option>
            <option value="Pelaksana">Pelaksana</option>
        </select>
    </div>
    <input type="hidden" class="form-control col-sm-9" id="status" name="status" value="Aktif">


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
</div>
<?= form_close() ?>

<script>
    const nama_pegawai = document.getElementById("nama_pegawai");
    const nipp = document.getElementById("nipp");
    const submit = document.getElementById("submit");



    submit.addEventListener('click', () => {
        if (nama_pegawai.validity.valueMissing) {
            nama_pegawai.setCustomValidity('Nama Pegawai tidak boleh kosong');
        } else if (nama_pegawai.validity.tooShort) {
            nama_pegawai.setCustomValidity('Minimal 4 Karakter');
        } else {
            nama_pegawai.setCustomValidity('');
        }

        if (nipp.validity.valueMissing) {
            nipp.setCustomValidity('NIP tidak boleh kosong');
        } else {
            nipp.setCustomValidity('');
        }
    })


</script>