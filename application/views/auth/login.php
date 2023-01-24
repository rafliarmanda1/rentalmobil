<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-7 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Administrator</h1>
                        </div>

                        <?= $this->session->flashdata('message') ?>

                        <form class="user" action="<?= base_url('auth') ?>" method="POST">
                            <div class="form-group">
                                <label for="email">Alaamat Email</label>
                                <input type="text" id="email" class="form-control form-control-user" name="email" placeholder="example@gmail.com" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" id="password" class="form-control form-control-user" name="password" placeholder="********">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>