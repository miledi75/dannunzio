<!-- start of side panel -->    
<div class="container">
        <div class="row">
        	<div class="lead col-md-3">Manage art</div>
            <!-- Search box -->
		    <div class="col-md-3 pull-right">
		    <form class="navbar-form" role="search">
		    <div class="input-group">
		    <input type="text" class="form-control" placeholder="find in collection..." name="q_art">
		    <div class="input-group-btn">
		    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		    </div>
		    </div>
		    </form>
		    </div> 
        </div>
        <div class="row">
			<div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item" data-toggle="modal" data-target="#addNewArtObjectModal"><?= $cat1 ;?></a>
                </div>
            </div>
        </div>
 
<!-- end of the side panel -->


        
<!-- Begin art objects table -->
 
<div class="row">
	<!-- NOTIFICATIONS -->
	<?php if ($artObjectCreated): ?>
		<div class="col-md-4">  
			<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object added succesfully!
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($artObjectCreatedFailed): ?>
		<div class="col-md-4">  
			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object creation failed!
			</div>
		</div>
		
	<?php endif; ?>
	
	<?php if ($artObjectDeleted): ?>
		<div class="col-md-4">  
			<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object archived succesfully!
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($artObjectDeletedFailed): ?>
		<div class="col-md-4">  
			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object archivation failed!
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($artObjectEdited): ?>
		<div class="col-md-4">  
			<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object updated!
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($artObjectEditedFailed): ?>
		<div class="col-md-4">  
			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object update failed!
			</div>
		</div>
	<?php endif; ?>
	
<!-- /NOTIFICATIONS -->
<div class="col-md-12">          
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Art object title</th>
            <th>Artist</th>
            <th>Type</th>
            <th>Period</th>
            <th>Date</th>
            <th>Price in Euros</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($art_objects as $art_object): ?>
          <tr>
            <td><?= $art_object->title ?></td>
            <td><?= $art_object->name." ".$art_object->surname ?></td>
            <td><?= $art_object->artefact_type?></td>
            <td><?= $art_object->art_period ?></td>
            <td><?= $art_object->date ?></td>
            <td><?= $art_object->price ?></td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteArtObjectModal<?= $art_object->art_object_id?>">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editNewArtObjectModal<?= $art_object->art_object_id?>">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewImageModal<?= $art_object->art_object_id?>">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <p><?=$links?></p>
    </div>
 	

   </div>     
<!-- end art object table -->
</div>
<!-- end of container -->

<!-- modal forms -->

<!-- addNewArtObjectModal -->

<div class="modal fade" data-backdrop="static" id="addNewArtObjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form class="form-inline-table" method="POST" action="<?=base_url('processArtObject/newArtObject')?>" enctype="multipart/form-data">
			<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Add new art object</h4>
			  </div>
			  
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputTitle">Artwork title</label>
					<input type="text" name="title" class="form-control input-sm" id="inputTitle" placeholder="Sunflowers...">
				 </div>
				 
				 <div class="form-group">
					<label for="selArtist">Artist name</label>
					<select name="artist" class="form-control input-sm" id="selArtist">
				        <?php foreach ($artists as $artist): ?>
				        <option value="<?=$artist->user_id?>"><?=$artist->name?> <?=$artist->surname?></option>
				        <?php endforeach; ?>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtifactType">Artifact type</label>
					<select name="artifact" class="form-control input-sm" id="selArtifactType">
				        <?php foreach ($artifacts as $artifact): ?>
				        <option value="<?=$artifact->artefact_type_id?>"><?=$artifact->artefact_type?></option>
				        <?php endforeach; ?>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtPeriod">Period</label>
					<select name="period" class="form-control input-sm" id="selArtPeriod">
				       <?php foreach ($periods as $period): ?>
				        <option value="<?=$period->art_period_id?>"><?=$period->art_period?></option>
				        <?php endforeach; ?>
				    </select>
				 </div>
				 
				 <div class="form-group">
				      <label for="input-month">Date	</label>
				      <input name="date" id="input-month" class="form-control input-sm" type="month" value="2015-03">
				 </div>
				 <div class="form-group">
				      <label for="inputPrice">Price</label>
				      <input type="text" name="price" id="inputPrice" class="form-control input-sm">
				 </div>
				 
				 <div class="form-group">
				      <label for="inputDescription">Short description</label>
				      <input type="text" name="description" id="inputDescription" class="form-control input-sm">
				 </div>
				 
				 <div class="form-group">
					 <label for="imgArtObject">Art image</label>
					 <span class="btn btn-info btn-file btn-sm">
	    			 Browse <input id="imgArtObject" class="form-control" type="file" name="image">
					 </span>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="submit" class="btn btn-success">Add to collection</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>

<!-- /addNewArtObjectModal -->

<!-- editArtObjectModal -->
<?php foreach ($art_objects as $art_object): ?>
<div class="modal fade" data-backdrop="static" id="editNewArtObjectModal<?=$art_object->art_object_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<form class="form-inline-table" method="POST" action="<?=base_url('processArtObject/EditArtObject')?>" enctype="multipart/form-data">
		<input type="hidden" name="art_object_id" value="<?=$art_object->art_object_id?>" id="hiddenArtObjectId">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Edit art object</h4>
			  </div>
			  
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputTitle">Artwork title</label>
					<input type="text" name="title" class="form-control input-sm" id="inputTitle" value="<?=$art_object->title?>">
				 </div>
				 
				 <div class="form-group">
					<label for="selArtist">Artist name</label>
					<select name="artist" class="form-control input-sm" id="selArtist" autocomplete="off">
				        <?php foreach ($artists as $artist)
				        {
				        	if($artist->name == $art_object->name)
				        	{
				        		?>
				               	<option selected value="<?=$artist->user_id?>"><?=$artist->name?> <?=$artist->surname?></option>
				        		<?php
				        	}
				        	else
				        	{
				        		?>
				        		<option value="<?=$artist->user_id?>"><?=$artist->name?> <?=$artist->surname?></option>
				        		<?php
				        	}
				        } ?>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtifactType">Artifact type</label>
					<select name="artifact" class="form-control input-sm" id="selArtifactType" autocomplete="off">
				        <?php foreach ($artifacts as $artifact)
				        {
				        	
				        	if($artifact->artefact_type == $art_object->artefact_type)
				        	{
				        		?>
				               	<option value="<?=$artifact->artefact_type_id?>" selected><?=$artifact->artefact_type?></option>
				        		<?php
				        	}
				        	else
				        	{
				        		?>
				        		<option value="<?=$artifact->artefact_type_id?>"><?=$artifact->artefact_type?></option>
				        		<?php
				        	}
				        }?>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtPeriod">Period</label>
					<select name="period" class="form-control input-sm" id="selArtPeriod" autocomplete="off">
				       <?php foreach ($periods as $period)
				       {
				        	if($period->art_period == $art_object->art_period)
				        	{
						       	?>
						        <option selected value="<?=$period->art_period_id?>"><?=$period->art_period?></option>
					        	<?php
				        	}
				        	else
				        	{

				        		?>
				      			<option value="<?=$period->art_period_id?>"><?=$period->art_period?></option>
				        		<?php
				        	}
				       }?>
				    </select>
				 </div>
				 
				 <div class="form-group">
				      <label for="input-month">Date	</label>
				      <input name="date" id="input-month" class="form-control input-sm" type="month" value="<?= $art_object->date?>">
				 </div>
				 <div class="form-group">
				      <label for="inputPrice">Price</label>
				      <input type="text" name="price" id="inputPrice" class="form-control input-sm" value="<?= $art_object->price?>">
				 </div>
				 
				 <div class="form-group">
				      <label for="inputDescription">Short description</label>
				      <input type="text" name="description" id="inputDescription" class="form-control input-sm" value="<?=$art_object->description?>">
				 </div>
				 
				 <div class="form-group">
					 <label for="imgArtObject">Art image</label>
					 <span class="btn btn-info btn-file btn-sm">
	    			 Browse <input id="imgArtObject" class="form-control" type="file" name="image">
					 </span>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="submit" class="btn btn-success">Update art object</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>

<!-- /editArtObjectModal -->

<!-- deleteArtObjectModal -->

<div class="modal fade" data-backdrop="static" id="deleteArtObjectModal<?=$art_object->art_object_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<form class="form-inline-table" method="POST" action="<?=base_url('/processArtObject/deleteArtObject')?>">
			<input type="hidden" name="art_object_id" value="<?=$art_object->art_object_id?>">
			<div class="modal-content">
				  <div class="modal-header">
		              <!-- kruisje bovenaan -->
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <!-- /kruisje bovenaan -->
					  <h4 class="modal-title" id="titleModalLabel">Delete art object?</h4>
				  </div>
				  <div class="modal-body">
				  	<p>
				  	Once you delete this art object it will no longer be available on the website! The system will put it in the archive
				  	</p>
				  </div>
				  <div class="modal-footer">
				  	<button type="submit" class="btn btn-danger" >Proceed</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				  </div>
			</div>
		</form>
	</div>
</div>	

<!-- /deleteArtObjectModal -->

<!-- viewImageModal -->
<div class="modal fade" data-backdrop="static" id="viewImageModal<?=$art_object->art_object_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">View image</h4>
			  </div>
			  <div class="modal-body">
			  	<img src="<?php echo base_url('/uploads/')."/$art_object->image_name"?>"/>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
			  </div>
		</div>
	</div>
</div>
<!-- /viewImageModal -->

<?php endforeach;?>

<!-- end of modal forms -->        