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
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Add New Menu</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                        <table class="table table-sm">
                              <thead>
                                    <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Title</th>
                                          <th>Menu</th>
                                          <th>Url</th>
                                          <th>Icon</th>
                                          <th>active</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php $i =1; ?>
                                    <?php foreach ($subMenu as $sm): ?>
                                    <tr>
                                          <td>
                                                <?= $i++; ?>
                                          </td>
                                          <td><?= $sm['title'] ?></td>
                                          <td><?= $sm['menu'] ?></td>
                                          <td><?= $sm['url'] ?></td>
                                          <td><?= $sm['icon'] ?></td>
                                          <td><?= $sm['is_active'] ?></td>
                                          <td>
                                                <a class="badge badge-warning modal-button" href="Javascript:void(0)" data-mode="Lg" data-target="ModalForm" data-url="<?= base_url('menu/editsubmenu/') .  $sm['id'] ?>"  data-toggle="tooltip" data-placement="top" title="Edit">edit</a>
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
                              <h4 class="modal-title"> Add New SubMenu</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form action="<?= base_url('menu/submenu') ?>" method="post">
                              <div class="modal-body">
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="title" placeholder="Submenu Title" name="title" autocomplete="off">
                                    </div>  

                                    <div class="form-group">
                                          <select name="menu_id" id="menu_id" class="form-control">  
                                                <option>-- Select Menu --</option>
                                                <?php foreach ($menu as $m): ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                                <?php endforeach ?>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="url" placeholder="Url" name="url" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="icon" placeholder="Icon" name="icon" autocomplete="off">
                                    </div>   
                                    <div class="form-group">
                                          <div class="form-check">
                                              <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                                              <label class="form-check-label" for="is_active">Active ?</label>
                                            </div>
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