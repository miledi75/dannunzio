<?php if($this->session->userdata('logged_in') == 0):?>
<script>
window.onload = function()
{
	$('#loginModal').modal('show');
};

</script>
<?php else:?>
	<!-- Check if the user has just registered succesfully and display success message -->
	<?php if($message != '0'):?>
		<div class="col-md-4">
    		<div class="alert alert-success">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
				<?=$message ?>
    		</div>
		</div>
	<?php endif;?>
	<div class="col-md-6">
	<form id="checkoutCartForm" method="POST" action="<?=base_url('processSales/saleFinished');?>">
		<table id="checkoutShoppingCartTable" class="table table-hover table-responsive">
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
           		<tr id="shoppingCartTotal">
	            	<td class="col-md-1 text-right"><h4>Total:<strong><?=$this->cart->total();?> &euro;</strong></h3></td>
	                <td></td>
	            </tr>
		   </tbody>
      </table>
		
		<div class="modal-footer">
			<button type="button"  class="btn btn-info" onclick="redirect('<?= base_url('pages/home') ?>')">
	    		<span class="fa fa-shopping-cart"></span> Cancel this sale
	        </button>
	    <button type="submit" class="btn btn-success">
	    	Finish sale <span class="fa fa-play"></span></button>
	    </a>
		</div>
		</form>
</div>

<?php endif;?>

