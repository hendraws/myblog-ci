<div class="modal-header">
      <h4 class="modal-title"> <?= $title ?></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
</div>
<form action="<?= base_url('menu/editmenu/') . $menu['id'] ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
                  <input type="name" class="form-control" id="menu" placeholder="Menu Name" name="menu" autocomplete="off" value="<?= $menu['menu'] ?>">
            </div>
      </div>
      <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
