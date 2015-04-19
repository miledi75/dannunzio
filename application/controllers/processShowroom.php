<?php
class processShowroom extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//LOAD THE MODEL
		$this->load->model('showroom_model');
	}
	
	/**
	 * creates a new showroom
	 * this function is called from an AJAX function
	 * if a new showroom is created the function returns the
	 * new showroom ID
	 * @param unknown $showroom_name
	 * @param unknown $state
	 */
	public function newShowroom($showroom_name,$state)
	{
		//CHECK IF SHOWROOM EXISTS
		$exists = $this->showroom_model->checkIfShowroomNameExist($showroom_name);
		
		if($exists->num_rows >0)
		{
			$response = 'EX';
		}
		else
		{
			//INSERT THE NEW SHOWROOM
			$res = $this->showroom_model->insert_showroom($showroom_name,$state);
		
			if($res)
			{
				//GET THE NEW ID
				
				$response =  $this->db->insert_id();
			}
			else
			{
				$response = 0;
			}
		}
					
		$this->generateResponse($response);
		
	}
	
	/**
	 * deletes the showroom by archiving it
	 * @param unknown $showroom_id
	 */
	public function deleteShowroom($showroom_id)
	{
		$nrOfObjects = $this->showroom_model->getNumberOfArtObjectsInShowroom($showroom_id)[0]->nr_of_artObjects;
		
		//CHECK IF SHOWROOM HAS ARTOBJECTS
		if($nrOfObjects == 0)
		{
			$delete = $this->showroom_model->updateStateOfShowroom($showroom_id, 2);
			
			if($delete)
			{
				$response = 1;
			}
			else
			{
				$response = 0;
			}	
		}
		else
		{
			$response = 3;
		}
		
		$this->generateResponse($response);
		
	}
	
	public function toggleShowroomState($showroom_id,$state)
	{
		$res = $this->showroom_model->updateStateOfShowroom($showroom_id,$state);
		
		$this->generateResponse($res);
	}
	
	
	/**
	 * generates the xml tags for the ajax response
	 * @param unknown $response
	 */
	private function generateResponse($response)
	{
		// generate XML output
		header('Content-Type: text/xml');
		// generate XML header
		echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		// create the <response> element
		echo '<response>';
		echo $response;
		echo '</response>';
	}
}