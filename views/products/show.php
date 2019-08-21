<?php
  $isUpdate = true;
  if(!isset($product->id))
  {
    $isUpdate = false;
  }
  if($isUpdate) $form = "./?controller=products&action=update";
  else $form = "./?controller=products&action=add";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <?= $isUpdate? "<strong>Update</strong>" : "<strong>Add</strong>";?> Product
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="<?=$form?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">ID</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="id" value="<?=$product->id?>" disabled>
              <input type="hidden" name="id" value="<?=$product->id?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$product->name?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Image</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="img" value="<?=$product->img?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Quantity</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="quantity" value="<?=$product->quantity?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Cost</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="cost" value="<?=$product->cost?>">
            </div>
          </div>
          </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Save changes</button>
        <a href="./?controller=products"><button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i> Cancel</button><a>
      </div>
    </div>
  </div>
</div>