<?= $this->extend('layout/template_admin'); ?>


<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Alternatif</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/alternatif/create" class="btn btn-primary">Tambah Alternatif</a>
                    </ol>

                </div>
            </div>
            <div class="card">
                <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
                <div class="card-header">
                    <h3 class="card-title">Table Alternatif SAW</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">NO</th>
                                <th>Kode</th>
                                <th>Nama Pemain/Alternatif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($alternatifsaw as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['kode']; ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td>
                                    <a href="/alternatif/<?= $p['id']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <?= $this->endSection(); ?>