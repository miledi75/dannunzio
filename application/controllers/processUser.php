<?php
class processUser extends CI_Controller
{
	
	/**
	 * ads a new user to the system
	 * this function gets called from the admin section
	 */
	function newUser()
	{
		/**POST VARS
		 * array (size=12)
  'name' => string 'KKris' (length=5)
  'surname' => string 'cil' (length=3)
  'email' => string 'cil@cil.com' (length=11)
  'cell' => string '321654' (length=6)
  'username' => string 'kris' (length=4)
  'password' => string 'kris' (length=4)
  'password2' => string 'kris' (length=4)
  'street' => string 'kikvorsstraat' (length=13)
  'number' => string '22' (length=2)
  'postalcode' => string '9000' (length=4)
  'town' => string 'gent' (length=4)
  'country' => string 'be' (length=2)
		 */
				
		//LOAD DBASE MODEL
		$this->load->model('user_model');
		
		
		//GET POST VARS
		
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$cell = $this->input->post('cell');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$street = $this->input->post('street');
		$number = $this->input->post('number');
		$postalcode = $this->input->post('postalcode');
		$town = $this->input->post('town');
		$country = $this->input->post('country');
		$user_role_id = $this->input->post('user_role_id');
		
		
		
		$N_user = array('userName' => $username,'password' => $password, 'email' => $email, 'user_role_id' => $user_role_id);
		
		$N_address = array('street' => $street,'number' => $number, 'postal_code' => $postalcode, 'town' => $town, 'country' => $country);
		
		$N_user_data = array('name' => $name, 'surname' => $surname, 'cell_phone' => $cell);
		
		$insert = $this->user_model->insert_user($N_user,$N_address,$N_user_data);
		if($insert)
		{
			//ARTIST OR BUYER = REDIRECT TO CUSTOMER PAGE
			if($user_role_id == 3 || $user_role_id == 4) 
			{
				redirect('/admin/manageCustomers/0/userCreated', 'refresh');
			}
			else //ADMIN OR SUBADMIN = REDIRECT TO USERS PAGE
			{
				redirect('/admin/manageCustomers/0/userCreated', 'refresh');
			}
		}
	}
	
	
	function processLogin($login, $password)
	{
		//LOAD THE LIBRARY
		$this->load->model('user_model');
		//LOOKUP USER CREDENTIALS
		$credentials = $this->user_model->get_user_credentials($login,$password);
		
		
		if(md5($password) == $credentials[0]->password)
		{
			$response = 1;
			$newdata = array(
					'username'  => $credentials[0]->userName,
					'email'     => $credentials[0]->email,
					'logged_in' => TRUE
			);
				
			$this->session->set_userdata($newdata);
		}
		else
		{
			$response = 0;
		}
		
		// we'll generate XML output
		header('Content-Type: text/xml');
		// generate XML header
		echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		// create the <response> element
		echo '<response>';
		echo $response;		
		echo '</response>';
	}
}