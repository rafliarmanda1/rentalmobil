<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Tambah Data Mobil</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('car/addCar') ?>" method="POST">
                        <div class="form-group">
                            <label for="merk">Type Mobil</label>
                            <select class="form-control" id="merk" name="merk">
                                <option value="#">-Type Mobil-</option>
                                <?php foreach ($merk as $m) { ?> ?>
                                    <option value="<?= $m['id_merk'] ?>"><?= $m['merk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warna">Merek Mobil</label>
                            <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan merek mobil . . ." value="<?= set_value('warna') ?>">
                            <?= form_error('warna', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="thn_mobil">Tahun Mobil</label>
                            <input type="number" class="form-control" id="thn_mobil" name="thn_mobil" placeholder="Masukkan tahun mobil . . ." value="<?= set_value('thn_mobil') ?>">
                            <?= form_error('thn_mobil', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="plat_nomer">Nomer TNKB</label>
                            <input type="text" class="form-control" id="plat_nomer" name="plat_nomer" placeholder="Masukkan nomer TNKB mobil . . ." value="<?= set_value('plat_nomer') ?>">
                            <?= form_error('plat_nomer', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="tnkb">Jenis TNKB</label>
                            <select class="form-control" id="tnkb" name="tnkb">
                                <option value="#">-Jenis Ganjil / Genap TNKB-</option>
                                <?php foreach ($tnkb as $t) { ?> ?>
                                    <option value="<?= $t['id_tnkb'] ?>"><?= $t['tnkb'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <select class="form-control" id="transmisi" name="transmisi">
                                <option value="#">-Transmisi-</option>
                                <?php foreach ($transmisi as $t) { ?> ?>
                                    <option value="<?= $t['id_transmisi'] ?>"><?= $t['transmisi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi">Seater</label>
                            <select class="form-control" id="merk" name="jml_kursi">
                                <option value="#">-Jumlah Kursi-</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Rp . . ." value="<?= set_value('harga') ?>">
                            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Tambah Data Mobil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>