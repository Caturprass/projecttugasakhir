<?= $this->extend('layout/template_admin'); ?>


<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contact</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>

                    </ol>

                </div>
            </div>

            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        PROGRAMER
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>Catur Edi Prasetyo</b></h2>
                                                <?php foreach ($alamat as $a) : ?>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-building"></i></span>
                                                    <li><?= $a['tipe']; ?></li>
                                                    </li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-building"></i></span>
                                                    <li><?= $a['alamat']; ?></li>
                                                    </li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-phone"></i></span>
                                                    <li><?= $a['no']; ?></li>
                                                    </li>
                                                </ul>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="/assets/dist/img/user1-128x128.jpg" alt="user-avatar"
                                                    class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-sm bg-teal">
                                                <i class="fas fa-comments"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>

                <!-- /.card -->

            </section>
            <?= $this->endSection(); ?>