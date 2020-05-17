<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                    <?= $title ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title ?>
                        </li>
                    </ol>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <!-- Default box -->
                    <div class="card card-navy">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url('user/edit') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $user['email'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="<?= $user['name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Picture</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']  ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Edit</button>
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

            <script type="text/javascript">
                $('.custom-file-input').on('change', function(){
                    let filename = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass('selected').html(filename);
                });
            </script>
            <?php if (form_error('name')) : ?>
      <script type="text/javascript">
      $(document).ready(function() {
         Toast.fire({
        icon: 'error',
        title: ' <?= form_error('name') ?>'
      })
          
      })
      </script>
      <?php endif; ?>

      <?= $this->session->flashdata('message'); ?>