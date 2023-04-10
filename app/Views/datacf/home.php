<?= $this->extend('layout/template_admin'); ?>


<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kriteria CF</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/striker/create" class="btn btn-primary">Tambah Kriteria CF</a>
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
                    <h3 class="card-title">Table Kriteria CF</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">NO</th>
                                <th>Kode</th>
                                <th>Nama Kriteria</th>
                                <th>Jenis</th>
                                <th>Nilai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data_cf as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['kode']; ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['jenis']; ?></td>
                                <td><?= $p['nilai']; ?></td>
                                <td>
                                    <form action="/striker/edit<?= $p['id']; ?>">
                                        <button class="nav-icon fas fa-edit"></button>
                                    </form>

                                    <form action="/striker/<?= $p['id']; ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="nav-icon fas fa-trash"
                                            onclick="return confirm('Apakah Coach yakin?');"></button>
                                    </form>
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