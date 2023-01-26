<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <a href="<?= base_url('car/tambah') ?>" class="btn btn-success btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Mobil</span>
    </a>

    <div class="row mt-3">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Tabel Data Mobil</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar Mobil</th>
                                <th scope="col">Type Mobil</th>
                                <th scope="col">Merek Mobil</th>
                                <th scope="col">Tahun Mobil</th>
                                <th scope="col">Nomer TNKB</th>
                                <th scope="col">Jenis TNKB</th>
                                <th scope="col">Transmisi</th>
                                <th scope="col">Seater</th>
                                <th scope="col">Harga</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($car as $c) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
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
                                    <td><?= $c['warna'] ?></td>
                                    <td><?= $c['thn_mobil'] ?></td>
                                    <td><?= $c['plat_nomer'] ?></td>
                                    <td><?= $c['tnkb'] ?></td>
                                    <td><?= $c['transmisi'] ?></td>
                                    <td><?= $c['jml_kursi'] ?></td>
                                    <td><strong>Rp</strong> <?= $c['harga'] ?></td>
                                    <td>
                                        <a href="<?= base_url('car/ubah/') . $c['id'] ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ( $c['id'] != 39 && $c['id'] != 40 && $c['id'] != 17) { ?>
                                        <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapus<?= $c['id'] ?>">
                                        <?php } else { ?>
                                        <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapus-gagal<?= $c['id'] ?>">
                                        <?php } ?>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">hapus</span>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus-gagal<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tidak dapat dihapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Type mobil <strong><?= $c['merk'] ?></strong> ini tidak dapat dihapus !!!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus data mobil <strong><?= $c['merk'] ?></strong> dengan plat nomer tersebut <strong><?= $c['plat_nomer'] ?></strong> !!!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('car/hapus/' . $c['id']) ?>" class="btn btn-danger">Hapus data mobil</a>
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