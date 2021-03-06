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
	 * approve the customer
	 * @param unknown $user_id
	 */
	function approveCustomer($user_id)
	{
		$approved = $this->user_model->approveCustomer($user_id);
		if($approved)
		{
			redirect(base_url('admin/newCustomers/1'));
		}
		else
		{
			redirect(base_url('admin/newCustomers/2'));
		}
	}
	
	/**
	 * Adds a new user from the online store
	 */
	function newUserFromStore()
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
		$user_role_id = 3;
		$captchaCode = $this->input->post('captcha_code');
		
		$md5Password = md5($password);
		
		
		
		//user_role_id=4 because only buyers can register through the store
		$N_user = array('userName' => $username,'password' => $md5Password, 'email' => $email, 'user_role_id' => $user_role_id, 'approved' => 0);
		
		$N_address = array('street' => $street,'number' => $number, 'postal_code' => $postalcode, 'town' => $town, 'country' => $country);
		
		$N_user_data = array('name' => $name, 'surname' => $surname, 'cell_phone' => $cell);
		
		$insert = $this->user_model->insert_user_from_store($N_user,$N_address,$N_user_data);
		if($insert)
		{
			//register successful
			//LOG IN THE NEW USER
			$newdata = array(
					'username'  => $username,
					'email'     => $email,
					'logged_in' => TRUE
			);
				
			$this->session->set_userdata($newdata);
			$this->session->set_userdata('role', 'buyer');
			
			/**
			 * Check if the user is registering in order to checkout a sale
			 * if there are items in the shoppingcart
			 * the user should be redirected to the checkout page after registering
			 * as a new user
			 */
			if($this->cart->total_items() == 0)
			{
				redirect('pages/register/1');
			}
			else
			{
				redirect('processSales/checkoutSales/1');
			}
		}
		else
		{
			//register unsuccessful
			redirect('pages/register/2');
		}
	}
	
	/**
	 * adds a new Customer to the system
	 * this function gets called from the admin section
	 */
	function newCustomer()
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
				redirect('/admin/manageUsers/0/userCreated', 'refresh');
			}
			else //ADMIN OR SUBADMIN = REDIRECT TO USERS PAGE
			{
				redirect('/admin/manageUsers/0/userCreated', 'refresh');
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
		
		//LOOKUP USER CREDENTIALS
		$credentials = $this->user_model->get_user_credentials($login,$password);
		
		
		if(md5($password) == $credentials[0]->password)
		{
			$response = 1;
			$newdata = array(
					'username'  => $credentials[0]->userName,
					'email'     => $credentials[0]->email,
					'user_id' 	=> $credentials[0]->user_id,	
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
	
	/**
	 * Logs out the user
	 */
	public function processLogout()
	{
		$this->session->sess_destroy();
		redirect('pages/home');
	}
	
	/**
	 * checks if username and email are available
	 * returns:
	 * 1 = username taken
	 * 2 = email taken
	 * 0 = go ahead
	 */
	function checkUserNameExists()
	{
		$userName = $this->input->get_post('userName');
		$email = $this->input->get_post('email');
		$countUsername = $this->user_model->countUsername($userName);
		
		if($countUsername[0]->total == 0) //USERNAME IS FREE
		{
			//CHECK IF EMAIL IS FREE
			$countUserEmail = $this->user_model->countUserEMail($email);
			if($countUserEmail[0]->total == 0) //EMAIL IS FREE
			{
				$message = 0;
				
			}
			else //EMAIL IS TAKEN
			{
				$message = 2;
			}
		}
		else //USERNAME IS TAKEN
		{
			$message = 1;
		}
		echo $message;
	}
	
	function deleteUser($user_id)
	{
		$delete = $this->user_model->deleteUser($user_id);
		if($delete)
		{
			redirect(base_url('admin/manageUsers/0/userDeleted'));
		}
		else
		{
			redirect(base_url('admin/manageUsers/0/nothing'));
		}
	}
	
	function deleteCustomer($user_id)
	{
		$delete = $this->user_model->deleteUser($user_id);
		if($delete)
		{
			redirect(base_url('admin/manageCustomers/0/userDeleted'));
		}
		else
		{
			redirect(base_url('admin/manageCustomers/0/nothing'));
		}
	}
	
}