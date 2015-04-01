<?php

?>
<div class="col-md-9">

<?php 
foreach ($artObjects as $artObject)
{
	$artist = "Luca DiMarco";
	$title =  $artObject->title; 
	$price =  $artObject->price;
?>
	
	<div class="col-sm-4 col-lg-4 col-md-4">
	    	<div class="thumbnail">
	        	<img src="<?php echo base_url('uploads')."/".$artObject->image_name;?>" alt="">
	            <div class="caption">
	            	<h4 class="pull-right"><?php echo $artObject->price?> Eur</h4>
	                <h4>
	                	<a href="#" tooltip="More info"><?php echo $artObject->title?></a>
	                </h4>
	                <p>
	                <?php echo $artObject->description?>
	               <a class="btn btn-info btn-sm" onclick="addItemToShoppingcart('<?=$title?>','<?=$artist?>','<?=$price?>')">
	               <i class="fa fa-shopping-cart"></i>
	                Add
	                </a>
	               </p>
	            </div>
	        </div>
	    </div>
<?php 
}
?>
</div>
