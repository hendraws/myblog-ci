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
                              <h5>Role : <?=  $role['role'] ?></h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                              <table class="table table-sm">
                                    <thead>
                                          <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Menu</th>
                                                <th>Access</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php $i =1; ?>
                                          <?php foreach ($menu as $m): ?>
                                          <tr>
                                                <td>
                                                      <?= $i++; ?>
                                                </td>
                                                <td>
                                                      <?= $m['menu'] ?>
                                                </td>
                                                <td>
                                                      <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" <?= check_access($role['id'] , $m['id']) ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                      </div>
                                                </td>
                                          </tr>
                                          <?php endforeach ?>
                                    </tbody>
                              </table>
                        </div>
                        <!-- /.card-body -->
                  </div>
            </section>

          <script type="text/javascript">
                $('.form-check-input').on('click', function(){
                  const menuId = $(this).data('menu');
                  const roleId = $(this).data('role');
                  
                  $.ajax({
                        url : "<?= base_url('admin/changeaccess') ?>",
                        type : 'post',
                        data : {
                              menuId : menuId,
                              roleId : roleId,
                        },
                        success : function(){

                                    Toast.fire({
                                     icon: 'success',
                                      title: 'Access Changed!',
                                      timer: 2000,
                                      
                                    }).then((result) => {
                                      /* Read more about handling dismissals below */
                                      if (result.dismiss === Toast.DismissReason.timer) {
                                        console.log('I was closed by the timer')
                          document.location.href = "<?=  base_url('admin/roleaccess/') ?>" + roleId;
                                      }
                                    })
                        }                                
                  });
                });
          </script>