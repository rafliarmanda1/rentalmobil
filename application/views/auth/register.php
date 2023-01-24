<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>login-form-08/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>login-form-08/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>login-form-08/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>login-form-08/css/style.css">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>login-form-08/assets/img/dvm.png" rel="icon">
    <link href="<?= base_url('assets/') ?>login-form-08/assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <title><?= $title ?></title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="<?= base_url('assets/') ?>login-form-08/images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Register to <strong>DVM Group!</strong></h3>
                                <strong>Dehavihan Motor Group</strong> is Provider Of Quality Transportation Services in
                                Sukabumi.
                            </div>
                            <form class="user" action="<?= base_url('auth/register') ?>" method="POST">
                                <div class="form-group first">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group first">
                                    <label for="email">Alamat Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" name="password2" class="form-control" id="password2">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <button type="submit" class="btn text-white btn-block btn-primary">Register</button>


                                <span class="d-block text-left my-4 text-muted"> Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login</a></span>


                                <span class="d-block text-left my-4 text-muted"> or sign in with</span>

                                <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/') ?>login-form-08/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/') ?>login-form-08/js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>login-form-08/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>login-form-08/js/main.js"></script>
</body>

</html>