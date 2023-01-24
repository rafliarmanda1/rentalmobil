<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title ?></h1>

    <a href="<?= base_url('admin/adminBaru') ?>" type="button" class="btn btn-danger mb-3"><i class="fas fa-user mr-2"></i>Tambah admin baru</a>

    <?= $this->session->flashdata('message') ?>

    <div class="row mt-3">
        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Data Admin</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($admin as $adm) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
                                    <td><img src="<?= base_url('assets/img/profile/') . $adm['image'] ?> " alt="<?= $adm['image'] ?>" width='100' height='100'></td>
                                    <td><?= $adm['name'] ?></td>
                                    <td>
                                        <?= $adm['role'] ?></td>
                                    </td>
                                    <td>
                                        <?php if ($adm['id'] == $user['id']) { ?>
                                            <a href="<?= base_url('admin/profile') ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Ubah</span>
                                            </a>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapus<?= $adm['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?= $adm['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus akun <strong><?= $adm['name'] ?></strong> ini!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('admin/delete/' . $adm['id']) ?>" class="btn btn-danger">Hapus akun</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal -->
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $count++; ?>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>