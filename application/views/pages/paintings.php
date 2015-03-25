<?php
//var_dump($paintings);
?>

<?php foreach ($paintings as $painting): ?>
<div class="col-md-9">
    <div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
        	<img src="<?php echo base_url('uploads')."/".$painting->image_name;?>" alt="">
            <div class="caption">
            	<h4 class="pull-right"><?php echo $painting->price?> Eur</h4>
                <h4>
                	<a href="#" tooltip="More info"><?php echo $painting->title?></a>
                </h4>
                <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
            </div>
        </div>
    </div>
    
<?php endforeach; ?>




    <div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
        	<img src="<?php echo base_url('assets/images/art/resized320/1.jpg')?>" alt="">
            <div class="caption">
            	<h4 class="pull-right">240.99 Eur</h4>
                <h4>
                	<a href="#" tooltip="More info">Horses series 1</a>
                </h4>
                <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
            </div>
        </div>
    </div>
	<div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
        	<img src="<?php echo base_url('assets/images/art/resized320/2.jpg')?>" alt="">
            <div class="caption">
            	<h4 class="pull-right">250.66 Eur</h4>
                <h4><a href="#">Horses series 2</a>
                </h4>
                 <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
            </div>
        </div>
    </div>
	<div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
	        <img src="<?php echo base_url('assets/images/art/resized320/3.jpg')?>" alt="">
	        <div class="caption">
	        	<h4 class="pull-right">310.56 Eur</h4>
	            <h4><a href="#">Horses series 3</a>
	            </h4>
	             <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
	        </div>
    	</div>
    </div>
	<div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
        	<img src="<?php echo base_url('assets/images/art/resized320/4.jpg')?>" alt="">
            <div class="caption">
	            <h4 class="pull-right">325.12 Eur</h4>
	            <h4><a href="#">Horses series 4</a>
	            </h4>
	             <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
			</div>
        </div>
    </div>
	<div class="col-sm-4 col-lg-4 col-md-4">
    	<div class="thumbnail">
	    	<img src="<?php echo base_url('assets/images/art/resized320/5.jpg')?>" alt="">
	    	<div class="caption">
	    		<h4 class="pull-right">294.99 Eur</h4>
	    		<h4><a href="#">Horses series 5</a></h4>
	    	 <p>
                Series of Luca Di Marco. Real life paintings of wild horses in Campo Imperatore
               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addToCartConfirmModal">
               <i class="fa fa-shopping-cart"></i>
                Add
                </a>
               </p>
	    	</div>
    	</div>
	</div>
</div>
