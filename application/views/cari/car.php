<div class="row">
    <?php foreach ($car as $c) { ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="<?= base_url('assets/img/car/') . $c['image_mobil'] ?>" class="card-img-top" alt="<?= $c['image_mobil'] ?>" width="287" height="168">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $c['merk'] ?></h5>
                    <p class="card-text">Merek Mobil : <?= $c['warna'] ?></p>
                    <p class="card-text">Tahun Mobil : <?= $c['thn_mobil'] ?></p>
                    <p class="card-text">Seater / Kapasitas Orang : <?= $c['jml_kursi'] ?></p>
                    <a href="<?= base_url('home/detail/') . $c['id'] ?>" class="btn btn-dark btn-block">Detail</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>