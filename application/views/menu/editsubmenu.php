  <div class="modal-header">
                              <h4 class="modal-title"> <?= $title ?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form action="<?= base_url('menu/editsubmenu/').  $submenu['id'] ?>  " method="post">
                              <div class="modal-body">
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="title" placeholder="Submenu Title" name="title" autocomplete="off" value="<?= $submenu['title'] ?>">
                                    </div>  

                                    <div class="form-group">
                                          <select name="menu_id" id="menu_id" class="form-control">  
                                                <option>-- Select Menu --</option>
                                                <?php foreach ($menu as $m): ?>
                                                <option value="<?= $m['id'] ?>" <?=  ($m['id'] == $submenu['menu_id']) ? 'selected' : '' ?>  ><?= $m['menu'] ?></option>
                                                <?php endforeach ?>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="url" placeholder="Url" name="url" autocomplete="off" value="<?= $submenu['url'] ?>">
                                    </div>
                                    <div class="form-group">
                                          <input type="text" class="form-control" id="icon" placeholder="Icon" name="icon" autocomplete="off" value="<?= $submenu['icon'] ?>">
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