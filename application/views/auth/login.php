<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('auth'); ?>"><b>CodeIgniter</b>Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mt-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
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
                <div class="row mt-3">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                        <a href="<?= base_url('auth/registration') ?>" class="text-center">Register a new membership</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->