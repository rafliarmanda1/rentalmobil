<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">Profile <?= $user['name'] ?></div>

            <div class="card-body">
                <?= $this->session->flashdata('message') ?>
                <?= form_open_multipart('profile/update') ?>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8 mb-3">
                        <a href="#" data-toggle="modal" data-target="#image<?= $user['id'] ?>">
                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="rounded-circle" width="150px" height="140" alt="<?= $user['image'] ?>">
                        </a>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Foto Profile</label>
                    <div class="col-md-6">
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus placeholder="Masukkan nama" value="<?= $user['name'] ?>" require>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="email" autocomplete="email" autofocus placeholder="Masukkan email" value="<?= $user['email'] ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-md-4 col-form-label text-md-right">No HP</label>
                    <div class="col-md-6">
                        <input id="number" type="number" class="form-control" name="number" autocomplete="number" placeholder="0891 2345 6789" value="<?= $user['no_hp'] ?>" require>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                    <div class="col-md-6 success-border">
                        <textarea class="md-textarea form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap" require><?= $user['alamat'] ?></textarea>
                    </div>
                </div>

                <?php if (empty($user['ktp'])) { ?>
                    <div class="form-group row">
                        <label for="ktp" class="col-md-4 col-form-label text-md-right">Upload KTP</label>
                        <div class="col-md-6">
                            <input id="ktp" type="file" name="ktp"><br>
                            <small class="text-danger">Anda belum mengupload ktp</small>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!empty($user['ktp'])) { ?>
                    <div class="form-group row">
                        <label for="ktp" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <a href="" class="badge badge-success p-2" data-toggle="modal" data-target="#ktp<?= $user['id'] ?>">Lihat KTP</a>
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-dark"><i class="fas fa-fw fa-edit mr-2"></i>Ubah</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-lock mr-2"></i>Change Password</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ktp<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <button class="btn btn-danger mb-3" data-dismiss="modal">
                            <span class="icon text-white-100">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                        <img src="<?= base_url('assets/img/ktp/') . $user['ktp'] ?>" alt="<?= $user['ktp'] ?>" width='500'>
                    </div>
                </div>
                <!-- End Modal -->
                <?= form_close(); ?>

                <!-- Modal -->
                <div class="modal fade" id="image<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <button class="btn btn-danger mb-3" data-dismiss="modal">
                            <span class="icon text-white-100">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="<?= $user['image'] ?>" width='500'>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('profile/changepass') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <div class="form-group">
                                        <label for="passwordOld">Password lama</label>
                                        <input type="password" class="form-control" id="passwordOld" name="passwordOld" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password baru</label>
                                        <input type="password" class="form-control" id="password" name="password" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi password</label>
                                        <input type="password" class="form-control" id="password2" name="password2" require>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Ubah password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Modal -->
            </div>
        </div>
    </div>
</div>