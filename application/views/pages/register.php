
<?php if(isset($message)): ?>


    <div class="alert alert-danger">

        <a href="#" class="close" data-dismiss="alert">&times;</a>
		<?=$message?>
    </div>
<?php endif;?>
<!-- RegisterNewCustomerModal -->
<div class="col-md-6"> 
			  <form id="newUserForm" class="form-inline-table" method="POST" action="<?= base_url('processUser/newUserFromStore')?>">
				
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
					<input type="email" class="form-control input-sm" name="email" id="inputEmail" placeholder="Email...">
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
				      <input type="password" name="password" id="inputPassword1" class="form-control input-sm">
				 </div>
				 
				 <div class="form-group">
					 <label for="inputPassword2">Retype Password:</label>
				      <input type="password2" name="password2" id="inputPassword2" class="form-control input-sm">
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
									
					<img id="captcha" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQmRYUNSth8eqGr_wlaNa5MIXdMfu7PZ3RhjktnPkfBN9tk9yVGZQ" height="42" width="100" alt="CAPTCHA Image" />
					<a href="#" onclick="document.getElementById('captcha').src = '././assets/library/vendor/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Show a Different Image</a><br/>
					<div class="form-group" style="margin-top: 10px;">
						<input type="text" class="form-control" name="captcha_code" id="captchaCode" placeholder="Prove you are not a machine..." />
						<span class="help-block" style="display: none;">Prove you are not a machine...</span>	
					</div>
									
							
				
				<div class="form-group">
					<button type="button" class="btn btn-success" onclick="registerNewUserFromStore()">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
				<div class="form-group">
				 	<div class="alert alert-danger alert-dismissible" role="alert" id="createUserMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
					</button>
					</div>
				</div>
			</form>
</div>
<!-- /RegisterNewCustomerModal -->