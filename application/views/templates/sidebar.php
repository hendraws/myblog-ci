        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('assets/') ?>/index3.html" class="brand-link">
                <img src="<?= base_url('assets/') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">CodeIgniter Login</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">


                        <!-- QUERY MENU -->
                        <?php 
                            $role_id = $this->session->userdata('role_id');
                            $queryMenu =   "SELECT `user_menu`.`id`, `menu`
                                                                  FROM `user_menu` JOIN `user_access_menu` 
                                                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                                                 WHERE `user_access_menu`.`role_id` = $role_id 
                                                                 ORDER BY `user_access_menu`.`menu_id` ASC ";
                            $menu = $this->db->query($queryMenu)->result_array();   
                            // var_dump($menu); die; 
                         ?>

                         <?php foreach ($menu as $m ) : ?>
                         <li class="nav-header">
                            <?= strtoupper($m['menu']) ?>
                        </li>
                        
                        <?php 
                            $menuId = $m['id'];
                            $querySubMenu= "SELECT *
                                                                      FROM user_sub_menu JOIN user_menu 
                                                                        ON user_sub_menu.menu_id = user_menu.id
                                                                     WHERE user_sub_menu.menu_id = $menuId
                                                                     AND user_sub_menu.is_active = 1";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>
    
                        <?php foreach ($subMenu as $sm) : ?>
                           <li class="nav-item">
                                <a href="<?= base_url($sm['url']) ?>" class="nav-link <?= $title == $sm['title'] ? 'active' : '' ?>">
                                    <i class=" <?=  $sm['icon'] ?>"></i>
                                    <p>
                                        <?=  $sm['title'] ?>
                                    </p>
                                </a>
                            </li>
                         <?php endforeach; ?>

                         <?php endforeach; ?>



                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
