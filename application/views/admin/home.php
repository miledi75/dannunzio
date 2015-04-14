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
    			<a href="<?php echo base_url('admin/manageSales')?>" class="list-group-item"><i class="fa fa-buysellads"></i> You have new sales to approve (<?= count($newSales)?>)</a>
            <?php else:?>
            	<a href="<?php echo base_url('admin/manageSales')?>" class="list-group-item"><i class="fa fa-buysellads"></i> You have no New sales to approve</a>
            <?php endif;?>
            <?php if(count($newCustomers) > 0):?>
            <a href="<?php echo base_url('admin/customers')?>" class="list-group-item"><i class="fa fa-user-plus"></i> You have new users to approve (<?= count($newCustomers)?>)</a>
            <?php else:?>
            	<a href="<?php echo base_url('admin/customers')?>" class="list-group-item"><i class="fa fa-user-plus"></i> You have no new users to approve</a>
            <?php endif;?>
            <?php if(count($newMessages) > 0):?>
            	<a href="<?php echo base_url('admin/messages')?>" class="list-group-item"><i class="fa fa-info"></i> You have new contact requests (<?= count($newMessages)?>)</a>
    		<?php else:?>
    			<a href="<?php echo base_url('admin/messages')?>" class="list-group-item"><i class="fa fa-info"></i> You have no new contact requests</a>
    		<?php endif;?>
    	</div>
	</div>
</div>