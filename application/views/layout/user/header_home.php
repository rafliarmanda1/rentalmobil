<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dehavihan Motor Group</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>bootslander2/assets/img/dvm.png" rel="icon">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/') ?>bootslander2/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander - v4.9.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="<?= base_url('landing') ?>"><span>DehavihanMotorGroup</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto <?= $this->uri->segment(1) == 'home' ? 'active' : ''; ?>" href="<?= base_url('home') ?>">Home</a></li>
                    <li><a class="nav-link scrollto <?= $this->uri->segment(1) == 'notifikasi' ? 'active' : ''; ?>" href="<?= base_url('notifikasi') ?>">Notifikasi</a></li>
                    <li class="dropdown"><a href="#"><span><?= $user['name'] ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('profile') ?>" ?>Profile</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                        </ul>
                    </li>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Klik button logout dibawah jika anda yakin ingin keluar
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('home/logout') ?>" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Type Car</h2>
                    <p>Choice The Type Unit Mobil Rental Car DVM?!</p>
                </div>

                <div class="row" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-file-list-3-line" style="color: #5578ff;"></i>
                            <h3><a href="">Luxury Car / SUV Transmisi A.T / M.T (6 Seater Car)</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="ri-file-list-3-line" style="color: #5578ff;"></i>
                            <h3><a href="">Mobil Keluarga / MPV - Transmisi A.T (6 Seater Car)</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                            <i class="ri-file-list-3-line" style="color: #5578ff;"></i>
                            <h3><a href="">Mobil Keluarga / MPV - Transmisi M.T (6 Seater Car)</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <i class="ri-file-list-3-line" style="color: #5578ff;"></i>
                            <h3><a href="">City Car / LCGC - Transmisi A.T / M.T (4 Seater Car)</a></h3>
                        </div>
                    </div>
                </div>
        </section><!-- End Features Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Gallery</h2>
                    <p>Check our Gallery Unit Mobil Dehavihan Motor Group!</p>
                </div>
        </section><!-- End Features Section -->