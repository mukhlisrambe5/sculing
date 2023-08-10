<?= $this->extend('main/layout') ?>

<?= $this->section('content') ?>
<div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>

            </tr>

        </thead>
        <tbody>
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed
                    when the user activates the relevant trigger.
                </div>
            </div>


        </tbody>
    </table>
</div>


<?= $this->endSection() ?>