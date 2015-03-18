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
		<div class="col-md-3">  
			<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object added succesfully!
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($artObjectCreatedFailed): ?>
		<div class="col-md-3">  
			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					Art object creation failed!
			</div>
		</div>
	<?php endif; ?>
<!-- /NOTIFICATIONS -->
<div class="col-md-12">          
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Art object</th>
            <th>Artist</th>
            <th>Type</th>
            <th>Period</th>
            <th>Date</th>
            <th>Price in Euros</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Horses series 1</td>
            <td>Luca Di Marco</td>
            <td>Painting</td>
            <td>Impressionism</td>
            <td>March 2014</td>
            <td>240.99</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteArtObjectModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editNewArtObjectModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewImageModal">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>Horses series 2</td>
            <td>Mina Di Marco</td>
            <td>Painting</td>
            <td>Impressionism</td>
            <td>Feb 2014</td>
            <td>250.66</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteArtObjectModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editNewArtObjectModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewImageModal">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>Horses series 3</td>
            <td>Luca Di Marco</td>
            <td>Painting</td>
            <td>Impressionism</td>
            <td>Feb 2014</td>
            <td>310.56</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteArtObjectModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editNewArtObjectModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewImageModal">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>Horses series 3</td>
            <td>Luca Di Marco</td>
            <td>Painting</td>
            <td>Expressionism</td>
            <td>Feb 2015</td>
            <td>325.12</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteArtObjectModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editNewArtObjectModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewImageModal">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
        </tbody>
      </table>
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

<div class="modal fade" data-backdrop="static" id="editNewArtObjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Edit art object</h4>
			  </div>
			  <div class="modal-body">
				 <form class="form-inline-table" method="POST" action="proces.php">
				 
				 <div class="form-group">
					<label for="inputTitle">Artwork title</label>
					<input type="text" class="form-control input-sm" id="inputTitle" value="Horses series 1">
				 </div>
				 
				 <div class="form-group">
					<label for="selArtist">Artist name</label>
					<select class="form-control input-sm" id="selArtist">
				        <option>Luca Di Marco</option>
				        <option selected>Mina Di Marco</option>
				        <option>Nazzaro Franciotti</option>
				        <option>Vincenzo Pavone</option>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtifactType">Artifact type</label>
					<select class="form-control input-sm" id="selArtifactType">
				        <option>Lithography</option>
				        <option selected>painting</option>
				        <option>Sculpture</option>
				        <option>Vincenzo Pavone</option>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtMovement">Artifact type</label>
					<select class="form-control input-sm" id="selArtMovement">
				        <option selected>Expressionism</option>
				        <option>Impressionism</option>
				        <option>Popart</option>
				        <option>Postmodern art</option>
				    </select>
				 </div>
				 
				 <div class="form-group">
				      <label for="input-month">Date	</label>
				      <input id="input-month" class="form-control input-sm" type="month" value="2015-03">
				 </div>
				 <div class="form-group">
				      <label for="inputPrice">Price</label>
				      <input id="inputPrice" class="form-control input-sm" value="240.99 Euro">
				 </div>
				 <div class="form-group">
					 <label for="imgArtObject">Update image</label>
					 <span class="btn btn-info btn-file btn-sm">
	    			 Browse <input id="imgArtObject" class="form-control" type="file">
					 </span>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="submit" class="btn btn-success">Save edits</button>
				 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>

<!-- /editArtObjectModal -->

<!-- deleteArtObjectModal -->

<div class="modal fade" data-backdrop="static" id="deleteArtObjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
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
			  	<button type="submit" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#deleteConfirmModal">Proceed</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>	

<!-- /deleteArtObjectModal -->



<!-- end of modal forms -->        