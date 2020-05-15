        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('assets/') ?>/index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="mx-3">
                            <b><?= strtoupper($user['name']) ?></b>
                        </span>
                        <img src="<?= base_url('assets/img/profile/') .  $user['image']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 25px; height:25px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-fw fa-user mr-2"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href=" <?= base_url('auth/logout')  ?> " class="dropdown-item">
                            <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->