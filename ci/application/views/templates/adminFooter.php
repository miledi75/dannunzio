<!-- End of the row container -->
</div>
<!-- end of page container -->
</div>
<!-- Footer -->
		
<footer class="footer">
	<hr>
	<div class="container">
    	<div class="navbar-text pull-left"> Copyright &copy; D'annunzio art gallery 2014</div>
		<div class="navbar-text pull-right">
			<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
			<a href="#"><i class="fa fa-twitter fa-2x"></i></a>
			<a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
		</div>
    </div>
</footer>
	
<!-- /Footer -->     
	
	<!-- /.container -->

	<!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<!-- GENERAL MODALS FOR ADMIN MODULE -->    


<!-- /deleteConfirmModal -->    
    
<div class="modal fade" data-backdrop="static" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Item deleted!
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
			  </div>
		</div>
	</div>
</div>
<!-- /deleteConfirmModal -->

<!-- viewImageModal -->

<div class="modal fade" data-backdrop="static" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Info</h4>
			  </div>
			  <div class="modal-body">
			  	<img src="http://ohsobella.com/wp-content/uploads/2012/08/francoise-nielly-art-2.jpg"/>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
			  </div>
		</div>
	</div>
</div>

<!-- /viewImageModal -->

</body>

</html>