<?php
//var_dump($artObjects);
?>
<div class="col-md-9">

<?php 
foreach ($artObjects as $artObject)
{
	$artist 		= 	$artObject->name."".$artObject->surname;
	$title 			=  	$artObject->title; 
	$price 			=  	$artObject->price;
	$art_object_id 	=  	$artObject->art_object_id;
	$sold			=  	$artObject->sold;
	$locked			=	$artObject->locked_for_sale;
?>
	<div class="col-sm-4 col-lg-4 col-md-4">
	    	<div class="thumbnail">
	        	<img src="<?php echo base_url('uploads')."/".$artObject->image_name;?>" alt="">
	            <div class="caption">
	            	<h4 class="pull-right"><?php echo $artObject->price?> Eur</h4>
	            	by <a href="#"><?php echo $artist?></a>
	               <h4>
	                	<a href="#" tooltip="More info"><?php echo $artObject->title?></a>
	               </h4>
	               <p>
	               <?php echo $artObject->description?>
	               <!-- CHECKING THE LOCKED STATUS -->
	               <?php if($locked):?>
	               <a class="btn btn-success btn-sm">
	               
	               <i class="fa fa-shopping-cart"></i>
	                Locked for sale
	               </a>
	               <!-- CHECKING THE SOLD STATUS -->
	               <?php elseif($sold):?>
	               <a class="btn btn-danger btn-sm">
	               
	               <i class="fa fa-shopping-cart"></i>
	                Item Sold
	               </a>
	               <?php else:?>
	               <a class="btn btn-info btn-sm" onclick="addItemToShoppingcart('<?=$title?>','<?=$artist?>','<?=$price?>','<?=$art_object_id?>')">
	               <i class="fa fa-shopping-cart"></i>
	                Add
	               </a>
	               <?php endif;?>
	               
	               </p>
	            </div>
	        </div>
	    </div>
<?php 
}
?>
</div>
