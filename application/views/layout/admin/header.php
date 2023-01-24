<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - DVM Group - <?= $title ?></title>
    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>bootslander2/assets/img/dvm.png" rel="icon">
    <link href="<?= base_url('assets/') ?>bootslander2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin DVM Group</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'admin' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DATA MOBIL
            </div>

            <!-- Nav Item - Data Type Mobil -->
            <li class="nav-item <?= $this->uri->segment(1) == 'merk' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('merk') ?>">
                    <i class="fas fa-fw fa-car-battery"></i>
                    <span>Data Type Mobil</span></a>
            </li>

            <!-- Nav Item - Data Mobil -->
            <li class="nav-item <?= $this->uri->segment(1) == 'car' && $this->uri->segment(2) == '' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('car') ?>">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Data Unit Mobil</span></a>
            </li>

            <!-- Nav Item - Aktif / Non Aktif Mobil -->
            <li class="nav-item <?= $this->uri->segment(2) == 'active' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('car/active') ?>">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Aktif / Non Aktif Mobil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DAFTAR PESANAN
            </div>

            <!-- Nav Item - Data Merk -->
            <li class="nav-item <?= $this->uri->segment(1) == 'pesanan' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('pesanan') ?>">
                    <i class="fas fa-fw fa-car-battery"></i>
                    <span>Data Pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Akun
            </div>

            <!-- Nav Item - Admin -->
            <li class="nav-item <?= $this->uri->segment(2) == 'kelola' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('admin/kelola') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Profile
            </div>

            <!-- Nav Item - My Profile -->
            <li class="nav-item <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'profile' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('admin/profile') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - Ubah Password -->
            <li class="nav-item <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'change' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('admin/change') ?>">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/profile/<?= $user['image'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->