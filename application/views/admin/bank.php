<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message') ?>

    <?php if ($total_bank == 0) { ?>
    <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#buttonTambah">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Rekening Bank</span>
    </button>
    <?php } ?>

    <!-- Modal Tambah -->
    <div class="modal fade" id="buttonTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('bank/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="bank">Jenis Bank</label>
                        <input type="text" class="form-control" id="bank" name="bank" placeholder="ex : BCA, BRi, BNI, BSI . . .">
                    </div>
                    <div class="form-group">
                        <label for="norek">No Rekening</label>
                        <input type="number" class="form-control" id="norek" name="norek" placeholder="XXXX XXXX XX">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah Rekening</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <?php if ($total_bank == 0) { ?>
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        Mohon untuk <strong>Mengisi Rekening Bank</strong> agar pelanggan dapat menyewa mobil
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <?php if (!empty($total_bank)) { ?>
    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Tabel Rekening Bank</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Bank</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php 
                        $count = 1;
                        foreach($bank as $b){ ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $count; ?></th>
                                <td><?= $b['bank'] ?></td>
                                <td><?= $b['norek'] ?></td>
                                <td>
                                    <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapus<?= $b['id']?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus Rekening</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?= $b['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus bank <strong><?= $b['bank'] ?></strong> dengan nomor rekening <strong><?= $b['norek'] ?></strong> ini!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('bank/hapus/' . $b['id']) ?>" class="btn btn-danger">Hapus Rekening</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>