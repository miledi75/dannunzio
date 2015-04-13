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
	
	
	<?php 
	var_dump($this->session->all_userdata());
	?>
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
                    
                    <?php if($this->session->userdata('role') == 'admin'|| $this->session->userdata('role') == 'subadmin'):?>
                    <li>
                        <a href="<?php echo base_url('admin/home');?>">Admin panel</a>
                    </li>
                    <?php endif;?>
            </ul>
	        
				
				
			<?php if ($this->session->userdata('logged_in') == 1): ?>
            	
			<div class=" col-sm-1 col-md-1 pull-right" id="logoutButton">
				<a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#logoutModal">
				<i class="fa fa-user fa-fw"></i> Logout
			</a>
			</div>
			<?php else:?>
			<div class=" col-sm-1 col-md-1 pull-right" id="loginButton">
				<a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#loginModal">
				<i class="fa fa-user fa-fw"></i> Login
			</a>
			</div>
			<?php endif;?>
			<!-- /Login button -->
			<!-- shoppingcart button -->
			<div class=" col-sm-2 col-md-2 pull-right">
           		<a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#shoppingCartModal">
  				<i id="shoppingCartCounter" class="fa fa-shopping-cart"> Your shoppingcart: <?=$this->cart->total_items()?></i>
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
<!-- showroom links -->        
	</div>
   	<div class="row">
		<div class="col-md-3">
        	<div class="list-group">
            	<?php foreach ($types as $type): ?>
					<a href="<?php echo base_url("pages/store/$type->artefact_type_id")?>" class="list-group-item"><?= $type->artefact_type ;?></a>
				<?php endforeach; ?>
            </div>
        </div>
<!-- /showroom links -->
<!-- end of the side panel -->
            
<!-- Modal forms -->

        
<!-- logoutModal -->        
<div class="modal fade" data-backdrop="static" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Would you like to log out?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-info" onclick="redirect('<?=base_url('processUser/processLogout')?>')">Yes</button>
			  	 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>
<!-- /logoutModal -->
        
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
			<form id="shoppingCartForm" method="POST" action="<?=base_url('processSales/checkoutSales');?>">
			<div class="modal-body">
		    		<table id="shoppingCartTable" class="table table-hover table-responsive">
        		        <thead>
                		    <tr>
                        		<th>Product</th>
                        		<th class="text-left">Price</th>
                        		<th> </th>
                    		</tr>
                    		<?php if($this->cart->total_items()>0):?>
                    		<?php foreach ($this->cart->contents() as $item):?>
                    		<tr id="item<?=$item['id']?>">
			 					<td class="col-md-6">
	         						<div class="media">
	         							<div class="media-body">
	         								<h4 class="media-heading">
	         									<a href="#">
	         										<div id="title<?=$item['id']?>">
	         										<?=$item['name']?>
	         										</div>
	         									</a>
	         								</h4>
	         								<h5 class="media-heading">
	         								by <a href="#"><div id="artist<?=$item['id']?>"><?=$item['artist']?></div>
	         								</a>
	         								</h5>
	         							</div>
	         						</div>
	         					</td>
	         					<td class="col-md-1 text-left">
	         						<strong>&euro; <div id="price<?=$item['id']?>"><?=$item['price']?></div></strong>
	         					</td>
	         					<td class="col-md-1">
	         					<button onclick="deleteRowFromShoppingCart(<?=$item['id']?>)" type="button" class="btn btn-sm btn-danger">
	         					<span class="fa fa-remove"></span> Remove</button>
	         					</td>
         					</tr>
                    		<?php endforeach;?>
                    		<?php endif;?>
                		</thead>
                		<tbody>
              
                    	<tr id="shoppingCartTotal" style="display:none">
	                        <td class="col-md-1 text-right"><h4>Total:</h3></td>
	                        <td class="col-md-1 text-left"><h4><strong>&euro; <div id="totalShoppingCart">0</div></strong></h3></td>
	                        <td></td>
	                    </tr>
					</tbody>
            	</table>
        	</div>
		
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-info">
	    		<span class="fa fa-shopping-cart"></span> Continue Shopping
	        </button>
	    <button type="su0bmit" class="btn btn-success">
	    	Checkout <span class="fa fa-play"></span></button>
	    </a>
		</div>
		</form>
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
						<button type="button" class="btn btn-info btn-sm form-control" id="btnNewUser" data-dismiss="modal" onclick="redirect('<?=base_url('pages/register')?>')">
						New user
						</button>
				</div>
				<div class="form-group">	
					<div style="display:none" class="alert alert-danger alert-dismissible" role="alert" id="loginMessage"></div>		
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" onclick="processLogin(this)">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- /loginModal -->

<!-- loginConfirmmodal -->
<div class="modal fade" data-backdrop="static" id="loginConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	You are logged in
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-info" onclick="reloadPage()">Ok</button>
			  </div>
		</div>
	</div>
</div>
<!-- /loginConfirmModal -->


<!-- /Modal forms -->
