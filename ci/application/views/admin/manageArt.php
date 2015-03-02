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
<div class="table-responsive">          
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Art object</th>
            <th>Artist</th>
            <th>Type</th>
            <th>Period</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Anna</td>
            <td>John</td>
            <td>Anna</td>
            <td>Anna</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Debbie</td>
            <td>John</td>
            <td>Anna</td>
            <td>Anna</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>John</td>
            <td>John</td>
            <td>Anna</td>
            <td>Anna</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>John</td>
            <td>John</td>
            <td>Anna</td>
            <td>Anna</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View Image</a></li>
		        </ul>
		      </div>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
 
<!-- end art object table -->
   </div>     
</div>

<!-- modal forms -->

<!-- addNewArtObjectModal -->

<div class="modal fade" data-backdrop="static" id="addNewArtObjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Add new art object</h4>
			  </div>
			  <div class="modal-body">
				 <form class="form-inline-table" method="POST" action="proces.php">
				 
				 <div class="form-group">
					<label for="inputTitle">Artwork title</label>
					<input type="text" class="form-control input-sm" id="inputTitle" placeholder="Sunflowers...">
				 </div>
				 
				 <div class="form-group">
					<label for="selArtist">Artist name</label>
					<select class="form-control input-sm" id="selArtist">
				        <option>Luca Di Marco</option>
				        <option>Mina Di Marco</option>
				        <option>Nazzaro Franciotti</option>
				        <option>Vincenzo Pavone</option>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtifactType">Artifact type</label>
					<select class="form-control input-sm" id="selArtifactType">
				        <option>Lithography</option>
				        <option>Oil painting</option>
				        <option>Sculpture</option>
				        <option>Vincenzo Pavone</option>
				    </select>
				 </div>
				 
				 <div class="form-group">
					<label for="selArtMovement">Artifact type</label>
					<select class="form-control input-sm" id="selArtMovement">
				        <option>Expressionism</option>
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
					 <label for="imgArtObject">Art image</label>
					 <span class="btn btn-default btn-file btn-sm">
	    			 Browse <input id="imgArtObject" class="form-control" type="file">
					 </span>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="submit" class="btn btn-default">Add to collection</button>
				 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>
<!-- /addNewArtObjectModal -->

<!-- end of modal forms -->        