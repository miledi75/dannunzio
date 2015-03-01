<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
                <a class="navbar-brand" href="#">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Who we are</a>
                    </li>
                    <li>
                        <a href="#">Location</a>
                    </li>
                    <li>
                        <a href="#">Events</a>
                    </li>
					<li>
                        <a href="#">Gallery</a>
                    </li>
					<li>
                        <a href="#">Featured artist</a>
                    </li>
		    </ul>
	        
				<!-- Register button -->
				<button type="button" class="btn btn-default navbar-btn pull-right" data-toggle="modal" data-target="#registerNewCustomerModal">Register</button>
				<!-- /Register button -->
				
				<!-- Login button -->
				<button type="button" class="btn btn-default navbar-btn pull-right" data-toggle="modal" data-target="#registerNewCustomerModal">Login</button>
				<!-- /Login button -->
				
				
				<!-- RegisterModal -->
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
						<button type="submit" class="btn btn-default">Submit</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
						</form>
					  </div>
					</div>
				</div>
				<!-- /RegisterModal -->    
		<!-- Search box -->
		    <div class="col-sm-3 col-md-3 pull-right">
		    <form class="navbar-form" role="search">
		    <div class="input-group">
		    <input type="text" class="form-control" placeholder="Find art..." name="q_art">
		    <div class="input-group-btn">
		    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
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

        <div class="row">
        <p class="lead"><?= $shopName ;?></p>
        </div>
        <div class="row">

            <div class="col-md-3">
                
                <div class="list-group">
                    <a href="#" class="list-group-item"><?= $cat1 ;?></a>
                    <a href="#" class="list-group-item"><?= $cat2 ;?></a>
                    <a href="#" class="list-group-item"><?= $cat3 ;?></a>
                </div>
            </div>
<!-- end of the side panel -->
