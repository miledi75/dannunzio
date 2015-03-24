<?php
?>
<div class="col-md-9">
<?php foreach ($paintings as $painting): ?>

    <div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
        	<img src="<?php echo base_url('uploads')."/".$painting->image_name;?>" alt="">
            <div class="caption">
            	<h4 class="pull-right"><?php echo $painting->price?> Eur</h4>
                <h4>
                	<a href="#" tooltip="More info"><?php echo $painting->title?></a>
                </h4>
                <p>
                <?php echo $painting->description?>
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
