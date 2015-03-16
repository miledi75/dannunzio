<!-- start of side panel -->    
<div class="container">
    <div class="row">
	   	<div class="lead col-md-3"><?php echo $pageTitle;?></div>
	     <!-- Search box -->
	     <div class="col-md-3 pull-right">
			 <form class="navbar-form" role="search">
			 <div class="input-group">
				 <input type="text" class="form-control" placeholder="find customer..." name="q_art">
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

<!-- Begin customer table -->
<div class="row">
<div class="col-md-12">          
   <table class="table table-hover">
   		<thead>
          <tr>
            <th>Customer nr</th>
            <th>Surname</th>
            <th>Name</th>
            <th>type</th>
            <th>Email</th>
            <th></th>
          <tr>
        </thead>
        <tbody>
          <?php foreach ($customers as $customer): ?>
          <tr>
            <td><?=$customer->user_id?></td>
            <td><?=$customer->surname?></td>
            <td><?=$customer->name?></td>
            <td><?=$customer->user_role?></td>
            <td><a href="mailto:<?=$customer->email?>" class="btn btn-info btn-sm">Send email</a></td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteUserModal">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editUserModal">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewExtraInfoUserModal">View extra info</a></li>
		      </ul>
		      </div>
            </td>
          </tr>
          <tr>
          <?php endforeach; ?>
        </tbody>
    </table>
      </div>
 

   </div>     
<!-- end art object table -->
</div>
<!-- end of container -->

<!--  user modals -->

<!-- deleteUserModals -->

<div class="modal fade" data-backdrop="static" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Delete customer from system?</h4>
			  </div>
			  <div class="modal-body">
			  	
			  	<p>
			  	Once you delete this customer it will no longer be available on the website! The system will put it in the archive mode.
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	<button type="submit" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#deleteConfirmModal">Proceed</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
	
		</div>
	</div>
</div>

<!-- /deleteUserModal -->

<!-- /user modals -->


