<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-bg-secondary">Ubah Data Mobil</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($car as $c) { ?>
                        <?= form_open_multipart('car/ubahMobil/' . $c['id']) ?>
                        <div class="form-group">
                            <label for="merk">Type Mobil</label>
                            <select class="form-control" id="merk" name="merk">
                                <?php foreach ($merk as $m) { ?> ?>
                                    <option value="<?= $m['id_merk'] ?>" <?php if ($m['merk'] == $c['merk']) {
                                                                                echo "selected";
                                                                            } ?>>
                                        <?php if ($m['merk'] == $c['merk']) {
                                            echo $c['merk'];
                                        } else {
                                            echo $m['merk'];
                                        } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warna">Merek Mobil</label>
                            <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan warna mobil . . ." value="<?= $c['warna'] ?>">
                            <?= form_error('warna', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="thn_mobil">Tahun Mobil</label>
                            <input type="number" class="form-control" id="thn_mobil" name="thn_mobil" placeholder="Masukkan tahun mobil . . ." value="<?= $c['thn_mobil'] ?>">
                            <?= form_error('thn_mobil', '<small class="text-danger">', '</small>') ?>

                        </div>
                        <div class="form-group">
                            <label for="plat_nomer">Nomer TNKB</label>
                            <input type="text" class="form-control" id="plat_nomer" name="plat_nomer" placeholder="Masukkan plat mobil . . ." value="<?= $c['plat_nomer'] ?>">
                            <?= form_error('plat_nomer', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="tnkb">Jenis TNKB</label>
                            <select class="form-control" id="tnkb" name="tnkb">
                                <?php foreach ($tnkb as $t) { ?> ?>
                                    <option value="<?= $t['id_tnkb'] ?>" <?php if ($t['tnkb'] == $c['tnkb']) {
                                                                                echo "selected";
                                                                            } ?>>
                                        <?php if ($t['tnkb'] == $c['tnkb']) {
                                            echo $c['tnkb'];
                                        } else {
                                            echo $t['tnkb'];
                                        } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <select class="form-control" id="merk" name="transmisi">
                                <?php foreach ($transmisi as $t) { ?> ?>
                                    <option value="<?= $t['id_transmisi'] ?>" <?php if ($t['transmisi'] == $c['transmisi']) {
                                                                                    echo "selected";
                                                                                } ?>>
                                        <?php if ($t['transmisi'] == $c['transmisi']) {
                                            echo $c['transmisi'];
                                        } else {
                                            echo $t['transmisi'];
                                        } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jml_kursi">Seater</label>
                            <select class="form-control" id="merk" name="jml_kursi">
                                <option value="4">
                                    4
                                </option>
                                <option value="6" <?php if ($c['jml_kursi'] == 6) {
                                                        echo "selected";
                                                    } ?>>
                                    6
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="IDR . . ." value="<?= $c['harga'] ?>">
                            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="image">Foto Mobil</label>
                        </div>
                        <div style="margin-top: -15px;">
                            <input id="image" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Ubah Data Mobil</button>
                        <?= form_close(); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>