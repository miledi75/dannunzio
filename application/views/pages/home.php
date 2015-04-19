<?php //var_dump($images)?>
<?php if(isset($message)):?>

<div class="col-md-4">
    <div class="alert alert-success">

        <a href="#" class="close" data-dismiss="alert">&times;</a>
		<?=$message ?>
    </div>
</div>

<?php endif;?>
<!-- online slideshow table -->
<div class="col-md-9">
   <div class="row carousel-holder">
       <div class="col-md-12">
           
           
           
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $counter = 0;?>
                    <?php foreach ($images as $image):?>
                    <?php if($counter == 1):?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?=$counter; ?>" class="active"></li>
                    <?php else:?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?=$counter; ?>"></li>
                    <?php endif;?>
                    <?php $counter++;?>
                    <?php endforeach;?>
                     
                </ol>
                <div class="carousel-inner">
                     <?php $counter = 0;?>
                     <?php foreach ($images as $image):?>
                     <?php if($counter == 1):?>
                     <div class="item active">
                          <img class="slide-image" src="<?php echo $image->path;?>"  alt="">
                     </div>
                     <?php else:?>
                     <div class="item">
                          <img class="slide-image" src="<?php echo $image->path;?>"  alt="">
                     </div>
                     <?php endif;?>
                     <?php $counter++;?>
                     <?php endforeach;?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                     <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
          </div> 
       </div>
  </div>
</div>