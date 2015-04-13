<?php
class processUser extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//LOAD DBASE MODEL
		$this->load->model('user_model');
		
	}
	
	
	/**
	 * Adds a new user from the online store
	 */
	function newUserFromStore()
	{
		var_dump($this->input->post());
		
		//GET POST VARS
		
		$name = $this->input->post('newFirstName');
		$surname = $this->input->post('newName');
		$email = $this->input->post('newEmail');
		$password = $this->input->post('newPassword');
		$controlPassword = $this->input->post('newControlPassword');
		$captchaCode = $this->input->post('captcha_code');
		
		//user_role_id=4 because only buyers can register through the store
		$N_user = array('userName' => $email,'password' => $password, 'email' => $email, 'user_role_id' => 4);
		
	}
	/**
	 * adds a new user to the system
	 * this function gets called from the admin section
	 */
	function newUser()
	{
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
	
	
	/**
	 * processes user login
	 * @param unknown $login
	 * @param unknown $password
	 */
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
			//SETTING THE USER ROLE IN THE SESSION
			$role = $credentials[0]->user_role_id;
			switch($role)
			{
				case 1:
					//ADMIN
					$this->session->set_userdata('role', 'admin');
					break;
				case 2:
					$this->session->set_userdata('role', 'subadmin');
					break;
				case 3:
					$this->session->set_userdata('role', 'buyer');
					break;
				case 4:
					$this->session->set_userdata('role', 'artist');
					break;
			}
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
	
	public function processLogout()
	{
		$this->session->sess_destroy();
		redirect('pages/home');
	}
}