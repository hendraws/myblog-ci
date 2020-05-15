<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>CodeIgniter</b>Login</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="<?= base_url('auth/registration') ?>" method="post">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Full name" name="name" value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', '<small class="text-danger">', '</small>') ?>

                <div class="input-group mt-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="password1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row text-center mt-3">
                    <!-- /.col -->
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">

                <a href="<?= base_url('auth') ?>" class="text-center">I already have a membership</a>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->