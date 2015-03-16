<!-- start of side panel -->
<div class="container">
<div class="row">
<div class="lead col-md-3"><?php echo $pageTitle;?></div>
	    
     </div>
     <div class="row">
		 <div class="col-md-3">
		     <div class="list-group">
		     	<a href="#" class="list-group-item" data-toggle="modal" data-target="#addNewShowroomModal"><?= $cat1 ;?></a>
		     </div>
	     </div>
     </div>
 
<!-- end of the side panel -->

<!-- Begin Showroom table -->
<div class="row">
<div class="col-md-12">          
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>Showroom</th>
            <th>Nr of art objects</th>
            <th></th>
          <tr>
        </thead>
        <tbody>
          <tr>
            <td>Paintings</td>
            <td>5</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteUserModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editUserModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewExtraInfoUserModal">View Art objects</a></li>
		      </ul>
		      </div>
            </td>
          </tr>
          
          <tr>
            <td>Sculptures</td>
            <td>5</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteUserModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editUserModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewExtraInfoUserModal">View Art objects</a></li>
		      </ul>
		      </div>
            </td>
          </tr>
          
          <tr>
            <td>Lithography</td>
            <td>5</td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteUserModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editUserModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewExtraInfoUserModal">View Art objects</a></li>
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