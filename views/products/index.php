<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Products <a href="./?controller=products&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
					<th class="text-center" style="width:5%">ID</th>
					<th style="width:15%">Name</th>
					<th class="text-center" style="width:20%">Image</th>
					<th class="text-center" style="width:15%">Category</th>
					<th class="text-center" style="width:10%">Supplier</th>
					<th class="text-center" style="width:5%">Quantity</th>
					<th class="text-center" style="width:5%">Cost</th>
					<th class="text-center" style="width:25%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($products as $product) { ?>
				<tr>
					<td class="text-center align-middle">
						<div> <?=$product->id;?> <div>
					</td>
					<td class="align-middle">
						<div> <?=$product->name?> <div>
					</td>
					<td>
					<img src="<?=$product->img?>" class="img-fluid" alt="Responsive image">
					</td>
					<td class="text-center align-middle">
						<div>
							<?php
								foreach ($categories as $category)
									if($product->categoryID == $category->id)
									{
										echo $category->name;
										break;
									}
							?>
						<div>
					</td>
					<td class="text-center align-middle">
						<div>
							<?php
								foreach ($suppliers as $supplier)
									if($product->supplierID == $supplier->id)
									{
										echo $supplier->name;
										break;
									}
							?>
						<div>
					</td>
					<td class="text-center align-middle">
						<div> <?=$product->quantity?> <div>
					</td>
					<td class="text-center align-middle">
						<div> <?=$product->cost?> <div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=products&action=show&id=<?=$product->id?>"><button class="btn btn-primary" type="button">
						<i class="fa fa-pencil-square-o\"></i>&nbsp;Update
						</button></a>
						<a href="./?controller=products&action=delete&id=<?=$product->id?>"><button class="btn btn-danger" type="button">
						<i class="fa fa-trash-o"></i>&nbsp;Delete
						</button></a>
					</td>
				</tr>
				<?php } ?>
			  </tbody>
    	</table>
  	  </div>
	</div>
  </div>
</div>