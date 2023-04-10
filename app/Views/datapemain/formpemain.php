<?= $this->extend('layout/template_admin'); ?>


<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pemain</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/pemain/tambah" class="btn btn-primary">Tambah Pemain</a>
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
                    <h3 class="card-title">Table Pemain II Diavolo Rosso</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">NO</th>
                                <th>Image</th>
                                <th>Nama Pemain</th>
                                <th>Profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pemain as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $p['sampul']; ?>" alt="" class="pemain"></td>
                                <td><?= $p['nama']; ?></td>
                                <td>
                                    <a href="/pemain/<?= $p['slug']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <?= $this->endSection(); ?>