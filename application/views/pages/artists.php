<div class="col-md-9">
<h5>Our artists</h5>
</div>
<div class="col-md-2">

	<div class="thumbnail">
     <img src="<?php echo base_url('assets/images/luca.jpg')?>" alt="">
     	<div class="caption">
        	<h4>
           	Luca Di Marco
           	</h4>
           	<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showBioModal">
               <i class="fa fa-user"></i>
                Bio
            </button>
        </div>
     </div>

</div>

<div class="col-md-2">

	<div class="thumbnail">
     <img src="<?php echo base_url('assets/images/mina.jpg')?>" alt="">
     	<div class="caption">
        	<h4>
           	Mina Di Marco
           	</h4>
           	<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showBioModal">
               <i class="fa fa-user"></i>
                Bio
            </button>
        </div>
     </div>

</div>

<!-- showBioModal -->
<div class="modal fade" data-backdrop="static" id="showBioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
				  <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Artist biography</h4>
			  </div>
			  <div class="modal-body">
			  <h5>Mina Di Marco</h5>
			  <p>Born in Ghent in 2007, she is the daughter of Mileto Di Marco and Kim Maes. She is also the sister of Luca Di Marco. 
			  Highly artistic, interested in plants and animals. Loves to play on the beach and to taken long walks in the mountains. She specializes in rural oriented sculptures and lithography.</p>
			  </div>
			  <div class="modal-footer">
			  		<button class="btn btn-info" data-dismiss="modal">Close</button>
			  </div>
		</div>
	</div>
</div>	
<!-- /showBioModal -->
