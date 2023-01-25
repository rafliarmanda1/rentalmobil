<div class="row justify-content-center mt-5">
    <div class="col-md">
        <h3 class="mb-3 text-center">Notifikasi</h3>

        <?= $this->session->flashdata('message') ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Penyewa</th>
                    <th scope="col">Detail Mobil</th>
                    <th scope="col">Harga Sewa 1 Hari</th>
                    <th scope="col">Jumlah Hari</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <?php
            $count = 1;
            foreach ($sewa as $s) { ?>
                <?php if ($s['user_id'] == $user['id']) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $count; ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><a href="<?= base_url('home/detail/') . $s['mobil_id'] ?>"><?= $s['merk'] ?></a></td>
                            <td><?= $s['harga'] ?></td>
                            <td><?= $s['hari'] ?></td>
                            <td><?= $s['harga'] * $s['hari'] ?></td>

                            <?php if ($s['accepted_at'] == 0 && $s['rejected_at'] == 0) { ?>
                                <td>Menunggu Konfirmasi Admin</td>

                                <!-- Terima -->
                            <?php } elseif (!empty($s['accepted_at']) && empty($s['pay_at'])) { ?>
                                <td>Admin Telah Mengkonfirmasi<span class="text-success"> Reservasi</span> Anda</td>
                            <?php } ?>

                            <!-- Tolak -->
                            <?php if (!empty($s['rejected_at']) && empty($s['pay_at'])) { ?>
                                <td class="text-danger">Reservasi Ditolak</td>
                            <?php } ?>

                            <!-- User sudah bayar -->
                            <?php if (!empty($s['pay_at']) && empty($s['pay_confirm_at'])) { ?>
                                <td>Menunggu Pembayaran Di Konfirmasi Admin</td>
                            <?php } ?>

                            <!-- User sudah bayar -->
                            <?php if (!empty($s['pay_confirm_at'])) { ?>
                                <td>Berhasil Reservasi</td>
                            <?php } ?>

                        </tr>

                        <!-- Terima -->
                        <?php if (!empty($s['accepted_at']) && empty($s['pay_at'])) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Mohon segera melakukan pembayaran ke bank <strong class="font-weight-bold"><?= $bank['bank'] ?></strong> dengan nomor rekening <strong class="font-weight-bold"><?= $bank['norek']  ?></strong> a.n DVM Group dan mengirim bukti pembayaran sebesar Rp. <?= $s['harga'] * $s['hari'] ?></td>
                            </tr>

                            <tr>
                                <td colspan="7" class="text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#bukti<?= $s['id_sewa'] ?>">Kirim Bukti Pembayaran</button>

                                    <!-- Modal Bukti Bayar -->
                                    <div class="modal fade" id="bukti<?= $s['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('sewa/bayar/' . $s['id_sewa']) ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                                        <input id="bukti" type="file" name="bukti">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </td>
                            </tr>
                        <?php } ?>

                        <!-- Tolak -->
                        <?php if (!empty($s['rejected_at']) && empty($s['pay_at'])) { ?>
                            <tr>
                                <td colspan="7" class="text-center"><strong class="font-weight-bold">Alasan penolakan</strong> "<?= $s['keterangan'] ?>"</td>
                            </tr>
                        <?php } ?>

                        <?php if (!empty($s['pay_confirm_at'])) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Mohon untuk membawa <strong>Kartu Identitas Asli</strong> sebagai jaminan penyewaan mobil</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-center">Unduh <strong>Kwitansi</strong> dibawah ini. Untuk Konfirmasi Pengambilan Unit Mobil Kepada Admin Saat Berada Dilokasi Penyewaan</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <a href="<?= base_url('notifikasi/print/') . $s['id_sewa'] ?>" class="btn btn-primary">Unduh Kwitansi</a>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                    <?php $count++; ?>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>