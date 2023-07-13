<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mt-3">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Konfirmasi Sewa Mobil</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Penyewa</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">KTP</th>
                                <th scope="col">Keterangan Mobil</th>
                                <th scope="col">Tanggal Reservasi</th>
                                <th scope="col">Sewa</th>
                                <th scope="col">Harga Sewa</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($sewa as $s) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
                                    <td><?= $s['name'] ?></td>
                                    <td><?= $s['no_hp'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#image<?= $s['id_sewa'] ?>">
                                            <img src="<?= base_url('assets/img/ktp/') . $s['ktp'] ?> " alt="<?= $s['ktp'] ?>" width='150' height='100'>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="image<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <button class="btn btn-danger mb-3" data-dismiss="modal">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </button>
                                                <img src="<?= base_url('assets/img/ktp/') . $s['ktp'] ?>" alt="<?= $s['ktp'] ?>" width='500'>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                    <td>
                                        <a href="" class="text-dark" data-toggle="modal" data-target="#mobil<?= $s['id_sewa'] ?>">
                                            <u><?= $s['merk'] ?></u>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="mobil<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Informasi Mobil <?= $s['merk'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url('assets/img/car/') . $s['image_mobil'] ?>" alt="<?= $s['image_mobil'] ?>" width='460'>
                                                        <h3 class="text-center text-dark mt-2"><?= $s['merk'] ?></h3>
                                                        <hr class="border border-secondary">

                                                        <p class="text-dark">
                                                            <strong>Keterangan :</strong>
                                                        </p>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul>
                                                                    <li>Merek Mobil : <?= $s['warna'] ?></li>
                                                                    <li>Kapasitas Orang : <?= $s['jml_kursi'] ?></li>
                                                                    <li>Tahun Mobil : <?= $s['thn_mobil'] ?></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul>
                                                                    <li>TNKB : <?= $s['tnkb'] ?></li>
                                                                    <li>Transmisi : <?= $s['transmisi'] ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <p class="text-dark">
                                                            <strong>Harga :</strong>
                                                        </p>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul>
                                                                    <!-- masih manual -->
                                                                    <li><strong>Rp.</strong> <?= $s['harga'] ?> / 1 Hari</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                    <td><?php
                                        // $date = new DateTime();

                                        // $dateTime = $s['sewa_created_at'];
                                        // $date->setTimestamp($dateTime);
                                        // $dateString = $date->format('Y-m-d');

                                        // echo $dateString;
                                        echo date('Y-m-d', strtotime("+" . 1 . "days", $s['sewa_created_at']))

                                        ?></td>
                                    <td><?= $s['hari'] ?> Hari</td>
                                    <td>Rp. <?= $s['harga'] * $s['hari'] ?></td>
                                    <td>
                                        <?php if (empty($s['accepted_at']) && empty($s['rejected_at'])) { ?>
                                            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#terima<?= $s['id_sewa'] ?>">
                                                <span class="text">Terima</span>
                                            </button>

                                            <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#tolak<?= $s['id_sewa'] ?>">
                                                <span class="text">Tolak</span>
                                            </button>
                                        <?php } ?>

                                        <?php if (!empty($s['accepted_at']) && empty($s['pay_at'])) { ?>
                                            Menunggu pembayaran pelanggan
                                        <?php } ?>

                                        <?php if (!empty($s['rejected_at']) && empty($s['pay_at'])) { ?>
                                            Pelanggan ini ditolak
                                        <?php } ?>

                                        <?php if (!empty($s['pay_at']) && empty($s['pay_confirm_at'])) { ?>
                                            Menunggu Konfirmasi
                                        <?php } ?>

                                        <?php if (!empty($s['pay_confirm_at'])) { ?>
                                            Berhasil disewakan
                                        <?php } ?>

                                        <!-- Modal Terima -->
                                        <div class="modal fade" id="terima<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Konfirmasi Terima Sewa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Dengan mengklik <strong>tombol terima</strong> dibawah maka anda setuju menyewakan mobil kepada <strong><?= $s['name'] ?></strong></p>
                                                        <form action="<?= base_url('pesanan/terima/') . $s['id_sewa'] ?>" method="POST">
                                                            <input type="hidden" name="admin" value="<?= $user['id'] ?>">
                                                            <input type="hidden" name="mobil" value="<?= $s['mobil_id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Terima</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->

                                        <!-- Modal tolak -->
                                        <div class="modal fade" id="tolak<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Konfirmasi Tolak Sewa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('pesanan/tolak/') . $s['id_sewa'] ?>" method="POST">
                                                            <input type="hidden" name="admin" value="<?= $user['id'] ?>">
                                                            <p class="font-weight-bold">Keterangan penolakan :</p>
                                                            <textarea class="md-textarea form-control" name="keterangan" id="keterangan" rows="7" placeholder="Berikan keterangan penolakan yang jelas kepada <?= $s['name'] ?>" require><?= $s['keterangan'] ?></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>

                                <?php if (!empty($s['pay_at']) && empty($s['pay_confirm_at'])) { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            Lihat bukti pembayaran <?= $s['name'] ?>
                                            <u><a href="#" data-toggle="modal" data-target="#bukti<?= $s['id_sewa'] ?>">Lihat</a></u>
                                            <!-- Modal -->
                                            <div class="modal fade" id="bukti<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <button class="btn btn-danger mb-3" data-dismiss="modal">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-times"></i>
                                                        </span>
                                                    </button>
                                                    <img src="<?= base_url('assets/img/bukti/') . $s['bukti'] ?>" alt="<?= $s['bukti'] ?>" width='500'>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="text-center">Mohon Untuk Cek Mutasi Rekening Bank BCA a.n DVM Group & <strong>Konfirmasi</strong> Jika Pelanggan Tersebut Sudah Melakukan Proses Pembayaran</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="text-center"><button class="btn btn-success" data-toggle="modal" data-target="#confirm<?= $s['id_sewa'] ?>">Konfirmasi</a></td>

                                        <!-- Modal Bukti Bayar -->
                                        <div class="modal fade" id="confirm<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran <?= $s['name'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Mohon Untuk Cek Mutasi Rekening Bank <strong><?= $bank['bank'] ?></strong> a.n DVM Group Dengan Nomer Rekening <strong><?= $bank['norek'] ?></strong>. Jika Merasa Sudah Berhasil Proses Pembayaran. Mohon Konfirmasi Pembayaran Pelanggan</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('pesanan/payConfirm/' . $s['id_sewa']) ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php $count++; ?>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>