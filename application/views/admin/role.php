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
            <div class="card">
                  <div class="card-header">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Add New Role</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                        <table class="table table-sm">
                              <thead>
                                    <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Menu</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php $i =1; ?>
                                    <?php foreach ($role as $r): ?>
                                    <tr>
                                          <td>
                                                <?= $i++; ?>
                                          </td>
                                          <td>
                                                <?= $r['role'] ?>
                                          </td>
                                          <td>
                                                <a href="<?= base_url('admin/roleaccess/') . $r['id'] ?>" class="badge badge-warning ">access</a>
                                                <a href="" class="badge badge-success ">edit</a>
                                                <a href="" class="badge badge-danger">delete</a>
                                          </td>
                                    </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>
                  </div>
                  <!-- /.card-body -->
            </div>
      </section>
      <!-- /.content -->
      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h4 class="modal-title"> Add New Role</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form action="<?= base_url('admin/role') ?>" method="post">
                              <div class="modal-body">
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="role" placeholder="Role Name" name="role" autocomplete="off">
                                    </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                        </form>
                  </div>
                  <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      <?php if (form_error('menu')) : ?>
      <script type="text/javascript">
      $(document).ready(function() {
         Toast.fire({
        icon: 'error',
        title: ' <?= form_error('menu') ?>'
      })
          
      })
      </script>
      <?php endif; ?>

      <?= $this->session->flashdata('message'); ?>