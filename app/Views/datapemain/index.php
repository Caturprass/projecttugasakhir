<?= $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Data Pemain AC.MILAN</h1>
            <div class="button">
                <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
                <ul class="right">
                    <a href="/pemain/tambah" class="btn btn-primary">Tambah Pemain</a>
                </ul>
            </div>
            <table class=" table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Profil</th>
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
        </div>
    </div>
</div>
</div>


<?php $this->endSection(); ?>