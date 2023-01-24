<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mt-3">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message_aktif') ?>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar Mobil</th>
                                <th scope="col">Type Mobil</th>
                                <th scope="col">Plat Nomer</th>
                                <th scope="col">Status Mobil</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($car as $c) { ?>
                            <tbody>
                                <tr>
                                    <td><?= $count; ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#image<?= $c['id'] ?>">
                                            <img src="<?= base_url('assets/img/car/') . $c['image_mobil'] ?> " alt="<?= $c['image_mobil'] ?>" width='150' height='100'>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="image<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <button class="btn btn-danger mb-3" data-dismiss="modal">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </button>
                                                <img src="<?= base_url('assets/img/car/') . $c['image_mobil'] ?>" alt="<?= $c['image_mobil'] ?>" width='500'>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                    <td><?= $c['merk'] ?></td>
                                    <td><?= $c['plat_nomer'] ?></td>
                                    <td><?= $c['status'] ?></td>
                                    <td>
                                        <?php if ($c['is_active'] == 0) { ?>
                                            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#aktif<?= $c['id'] ?>">
                                                <span class="text">Aktifkan</span>
                                            </button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#nonaktif<?= $c['id'] ?>">
                                                <span class="text">Nonaktifkan</span>
                                            </button>
                                        <?php } ?>

                                        <!-- Modal Aktif -->
                                        <div class="modal fade" id="aktif<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Aktif</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin mengaktifkan mobil <strong><?= $c['merk'] ?></strong> dengan plat nomer <strong><?= $c['plat_nomer'] ?></strong> ini!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('car/aktif/') . $c['id'] ?>" class="btn btn-success">Aktifkan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal aktif -->

                                        <!-- Modal nonaktif -->
                                        <div class="modal fade" id="nonaktif<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Nonaktif</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menonaktifkan mobil <strong><?= $c['merk'] ?></strong> dengan plat nomer <strong><?= $c['plat_nomer'] ?></strong> ini!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('car/nonaktif/') . $c['id'] ?>" class="btn btn-danger">Nonaktifkan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
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