<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
   
	<title>Online Art Gallery</title>
	<!-- font-awesome-min css from maxCDN -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Bootstrap Core CSS  -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	
	
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/shop-homepage.css');?>" rel="stylesheet">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('pages/home');?>">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url('pages/information');?>">Who we are</a>
                    </li>
                    
                   	<li>
                        <a href="<?php echo base_url('pages/artists');?>">Our artists</a>
                    </li>
                    
                     <li>
                        <a href="<?php echo base_url('pages/events');?>">Events</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('pages/location');?>">Location</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('admin/home');?>">Admin panel</a>
                    </li>
            </ul>
	        
				<!-- Login button 
				<button type="button" class="btn btn-primary navbar-btn pull-right" data-toggle="modal" data-target="#loginModal">Login</button>
				-->
				<div class=" col-sm-1 col-md-1 pull-right">
					<a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#loginModal">
					<i class="fa fa-user fa-fw"></i> Login
					</a>
				</div>
				
				<!-- /Login button -->
				<!-- shoppingcart button -->
				<div class=" col-sm-2 col-md-2 pull-right">
           			<a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#shoppingCartModal">
  					<i class="fa fa-shopping-cart"> Your shoppingcart: 1</i>
  					</a>
            	</div>
				<!-- /shoppingcart button -->
				    
				<!-- Search box -->
				<div class="col-sm-3 col-md-3 pull-right">
					<form class="navbar-form" role="search">
						<div class="input-group">
						    <input type="text" class="form-control form-control" placeholder="Find art..." name="q_art">
						    <div class="input-group-btn">
						    	<button class="btn  btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					    	</div>
						</div>
					</form>
				</div> 
</div>

<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<!-- Page Content -->
<!-- start of side panel -->    
    <div class="container">

        
        <!-- ShopName -->
        <div class="row">
        <div class="col-md-3">
        <p class="lead"><?= $shopName ;?></p>
   		</div>
   		<!-- /shopName -->
        
       
               
        </div>
   
        <div class="row">
			<div class="col-md-3">
                <div class="list-group">
                    <a href="<?php echo base_url('pages/paintings')?>" class="list-group-item"><?= $cat1 ;?></a>
                    <a href="<?php echo base_url('pages/sculptures')?>" class="list-group-item"><?= $cat2 ;?></a>
                    <a 	href="<?php echo base_url('pages/lithos')?>" class="list-group-item"><?= $cat3 ;?></a>
                </div>
            </div>
            
            
            
<!-- end of the side panel -->
            
<!-- Modal forms -->

<!-- shoppinCartModal -->
<div class="modal fade" data-backdrop="static" id="shoppingCartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<!-- kruisje bovenaan -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- /kruisje bovenaan -->
				<h4 class="modal-title" id="titleModalLabel">Your shopping cart</h4>
			</div>
			<div class="modal-body">
		    	<div class="row">
                    <table class="table table-hover table-responsive">
        		        <thead>
                		    <tr>
                        		<th>Product</th>
                        		<th class="text-left">Price</th>
                        		<th> </th>
                    		</tr>
                		</thead>
                		<tbody>
              
                    	<tr>
                        	<td class="col-md-6">
                        		<div class="media">
	                            	<div class="media-body">
	                               		<h4 class="media-heading"><a href="#">Horses series 1</a></h4>
	                                	<h5 class="media-heading"> by <a href="#">Luca Di Marco</a></h5>
	                                	
	                            	</div>
                        		</div>
                        	</td>
                        	<td class="col-md-1 text-left"><strong>&euro; 240.99</strong></td>
                        	<td class="col-md-1">
                        		<button type="button" class="btn btn-sm btn-danger">
                            	<span class="fa fa-remove"></span> Remove
                        		</button>
                        	</td>
                    	</tr>
	                    
	                    <tr>
	                        
	                        
	                        <td class="col-md-1 text-right"><h5>Estimated shipping:</h5></td>
	                        <td class="col-md-1 text-left"><h5><strong>&euro; 6.94</strong></h5></td>
	                        <td></td>
	                    </tr>
	                    <tr>
	                        
	                        
	                        
	                        <td class="col-md-1 text-right"><h4>Total:</h3></td>
	                        <td class="col-md-1 text-left"><h4><strong>&euro; 247.93</strong></h3></td>
	                        <td></td>
	                    </tr>
					</tbody>
            	</table>
        	</div>
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-info">
	    		<span class="fa fa-shopping-cart"></span> Continue Shopping
	        </button>
	    <a href="<?php echo base_url('pages/checkout');?>" class="btn btn-success">
	    	Checkout <span class="fa fa-play"></span>
	    </a>
		</div>
	</div>
</div>
</div>
<!-- /shoppingCartModal -->
            
            
            
<!-- loginModal -->            
<div class="modal fade" data-backdrop="static" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<!-- kruisje bovenaan -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- /kruisje bovenaan -->
				<h4 class="modal-title" id="titleModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<form class="form-inline-table" method="POST" action="<?= base_url('admin/processLogin'); ?>">
					<div class="form-group">
						<label for="inputName">Your login</label>
						<input type="text" class="form-control" id="inputLogin">
					</div>
									
					<div class="form-group">	
						<label for="inputFirstName">Password</label>
						<input type="password" class="form-control" id="inputPassword">
					</div>
				
				<div class="form-group">	
						<label for="btnNewUser">First time here?</label>
						<button type="button" class="btn btn-info btn-sm form-control" id="btnNewUser" data-dismiss="modal" data-toggle="modal" data-target="#registerNewCustomerModal">
						New user
						</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /loginModal -->

<!-- RegisterNewCustomerModal -->
<div class="modal fade" data-backdrop="static" id="registerNewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
				  <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Register as new customer</h4>
			  </div>
			  <div class="modal-body">
			  	<form class="form-inline-table" method="POST" action="proces.php">
					<div class="form-group">
						<label for="inputName">Name</label>
						<input type="text" class="form-control" id="inputName" placeholder="Dimaggio">
					</div>
								
					<div class="form-group">	
						<label for="inputFirstName">First name</label>
						<input type="text" class="form-control" id="inputFirstName" placeholder="Miles">
					</div>
									
					<div class="form-group">	
						<label for="inputEmail">Email</label>
						<input type="email" class="form-control" id="inputEmail" placeholder="me@someplace.com">
					</div>
									
					<div class="form-group">
						<label for="InputPassword">Password</label>
						<input type="password" class="form-control" id="InputPassword" placeholder="Password">
					</div>
									
					<div class="form-group">
						<label for="InputControlPassword1">Repeat password</label>
						<input type="password" class="form-control" id="InputControlPassword1" placeholder="Password">
					</div>
									
					<img id="captcha" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQmRYUNSth8eqGr_wlaNa5MIXdMfu7PZ3RhjktnPkfBN9tk9yVGZQ" height="42" width="100" alt="CAPTCHA Image" />
					<a href="#" onclick="document.getElementById('captcha').src = '././assets/library/vendor/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Show a Different Image</a><br/>
					<div class="form-group" style="margin-top: 10px;">
						<input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="Prove you are not a machine..." />
						<span class="help-block" style="display: none;">Prove you are not a machine...</span>	
					</div>
									
							
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /RegisterNewCustomerModal -->
<!-- /Modal forms -->
