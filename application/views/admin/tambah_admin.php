<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-md-4">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('admin/create') ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nama lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap . . ." value="<?= set_value('name') ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan alamat email . . ." value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password . . .">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi password . . .">
                </div>
                <button type="submit" class="btn bg-gray-900 text-light">Tambah admin</button>
            </form>
        </div>
    </div>

</div>