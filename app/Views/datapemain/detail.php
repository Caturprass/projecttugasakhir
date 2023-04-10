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
            <div class="card mb-3" style="max-width: 1100px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $pemain['sampul']; ?>" style="height: 200px" class="card-img-top">
                        <img src="/img/<?= $pemain['sampul']; ?>" style="height: 200px" class="card-img-top mt-4">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Nama Pemain : </b><?= $pemain['nama']; ?></li>
                                <li class="list-group-item"><b>Nationaly : </b><?= $pemain['nationaly']; ?></li>
                                <li class="list-group-item"><b>Position : </b><?= $pemain['position']; ?></li>
                                <li class="list-group-item"><b>Foot : </b><?= $pemain['foot']; ?></li>
                                <li class="list-group-item"><b>Height : </b><?= $pemain['height']; ?></li>
                                <li class="list-group-item"><b>Number : </b><?= $pemain['number']; ?></li>
                                <li class="list-group-item"><b>Age : </b><?= $pemain['age']; ?></li>
                                <div class="card-body">
                                    <a href="/pemain" class="btn btn-primary">Back</a>
                                    <a href="/pemain/edit<?= $pemain['slug']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/pemain/<?= $pemain['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Coach yakin?');">Delete</button>
                                    </form>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
<?= $this->endSection(); ?>