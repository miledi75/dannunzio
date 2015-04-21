
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
		     	<a href="#" class="list-group-item" data-toggle="modal" data-target="#createUserModal"><?= $cat1 ;?></a>
		     </div>
	     </div>
     </div>
 
<!-- end of the side panel -->

<!-- Begin customer table -->
<div class="row">
<?php if ($userCreated): ?>
<div class="col-md-3">  
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  User created succesfully!
</div>
</div>
<?php endif; ?>
<?php if ($userDeleted): ?>
<div class="col-md-3">  
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  User deleted succesfully!
</div>
</div>
<?php endif; ?>
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
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteUserModal<?=$customer->user_id?>">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editUserModal<?=$customer->user_id?>">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewExtraInfoUserModal<?=$customer->user_id?>	">View extra info</a></li>
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
   <div class="row">
   <div class="col-md-3">
   <p><?= $links?></p>
   </div>
   </div>     
<!-- end art object table -->
</div>
<!-- end of container -->

<!--  user modals -->

<!-- deleteUserModals -->
<?php foreach ($customers as $customer): ?>
<div class="modal fade" data-backdrop="static" id="deleteUserModal<?=$customer->user_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	<button type="submit" class="btn btn-danger"  data-dismiss="modal" onclick="deleteUser(<?=$customer->user_id?>)">Proceed</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
	
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- /deleteUserModal -->

<!-- createUserModal -->

<div class="modal fade" data-backdrop="static" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Add new User</h4>
			  </div>
			  <form class="form-inline-table" id="createUserForm" method="POST" action="<?=base_url('processUser/newUser');?>">
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputType">User type:</label>
					<select class="form-control input-sm"  name="user_role_id" id="inputType" >
						<option value="1">Admin</option>
						<option value="2">Subadmin</option>
					</select>
				 </div>
				 <div class="form-group">
					<label for="inputName">Name:</label>
					<input type="text" class="form-control input-sm"  name="name" id="inputName" placeholder="Name...">
				 </div>
				 
				 <div class="form-group">
					<label for="inputSurname">Surname:</label>
					<input type="text" class="form-control input-sm" name="surname" id="inputSurname" placeholder="Surname...">
				 </div>
				 
				  <div class="form-group">
					<label for="inputEmail">Email:</label>
					<input type="text" class="form-control input-sm" name="email" id="inputEmail" placeholder="Email...">
				 </div>
				 
				 <div class="form-group">
					<label for="inputCell">Cell phone:</label>
					<input type="text" class="form-control input-sm" name="cell" id="inputCell" placeholder="Phone...">
				 </div>
				 
				
				 <div class="form-group">
				      <label for="inputUserName">Username:</label>
				      <input type="text" name="username" id="inputUserName" class="form-control input-sm" placeholder="Username...">
				 </div>
				 <div class="form-group">
					 <label for="inputPassword">Password:</label>
				      <input type="password" name="password" id="inputPassword" class="form-control input-sm">
				 </div>
				 
				 <div class="form-group">
					 <label for="inputPassword2">Retype Password:</label>
				      <input type="password" name="password2" id="inputPassword2" class="form-control input-sm">
				 </div>
				 
				 <div class="form-group">
					 <label for="inputstreet">Street:</label>
				      <input type="text" name="street" id="inputstreet" class="form-control input-sm">
				 </div>
				 <div class="form-group">
					 <label for="inputNumber">Number:</label>
					 <input type="text" name="number" id="inputNumber" class="form-control input-sm">
				 </div>
				 <div class="form-group">
					 <label for="inputPostalCode">Postal code:</label>
					 <input type="text" name="postalcode" id="inputPostalCode" class="form-control input-sm">
				 </div>
				 <div class="form-group">
					 <label for="inputTown">Town:</label>
					 <input type="text" name="town" id="inputTown" class="form-control input-sm">
				 </div>
				 
				  <div class="form-group">
					 <label for="inputCountry">Country:</label>
					 <input type="text" name="country" id="inputCountry" class="form-control input-sm">
				 </div>
				 <div class="form-group">
				 	<div class="alert alert-danger alert-dismissible" role="alert" id="createUserMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
					</button>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				 <a type="submit" class="btn btn-success" onclick="registerUser()">Create User</a>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>


<!-- /createUserModal -->



<!-- /user modals -->


