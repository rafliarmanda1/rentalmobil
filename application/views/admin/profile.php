<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mt-1">
        <div class="col-md-4">
            <div class="card">
                <?= $this->session->flashdata('message') ?>
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="rounded-circle mx-auto d-block mb-3 mt-3" width="100px" alt="<?= $user['image']?>">
                <h5 class="card-title text-center"><?= $user['name']?> </h5>
                <p style="margin-top: -10px;" class="card-text text-center"><?= $user['email']?></p>
                <p style="margin-top: -15px;" class="card-text text-center"><small class="text-muted">Bergabung pada <?= date('d F Y', $user['created_at']) ?></small></p>
                <div style="margin-top: -10px;" class="text-center mb-2">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit mr-2"></i>Ubah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah profile <?= $user['name'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="form-group">
                        <input id="image" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>" require>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="number">No HP</label>
                        <input type="number" class="form-control" id="number" name="number" value="<?= $user['no_hp']?>" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gray-900 text-light">Ubah Profile</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->