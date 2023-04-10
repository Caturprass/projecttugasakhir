<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Pemain</h1>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Pemain</h3>
                                    <form action="/pemain/save" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Pemain</label>
                                            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationaly">Nationaly</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nationaly')) ? 'is-invalid' : ''; ?>" id="nationaly" name="nationaly" autofocus value="<?= old('nationaly'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nationaly'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>" id="position" name="position" autofocus value="<?= old('position'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('position'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="foot">Foot</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('foot')) ? 'is-invalid' : ''; ?>" id="foot" name="foot" autofocus value="<?= old('foot'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foot'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="height">Height</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('height')) ? 'is-invalid' : ''; ?>" id="height" name="height" autofocus value="<?= old('height'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('height'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Number</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('number')) ? 'is-invalid' : ''; ?>" id="number" name="number" autofocus value="<?= old('number'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('number'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('age')) ? 'is-invalid' : ''; ?>" id="age" name="age" autofocus value="<?= old('age'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('age'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sampul">File input</label>
                                            <div class="input-group">
                                                <div class="col-sm-2">
                                                    <img src="/img/default1.jpg" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('sampul'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="Sampul">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                    <?= $this->endSection(); ?>