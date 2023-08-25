<!-- ... (previous code) ... -->

<?php
foreach ($first as $key => $value) { ?>
<div class="modal fade" id="edit/<?= $value['id_pegawai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- ... (other modal content) ... -->
            </div>
            <?= form_open_multipart('rolling/rekamRolling')?>
            <div class="modal-body">
                <!-- ... (other form elements) ... -->
                <div class="form-group detail-content public-spacebetween">
                    <label for="file_<?= $value['id_pegawai'] ?>" class="col-sm-4 col-form-label">Kep</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" id="file_<?= $value['id_pegawai'] ?>"
                               accept="application/pdf" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- ... (other modal footer content) ... -->
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
// Use the unique file input ID within your JavaScript validation
const fileInput_<?= $value['id_pegawai'] ?> = document.getElementById("file_<?= $value['id_pegawai'] ?>");
fileInput_<?= $value['id_pegawai'] ?>.addEventListener('change', handleFileChange_<?= $value['id_pegawai'] ?>);

function handleFileChange_<?= $value['id_pegawai'] ?>(event) {
    const selectedFile = event.target.files[0];
    if (!selectedFile) return;

    if (selectedFile.type !== 'application/pdf') {
        fileInput_<?= $value['id_pegawai'] ?>.setCustomValidity('Silahkan upload file PDF.');
    } else {
        fileInput_<?= $value['id_pegawai'] ?>.setCustomValidity('');
    }
}

// ... (rest of your JavaScript code for this modal)
</script>

<?php } ?>
<!-- ... (rest of your HTML code) ... -->
