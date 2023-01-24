<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-8">
        <?= $this->session->flashdata('message') ?>
        <div class="card">
            <?php foreach ($car as $c) { ?>

            <img src="<?= base_url('assets/img/car/') . $c['image_mobil'] ?>" alt="<?= $c['image_mobil'] ?>" class="border border-secondary">

            <div class="card-body">
                <h1 class="text-center"><?= $c['merk']?></h1>
                <hr class="border border-secondary">

                <p>
                    <strong>Keterangan :</strong>
                </p>

                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li>Warna : <?= $c['warna']?></li>
                            <li>Jumlah Kursi : <?= $c['jml_kursi']?></li>
                            <li>Tahun : <?= $c['thn_mobil']?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>Nomor TNKB : <?= $c['tnkb']?></li>
                            <li>Transmisi : <?= $c['transmisi']?></li>
                        </ul>
                    </div>
                </div>

                <p>
                    <strong>Harga :</strong>
                </p>

                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <!-- masih manual -->
                            <li><strong>IDR</strong> <?= $c['harga']?> / 1 Hari</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <?php if (empty($user['alamat']) && empty($user['ktp']) ) { ?>
                <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#lengkapi">Sewa</button>
            <?php } else {?>
                <?php if ($c['is_active'] == 1) { ?>
                <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#sewa<?= $c['id']?>">Sewa</button>
                <?php } else { ?>
                <a href="<?= base_url('notifikasi')?>" class="btn btn-dark btn-block">Kembali</a>
                <?php } ?>
            <?php } ?>

            <!-- Modal Lengkapi -->
            <div class="modal fade" id="lengkapi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Lengkapi Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Profile anda belum lengkap. Mohon untuk melengkapi profile terlebih dahulu</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal lengkapi -->

            <!-- Modal sewa -->
            <div class="modal fade" id="sewa<?= $c['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sewa Mobil <?= $c['merk']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('sewa/createSewa/' . $c['id'])?>" method="POST">
                                <input type="hidden" name="user" value="<?= $user['id']?>">
                                <input type="hidden" name="mobil" value="<?= $c['id']?>">
                                <div class="form-group">
                                    <label for="harga">Harga / 1 hari</label>
                                    <input type="number" class="form-control" id="harga" value="<?= $c['harga'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="hari" name="hari" placeholder="Masukkan jumlah hari">
                                </div>
                                <button type="submit" class="btn btn-dark btn-block">Sewa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal sewa -->
            <?php } ?>
        </div>
    </div>
</div>