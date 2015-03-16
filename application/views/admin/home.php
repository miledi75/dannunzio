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
    	<div class="list-group">
    		<table></table>
    		<tr>
    		<td></td>
    		<td></td>
    		</tr>
    		<a href="<?php echo base_url('admin/manageSales')?>" class="list-group-item"><i class="fa fa-buysellads"></i> <?= $newSales ;?></a>
            <a href="<?php echo base_url('admin/customers')?>" class="list-group-item"><i class="fa fa-user-plus"></i> <?= $newUsers ;?></a>
            <a href="<?php echo base_url('admin/messages')?>" class="list-group-item"><i class="fa fa-info"></i> <?= $newContactRequests ;?></a>
    	</div>
	</div>
</div>