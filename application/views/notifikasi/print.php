<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
$count = 1;
foreach($sewa as $s) { ?>
<?php if ($s['user_id'] == $user['id']) {?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <div class="sidebar-brand-icon">
                                <i class="fas fa-car mr-1"></i>DMGroup
                            </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #<?= $s['id_sewa'] ?></p>
                        </div>
                    </div>

                    <hr class="my-1">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-2">Detail Pelanggan</p>
                            <p class="mb-1"><?= $s['name'] ?></p>
                            <p class="mb-1"><?= $s['alamat'] ?></p>
                            <p class="mb-1"><?= $s['no_hp'] ?></p>
                            <p class="font-weight-bold mb-2 mt-3">Detail Mobil</p>
                            <p class="mb-1">Mobil : <?= $s['merk'] ?>, <?= $s['warna'] ?>, <?= $s['jml_kursi'] ?> Kursi, <?= $s['transmisi'] ?></p>
                            <p class="mb-1">Nomor TNKB : <?= $s['tnkb'] ?></p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-2">Rincian Tanggal</p>
                            <p class="mb-1"><span class="text-muted">Tanggal Sewa: <?= date('d F Y', $s['updated_at']) ?>
                            <p class="mb-1"><span class="text-muted">Selama <?= $s['hari']?> hari
                            <p class="mb-1"><span class="text-muted">Sampai: <?= date('d F Y', strtotime("+" . $s['hari'] . "days", $s['updated_at'])) ?>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2 text-center">Total</div>
                            <div class="h2 font-weight-light">Rp. <?= $s['harga'] * $s['hari'] ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Hari</div>
                            <div class="h2 font-weight-light"><?= $s['hari']?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2 text-center">Harga / 1 Hari</div>
                            <div class="h2 font-weight-light">Rp. <?= $s['harga']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">Dehavihan Motor Group</a></div>

</div>

<script>
    window.print();
</script>
<?php } ?>
<?php } ?>