<!-- start of side panel -->
<div class="container">
<div class="row">
	<div class="lead col-md-3"><?php echo $pageTitle;?></div>
</div>
     <div class="row">
		 <div class="col-md-3">
		     <div class="list-group">
		     	<a href="#" class="list-group-item" data-toggle="modal" data-target="#createShowroomModal"><?= $cat1 ;?></a>
		     </div>
	     </div>
	     <div class="col-md-4">
		     <div class="alert alert-success alert-dismissible" role="alert" id="showroomMessage" style="display:none">
		     	<button type="button" id="closeShowroomMessageButton" class="close"  aria-label="Close"><span aria-hidden="false">&times;</span></button>
  			</div>
	     </div>
	 </div>

	 
 
<!-- end of the side panel -->

<!-- Begin Showroom table -->
<div class="row">

<div class="col-md-12">          
      <table id="showroomTable" class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>Showroom</th>
            <th>Nr of art objects</th>
            <th>State</th>
            <th></th>
          <tr>
        </thead>
        <tbody>
          <?php //var_dump($showrooms)?>

          <?php foreach($showrooms as $showroom):?>
          <tr id="row<?=$showroom['showroom_id']?>">
            <td id="showroom_name"><?php echo $showroom['showroom_name'];?></td>
            <td id="nr_of_items"><?php echo $showroom['showroom_nr_of_items']?></td>
            <td id="state"><?php echo $showroom['state']?></td>
            <td id="menu">
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteShowroomModal<?=$showroom['showroom_id']?>">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editShowroomModal<?=$showroom['showroom_id']?>">Edit</a></li>
		          <?php if ($showroom['state'] == 'Not published'):?>
		          	<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#publishShowroomModal<?=$showroom['showroom_id']?>">Publish</a></li>
				  <?php else:?>
				 	<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#unpublishShowroomModal<?=$showroom['showroom_id']?>">Unpublish</a></li>
				  <?php endif;?>
				  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewArtObjectsModal<?=$showroom['showroom_id']?>">View Art objects</a></li>
		      </ul>
		      </div>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      </div>
 

   </div>     
<!-- end art object table -->
</div>
<!-- end of container -->

<!-- Modal forms -->
<div id="showroomModals">
<!-- createShowroomModal-->
<div class="modal fade" data-backdrop="static" id="createShowroomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Add new showroom</h4>
			  </div>
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputName">Showroom Name:</label>
					<input type="text" class="form-control input-sm"  autofocus name="showroom_name" id="inputShowroomName" placeholder="Showroom...">
				 </div>
				 
				 <div class="form-group">
					<label for="inputState">State:</label>
					<select class="form-control input-sm"  name="state" id="selectState" >
					<option value=1>Active</option>
					<option value=0>Inactive</option>
					</select>
				 </div>
				 
				 <div class="form-group">
				 	<div class="alert alert-danger alert-dismissible" role="alert" id="showroomMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;dfsdf</span></button>
				  
				  </div>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="submit" class="btn btn-success" onclick="processNewShowroom()">Create Showroom</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>
<!-- /createShowroomModal-->

<!-- deleteShowroomModal -->
<?php foreach($showrooms as $showroom):?>
<div class="modal fade" data-backdrop="static" id="deleteShowroomModal<?=$showroom['showroom_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Would you like to delete this showroom?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="processDeleteShowroom(<?=$showroom['showroom_id']?>)">Yes</button>
			  	 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- /deleteShowroomModal -->

<!-- publishShowroomModal -->
<?php foreach($showrooms as $showroom):?>
<div class="modal fade" data-backdrop="static" id="publishShowroomModal<?=$showroom['showroom_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Would you like to make this showroom accessible online?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-success" data-dismiss="modal" onclick="processPublishShowroom(<?=$showroom['showroom_id']?>)">Yes</button>
			  	 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- /publishShowroomModal -->

<!-- publishShowroomModal -->
<?php foreach($showrooms as $showroom):?>
<div class="modal fade" data-backdrop="static" id="unpublishShowroomModal<?=$showroom['showroom_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Would you like to unpublish this showroom?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-success" data-dismiss="modal" onclick="processUnpublishShowroom(<?=$showroom['showroom_id']?>)">Yes</button>
			  	 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- /publishShowroomModal -->


</div>

<!-- /Modal forms -->
