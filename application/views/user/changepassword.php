



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

      <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <!-- Default box -->
                    <div class="card card-navy">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url('user/changepassword') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="current_password" placeholder="" name="current_password" value="" >
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="new_password1" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="new_password1" placeholder="" name="new_password1" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password2" class="col-sm-3 col-form-label">Repeat Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="new_password2" placeholder="" name="new_password2" value="" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Change Password</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->

           <?php if (validation_errors()) : ?>
          <?php $error =  json_encode(validation_errors()); ?>
          <script type="text/javascript">
          $(document).ready(function() {
                
             Toast.fire({
            icon: 'error',
            title: <?= $error  ?> 
          })
              
          })
          </script>
          <?php endif; ?>

      <?= $this->session->flashdata('message'); ?> 