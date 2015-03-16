<?php
class processUser extends CI_Controller
{
	function newUser()
	{
		//LOAD DBASE MODEL
		$this->load->model('user_model');
		
		
		$N_user = array('userName' => 'kriscl','password' => 'kriscl', 'email' => 'kriscl@kris.com', 'user_role_id' => 3);
		
		$N_address = array('street' => 'langestraat','number' => 69, 'postal_code' => '9000', 'town' => 'Ghent', 'country' => 'BE');
		
		$N_user_data = array('name' => 'Kristof', 'surname' => 'Cleymans', 'cell_phone' => '046986532');
		
		$insert = $this->user_model->insert_user($N_user,$N_address,$N_user_data);
		if($insert)
		{
			
		}
	}
}