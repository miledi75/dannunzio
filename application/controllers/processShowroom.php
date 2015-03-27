<?php
class processShowroom extends CI_Controller
{
	public function newShowroom($showroom_name,$state)
	{
		//LOAD THE MODEL
		
		$this->load->model('showroom_model');
		
		//CHECK IF SHOWROOM EXISTS
		$exists = $this->showroom_model->checkIfShowroomNameExist($showroom_name);
		
		if($exists->num_rows >0)
		{
			$response = 2;
		}
		else
		{
			//INSERT THE NEW SHOWROOM
			$res = $this->showroom_model->insert_showroom($showroom_name,$state);
			if($res)
			{
				$response =  1;
			}
			else
			{
				$response = 0;
			}
		}
					
		// generate XML output
		header('Content-Type: text/xml');
		// generate XML header
		echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		// create the <response> element
		echo '<response>';
		echo $response;
		echo '</response>';	
		
	}
	
	public function deleteShowroom($showroom_id)
	{
		//LOAD THE MODEL
		
		$this->load->model('showroom_model');
		
		$delete = $this->showroom_model->updateStateOfShowroom($showroom_id, 2);
		
		if($delete)
		{
			$response = 1;
		}
		else 
		{
			$response = 2;
		}
		$this->generateResponse($response);
		
	}
	
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