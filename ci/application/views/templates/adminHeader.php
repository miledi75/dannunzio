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
                <a class="navbar-brand" href="<?php echo base_url('admin/home');?>">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url('admin/manageArt');?>">Manage art collection</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/manageCustomers');?>">Manage customers</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/manageUsers');?>">Manage users</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('admin/manageShowrooms');?>">Manage showrooms</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('admin/manageEvents');?>">Manage events</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/manageSales');?>">Manage sales</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('pages/home');?>">Go to store</a>
                    </li>
		    </ul>
	        
				
				
				<!-- Logout button -->
				<button type="button" class="btn btn-default navbar-btn pull-right" data-toggle="modal" data-target="#logOutConfirmationModal">Logout</button>
				<!-- /Logout button -->
			</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- end of navigation -->
<!-- modal forms -->
<!-- LogoutModal -->
				<div class="modal fade" data-backdrop="static" id="logOutConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<!-- kruisje bovenaan -->
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<!-- /kruisje bovenaan -->
							<h4 class="modal-title" id="titleModalLabel">Logout from admin section</h4>
						  </div>
						  <div class="modal-body">
							<form class="form-inline-table" method="POST" action="<?php echo base_url();?>">
							<p>Would you like to log out?</p>						
						  </div>
						<div class="modal-footer">
						<button type="submit" class="btn btn-default">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
						</form>
					  </div>
					</div>
				</div>
<!-- /LogoutModal -->

<!-- /modal forms -->
    
    
    
    
<!-- Page Content -->

