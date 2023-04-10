<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data LB</h1>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Kriteria Leftback</h3>
                                    <form action="/leftback/save" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="kode">Kode Kriteria</label>
                                            <input type="text"
                                                class="form-control <?= $validation->hasError('kode') ? 'is-invalid' : ''; ?>"
                                                id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kode'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Kriteria</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis Kriteria</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>"
                                                id="jenis" name="jenis" autofocus value="<?= old('jenis'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai">Nilai</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('nilai')) ? 'is-invalid' : ''; ?>"
                                                id="nilai" name="nilai" autofocus value="<?= old('nilai'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nilai'); ?>
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