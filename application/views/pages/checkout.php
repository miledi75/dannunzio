<?php
?>
<div class="modal fade" data-backdrop="static" id="shoppingCartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<!-- kruisje bovenaan -->
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<!-- /kruisje bovenaan -->
<h4 class="modal-title" id="titleModalLabel">Your shopping cart</h4>
</div>
<form id="shoppingCartForm" method="POST" action="<?=base_url('processSales/checkoutSales');?>">
			<div class="modal-body">
					<table id="shoppingCartTable" class="table table-hover table-responsive">
							<thead>
							<tr>
							<th>Product</th>
							<th class="text-left">Price</th>
							<th> </th>
							</tr>
							<?php if($this->cart->total_items()>0):?>
                    		<?php foreach ($this->cart->contents() as $item):?>
                    		<tr id="item<?=$item['id']?>">
			 					<td class="col-md-6">
	         						<div class="media">
	         							<div class="media-body">
	         								<h4 class="media-heading">
	         									<a href="#">
	         										<div id="title<?=$item['id']?>">
	         										<?=$item['name']?>
	         										</div>
	         									</a>
	         								</h4>
	         								<h5 class="media-heading">
	         								by <a href="#"><div id="artist<?=$item['id']?>"><?=$item['artist']?></div>
	         								</a>
	         								</h5>
	         							</div>
	         						</div>
	         					</td>
	         					<td class="col-md-1 text-left">
	         						<strong>&euro; <div id="price<?=$item['id']?>"><?=$item['price']?></div></strong>
	         					</td>
	         					<td class="col-md-1">
	         					<button onclick="deleteRowFromShoppingCart(<?=$item['id']?>)" type="button" class="btn btn-sm btn-danger">
	         					<span class="fa fa-remove"></span> Remove</button>
	         					</td>
         					</tr>
                    		<?php endforeach;?>
                    		<?php endif;?>
                		</thead>
                		<tbody>
              
                    	<tr id="shoppingCartTotal" style="display:none">
	                        <td class="col-md-1 text-right"><h4>Total:</h3></td>
	                        <td class="col-md-1 text-left"><h4><strong>&euro; <div id="totalShoppingCart">0</div></strong></h3></td>
	                        <td></td>
	                    </tr>
					</tbody>
            	</table>
        	</div>
		
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-info">
	    		<span class="fa fa-shopping-cart"></span> Continue Shopping
	        </button>
	    <button type="su0bmit" class="btn btn-success">
	    	Checkout <span class="fa fa-play"></span></button>
	    </a>
		</div>
		</form>
	</div>
</div>
</div>