<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#buttonTambah">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Type Mobil</span>
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="buttonTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Type Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('merk/tambahMerk') ?>" method="POST">
                        <div class="form-group">
                            <label for="merk">Type Mobil</label>
                            <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan merk mobil . . .">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah Type Mobil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="row mt-3">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Tabel Type Mobil</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Type Mobil</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($merk as $m) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
                                    <td><?= $m['merk'] ?></td>

                                    <td>
                                        <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#ubah<?= $m['id_merk'] ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah Type Mobil</span>
                                        </button>
                                        <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapus<?= $m['id_merk'] ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus Type Mobil</span>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ubah<?= $m['id_merk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Type Mobil</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('merk/update') ?>" method="POST">
                                                            <input type="hidden" name="id" value="<?= $m['id_merk'] ?>">
                                                            <div class="form-group">
                                                                <label for="merk">Type</label>
                                                                <input type="text" class="form-control" id="merk" name="merk" value="<?= $m['merk'] ?>">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            <span class="text">Ubah Type</span>
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?= $m['id_merk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus Type mobil ini! <strong><?= $m['merk'] ?></strong></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('merk/hapus/' . $m['id_merk']) ?>" class="btn btn-danger">Hapus Type Mobil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

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