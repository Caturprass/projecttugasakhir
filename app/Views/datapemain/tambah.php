<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah data Pemain</h2>
            <form action="/pemain/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pemain</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            name="nama" autofocus value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nationaly" class="col-sm-2 col-form-label">Nationaly</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nationaly')) ? 'is-invalid' : ''; ?>"
                            id="nationaly" name="nationaly" value="<?= old('nationaly'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nationaly'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="position" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>"
                            id="position" name="position" value="<?= old('position'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('position'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foot" class="col-sm-2 col-form-label">Foot</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('foot')) ? 'is-invalid' : ''; ?>" id="foot"
                            name="foot" value="<?= old('foot'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foot'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="height" class="col-sm-2 col-form-label">Height</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>"
                            id="height" name="height" value="<?= old('height'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('height'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="number" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>"
                            id="number" name="number" value="<?= old('number'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('number'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>"
                            id="age" name="age" value="<?= old('age'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('age'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default1.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file"
                                class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                                id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data</button>

</div>

</div>

</div>
<?= $this->endSection(); ?>