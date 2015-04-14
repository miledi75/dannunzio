<?php

?>
<div class="container">
  <div class="row">
     <div class="lead col-md-12"><?php echo $pageTitle;?></div>
		<div class="col-md-12">
		<p>Welcome tot the online shop administration page. 
		Use the navigation links in the top bar to perform administrative tasks.</p>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<p><h4>Notifications</h4></p>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
    		<?php if(count($newSales) > 0):?>
    		<a href="<?php echo base_url('admin/manageSales')?>" class="list-group-item"><i class="fa fa-buysellads"></i> New sales to approve (<?= count($newSales)?>)</a>
            <?php endif;?>
            <a href="<?php echo base_url('admin/customers')?>" class="list-group-item"><i class="fa fa-user-plus"></i> New users to approve</a>
            <a href="<?php echo base_url('admin/messages')?>" class="list-group-item"><i class="fa fa-info"></i> New contact requests</a>
    	</div>
	</div>
</div>