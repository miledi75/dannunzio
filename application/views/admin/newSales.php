<?php
var_dump($newSales);
?>
<!-- start of side panel -->    
<div class="container">
    <div class="row">
	   	<div class="lead col-md-3"><?php echo $pageTitle;?></div>
	</div>
<!-- end of the side panel -->
<!-- notifications -->
<?php if(isset($messageSuccess)):?>
  <div class="col-md-4">
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?= $messageSuccess?>
  </div>
  </div>
<?php endif;?>

<?php if(isset($messageFailed)):?>
  <div class="col-md-4">
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?= $messageFailed?>
  </div>
  </div>
<?php endif;?>
<!-- /notifications -->
	<div class="col-md-12">          
   <div class="row"></div>
   <?php if(count($newSales) > 0):?>
   <table class="table table-hover">
   		<thead>
          <tr>
            <th>Art object</th>
            <th>Buyer</th>
            <th>Email</th>
            <th>Approve</th>
          <tr>
        </thead>
        
        <tbody>
        <?php foreach ($newSales as $sale):?>
        <tr>
	        <td><?php echo $sale->title;?></td>
	        <td><?php echo "$sale->name $sale->surname";?></td>
	        <td><a href="mailto:<?=$sale->email?>" class="btn btn-info btn-sm">Send email</a></td>
	        <td><button class="btn btn-info btn-sm" onclick="approveSale(<?php echo $sale->sales_id;?>)">Approve Sale</button></td>
        </tr>
        <?php endforeach;?>
        </tbody>
   </table>
  <?php else:?>
   No new sales at the moment.
   <?php endif;?>     
        </div>
    </div> 
 
<!-- salesApproveConfirmationModal-->
<div class="modal fade" data-backdrop="static" id="approveSaleConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Info</h4>
			  </div>
			  <div class="modal-body">
			  	<p>
			  	Approve this sale?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button id="approveButton" type="button" class="btn btn-info" data-dismiss="modal">Yes</button>
			  	 <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			  </div>
		</div>
	</div>
</div>
<!-- salesApproveConfirmationModal-->

