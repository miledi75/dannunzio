<?php var_dump($registrants);?>
<!-- start of side panel -->
<div class="container">
<div class="row">
<div class="lead col-md-3"><?php echo $pageTitle;?></div>
	    
     </div>
     <div class="row">
		 <div class="col-md-3">
		     <div class="list-group">
		     	<a href="#" class="list-group-item" data-toggle="modal" data-target="#createEventModal"><?= $cat1 ;?></a>
		     </div>
	     </div>
     </div>
 
<!-- end of the side panel -->

<!-- Begin Event table -->
	
	<?php if(isset($messageSuccess)):?>
	
	<div class="col-md-4">
		<div class="alert alert-success alert-dismissible" role="alert"><?= $messageSuccess?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($eventDeleted)):?>
	
	<div class="col-md-4">
		<div class="alert alert-success alert-dismissible" role="alert"><?= $eventDeleted?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($messageFailed)):?>
	<div class="col-md-4">
		 <div class="alert alert-danger alert-dismissible" role="alert"><?= $messageFailed?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 </div>
	</div>
	<?php endif;?>
	
	<?php if(isset($eventDeletedFailed)):?>
	<div class="col-md-4">
		 <div class="alert alert-danger alert-dismissible" role="alert"><?= $eventDeletedFailed?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 </div>
	</div>
	<?php endif;?>
	
	<?php if(isset($eventUpdated)):?>
	<div class="col-md-4">
		 <div class="alert alert-success alert-dismissible" role="alert"><?= $eventUpdated?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 </div>
	</div>
	<?php endif;?>
	
	<?php if(isset($eventUpdatedFailed)):?>
	<div class="col-md-4">
		 <div class="alert alert-danger alert-dismissible" role="alert"><?= $eventUpdatedFailed?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 </div>
	</div>
	<?php endif;?>
	
	
	
<div class="row">
<div class="col-md-12">          
      <?php if(count($events) > 0):?>
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>Event name</th>
            <th>Date</th>
            <th>Max allowed</th>
          <tr>
        </thead>
        <tbody>
          <?php foreach ($events as $event):?>
          <tr>
            <td><?= $event->event_name?></td>
            <td><?= $event->date?></td>
            <td><?= $event->max_allowed?></td>
            <td>
		      <div class="dropdown">
		        <button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteEventModal<?=$event->event_id ?>">Delete</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editEventModal<?=$event->event_id ?>">Edit</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#participantsModal<?=$event->event_id ?>">View participants</a></li>
		      </ul>
		      </div>
            </td>
          </tr>
          <?php endforeach;?>
         </tbody>
      </table>
      <?php else:?>
      No events planned. Click 'Create event' to make one.
      <?php endif;?>
      </div>
 

   </div>     
<!-- end Event table -->
</div>
<!-- end of container -->


<!-- Modals -->

<!-- deleteEventModal -->

<div id="delete" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Delete</h3>
    </div>
    <div class="modal-body">
        <p>You are about to delete.</p>
        <p>Do you want to proceed?</p>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnYes" class="btn danger">Yes</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
	
<!-- createEventModal -->
<div class="modal fade" data-backdrop="static" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Create new event</h4>
			  </div>
			  <form name="createEvent" id="formCreateEvent" method="POST" action="<?= base_url('processEvents/createEvent')?>">
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputEventName">Event Name:</label>
					<input type="text" class="form-control input-sm"  autofocus name="eventName" id="inputEventName" placeholder="Event...">
				 </div>
				 
				 <div class="form-group">
					<label for="inputDate">Date:</label>
					<input type="date" class="form-control input-sm"  name="date" id="inputDate" placeholder="When...?">
				 </div>
				 
				 <div class="form-group">
					<label for="inputMax">Maximum nr of visitors allowed:</label>
					<input type="text" class="form-control input-sm"  autofocus name="max" id="inputMax" placeholder="10...">				
				 </div>
				 
				 <div class="form-group">
				 	<div class="alert alert-danger alert-dismissible" role="alert" id="showroomMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;dfsdf</span></button>
				  	  </div>
				  </div>
				  <div class="form-group">
				  	<div class="alert alert-danger alert-dismissible" role="alert" id="eventMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;dfsdf</span></button>
				  	</div>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="button" class="btn btn-success" onclick="processNewEvent()">Create event</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>
<!-- /createEventModal -->




<?php foreach($events as $event):?>
<!-- editEventModal -->
<div class="modal fade" data-backdrop="static" id="editEventModal<?=$event->event_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			  <div class="modal-header">
	              <!-- kruisje bovenaan -->
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <!-- /kruisje bovenaan -->
				  <h4 class="modal-title" id="titleModalLabel">Create new event</h4>
			  </div>
			  <form name="editEvent" id="formEditEvent<?=$event->event_id?>" method="POST" action="<?= base_url('processEvents/editEvent')?>">
			  <input type="hidden" name="eventId<?=$event->event_id?>" value="<?=$event->event_id?>">
			  <div class="modal-body">
				 <div class="form-group">
					<label for="inputEventName">Event Name:</label>
					<input type="text" class="form-control input-sm"  autofocus name="editEventName<?=$event->event_id?>" id="inputEditEventName<?=$event->event_id?>" value="<?=$event->event_name?>">
				 </div>
				 
				 <div class="form-group">
					<label for="inputDate">Date:</label>
					<input type="text" class="form-control input-sm"  name="editDate<?=$event->event_id?>" id="inputEditDate<?=$event->event_id?>" value="<?=$event->date?>">
				 </div>
				 
				 <div class="form-group">
					<label for="inputMax">Maximum nr of visitors allowed:</label>
					<input type="text" class="form-control input-sm"  autofocus name="editMax<?=$event->event_id?>" id="inputEditMax<?=$event->event_id?>" value="<?=$event->max_allowed?>">				
				 </div>
				 
				 <div class="form-group">
				 	<div class="alert alert-danger alert-dismissible" role="alert" id="showroomMessageModal" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;dfsdf</span></button>
				  	  </div>
				  </div>
				  <div class="form-group">
				  	<div class="alert alert-danger alert-dismissible" role="alert" id="eventEditMessageModal<?=$event->event_id?>" style="display:none">
		     		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;dfsdf</span></button>
				  	</div>
				 </div>
				 
			  </div>
			  <div class="modal-footer">
				 <button type="button" class="btn btn-success" onclick="processEditEvent(<?= $event->event_id?>)">Update event</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</div>
<!-- /editEventModal -->



<!-- deleteEventModal -->
<div class="modal fade" data-backdrop="static" id="deleteEventModal<?=$event->event_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  	Would you like to cancel this event?
			  	</p>
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="processDeleteEvent(<?=$event->event_id;?>)">Yes</button>
			  	 <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
			  </div>
		</div>
	</div>
</div>
<!-- /deleteEventModal -->

<!-- viewParticipantsModal -->
<div class="modal fade" data-backdrop="static" id="participantsModal<?=$event->event_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<!-- kruisje bovenaan -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- /kruisje bovenaan -->
				<h4 class="modal-title" id="titleModalLabel">Participants to this event</h4>
			</div>
			<div class="modal-body">
		    	<table id="shoppingCartTable" class="table table-hover table-responsive">
        		  <thead>
                	<tr>
                        		<th>Name</th>
                        		<th>Nr of persons</th>
                        		<th>Email</th>
                    		</tr>
                  </thead>
                  <tbody>
              		<?php foreach ($registrants as $registrant):?>
              		<?php if($registrant->event_id == $event->event_id):?>
              		<tr>
	                	<td><?php echo "$registrant->name $registrant->surname";?></td>
	                    <td><?php echo $registrant->nr_of_persons;?></td>
	                    <td><a href="mailto:<?php echo $registrant->email?>" class="btn btn-info btn-sm">Send email</a></td>
	               </tr>
	               <?php endif;?>
	               <?php endforeach;?>
				  </tbody>
            	</table>
        	</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-info">
	    		 Close
	        </button>
	    </div>
	</div>
</div>
</div>
<!-- /viewParticipantsModal -->
<?php endforeach;?>



<!-- /Modals -->

