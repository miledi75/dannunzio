<div class="col-md-9">
<?php if(isset($messageSuccess)):?>
<div class="alert alert-info alert-dismissible" role="alert"><?= $messageSuccess?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif;?>

<?php if(isset($messageFailed)):?>
<div class="alert alert-danger alert-dismissible" role="alert"><?= $messageFailed?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif;?>

<h5>Upcoming events</h5>
<?php if(count($events) > 0):?>
<div class="table-responsive">
  
  <table class="table">
   <?php foreach($events as $event):?>
   <tr>
   <td><?= $event->event_name?></td>
   <td><?= $event->date?></td>
   <?php if($this->session->userdata('logged_in') == true):?>
   <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#registerForEventModal<?= $event->event_id?>">Register</button></td>
   <?php else:?>
   <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#loginModal">Log in to register</button></td>
   <?php endif;?>
   </tr>
   <?php endforeach;?>
  </table>
</div>
<?php else:?>
Check out this page
<?php endif;?>
</div>

<!-- Modal forms -->

<!-- registerForEventModal -->

<?php foreach($events as $event):?>

<div class="modal fade" data-backdrop="static" id="registerForEventModal<?= $event->event_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<!-- kruisje bovenaan -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- /kruisje bovenaan -->
				<h4 class="modal-title" id="titleModalLabel">Register for event</h4>
			</div>
			<form class="form-inline-table" method="POST" action="<?= base_url('admin/processRegisterForEvent'); ?>">
			<div class="modal-body">
				
					<input type="hidden" name="event_id" value="<?=$event->event_id?>" />
					<div class="form-group">
						  <label for="select_nr_of_persons">Nr of persons:</label>
						  <select name="nr_of_persons" class="form-control" id="select_nr_of_persons">
						    <option>1</option>
						    <option>2</option>
						    <option>3</option>
						    <option>4</option>
						  </select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Register</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- /registerForEventModal -->
<!-- /modal Forms -->