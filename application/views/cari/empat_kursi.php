<div class="row">
    <?php foreach($car as $c) { ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="<?= base_url('assets/img/car/') . $c['image'] ?>" class="card-img-top" alt="<?= $c['image'] ?>" width="287" height="168">
            <div class="card-body">
                <h5 class="card-title"><?= $c['merk'] ?></h5>
                <p class="card-text">Warna : <?= $c['warna'] ?></p>
                <p class="card-text">Tahun : <?= $c['thn_mobil'] ?></p>
                <a href="<?= base_url('home/detail/') . $c['id'] ?>" class="btn btn-primary btn-block">Detail</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>