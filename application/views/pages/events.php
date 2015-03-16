<div class="col-md-9">
<h5>Upcoming events</h5>

<div class="table-responsive">
  <table class="table">
 
   <tr>
   <td>Meet the artist: Mina Di Marco</td>
   <td>Monday, April 13 20h</td>
   <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#registerForEventModal">Register</button></td>
   </tr>
   <tr>
   <td>nocturnal</td>
   <td>Wednesday, May 14 21h</td>
   <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#registerForEventModal">Register</button></td>
   </tr>
   <tr>
   <td>Meet the artist: Luca Di Marco</td>
   <td>Thursday, June 4 20h</td>
   <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#registerForEventModal">Register</button></td>
   </tr>
  </table>
</div>

</div>

<!-- Modal forms -->

<!-- registerForEventModal -->

<div class="modal fade" data-backdrop="static" id="registerForEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<!-- kruisje bovenaan -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- /kruisje bovenaan -->
				<h4 class="modal-title" id="titleModalLabel">Register for event</h4>
			</div>
			<div class="modal-body">
				<form class="form-inline-table" method="POST" action="<?= base_url('admin/processRegisterForEvent'); ?>">
					<div class="form-group">
						  <label for="select_nr_of_persons">Nr of persons:</label>
						  <select class="form-control" id="select_nr_of_persons">
						    <option>1</option>
						    <option>2</option>
						    <option>3</option>
						    <option>4</option>
						  </select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Register</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- /registerForEventModal -->
<!-- /modal Forms -->