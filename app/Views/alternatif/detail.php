<?= $this->extend('layout/template_admin'); ?>


<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data alternatif</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/pemain/tambah" class="btn btn-primary">Tambah Pemain</a>
                    </ol>

                </div>
            </div>
            <div class="card mb-3">
                <div class=" row">
                    <div class="col">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Kode : </b> <?= $alternatifsaw['kode']; ?></li>
                                <li class="list-group-item"><b>Nama Alternatif : </b><?= $alternatifsaw['nama']; ?></li>
                                <div class="card-body">
                                    <a href="/alternatif" class="btn btn-primary">Back</a>
                                    <a href="/alternatif/edit<?= $alternatifsaw['id']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/alternatif/<?= $alternatifsaw['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Coach yakin?');">Delete</button>
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