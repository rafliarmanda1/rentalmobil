<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-7 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                        </div>
                        <form class="user" action="<?= base_url('auth/register') ?>" method="POST">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" class="form-control form-control-user" name="name" placeholder="Masukkan nama" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="text" id="email" class="form-control form-control-user" name="email" placeholder="example@gmail.com" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <label for="name">Password</label>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark text-light btn-user btn-block">Register</button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <p>Sudah punya akun? <a href="<?= base_url('auth') ?>">Login!</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>