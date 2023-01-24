<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-md-4">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('profile/changepass') ?>" method="POST">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <label for="passwordOld">Password lama</label>
                    <input type="password" class="form-control" id="passwordOld" name="passwordOld">
                </div>
                <div class="form-group">
                    <label for="password">Password baru</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                </div>
                <button type="submit" class="btn btn-danger">Ubah password</button>
            </form>
        </div>
    </div>

</div>