



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">

                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <div class="col align-self-center">
                                    <div class="col-12 text-center">
                                        <img src="<?= base_url('assets/img/profile/') .  $user['image']; ?>" class="card-img" alt="..." style="width: 150px; height:150px; margin:0;" >
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h2><?= $user['name']; ?></h2>
                                    <h5><?= $user['email']; ?></h5>
                                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']) ?></small></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
