<?php
class processEvents extends CI_Controller
{
	/**
	 * ci-onstructor loads the database model.
	 */
	function __construct()
	{
		parent::__construct();

		//LOAD THE MODELS
		$this->load->model('event_model');
	}
	
	/**
	 * processes the registration for an event
	 * @param unknown_type $event_id
	 */
	public function processRegisterForEvent()
	{
		//LOAD THE MODEL
		$this->load->model('event_model');
		//GET THE USER ID
		$user_id 	= $this->session->userdata('user_id');
		$event_id 	= $this->input->get_post('event_id');
		$nr_of_persons = $this->input->get_post('nr_of_persons');
	
		//SAVE THE REGISTRATION
		$result = $this->event_model->registerEvent($user_id,$event_id,$nr_of_persons);
		if($result)
		{
			//REGISTRATION SUCCESSFULL
			$message = 1;
		}
		else
		{
			//REGISTRATION FAILED
			$message = 2;
		}
		redirect('pages/events/'.$message);
	}
	
	/**
	 * creates an event
	 */
	function createEvent()
	{
		$eventName = $this->input->get_post('eventName');
		$date = $this->input->get_post('date');
		$max = $this->input->get_post('max');
	
	
	
		//LOAD THE MODEL
		$this->load->model('event_model');
		//INSERT THE EVENT
		if($this->event_model->insertEvent($eventName,$date,$max))
		{
			$url = base_url('admin/manageEvents/1');
		}
		else
		{
			$url = base_url('admin/manageEvents/2');
		}
		echo $url;
	
		redirect($url);
	}
	
	/**
	 * deletes an event
	 * @param unknown $event_id
	 */
	public function deleteEvent($event_id)
	{
		//DELETE THE EVENT
		if($this->event_model->deleteEvent($event_id))
		{
			redirect(base_url('admin/manageEvents/3'));
		}
		else
		{
			redirect(base_url('admin/manageEvents/4'));
		}
	}
	
	/**
	 * edits an event
	 */
	public function editEvent()
	{
		$vars = $this->input->post();
		$event = array();
		foreach($vars as $var)
		{
			$event[] = $var;
		}
		$eventId = $event[0];
		$eventName = $event[1];
		$date = $event[2];
		$max = $event[3];
		
		//UPDATE THE EVENT
		if($this->event_model->updateEvent($eventId,$eventName,$date,$max))
		{
			redirect(base_url('admin/manageEvents/5'));
		}
		else
		{
			redirect(base_url('admin/manageEvents/6'));
		}
	}
}