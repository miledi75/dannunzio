<?php
class processUser extends CI_Controller
{
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
		
		var_dump($postVars);
		
		$N_user = array('userName' => $username,'password' => $password, 'email' => $email, 'user_role_id' => 3);
		
		$N_address = array('street' => 'langestraat','number' => 69, 'postal_code' => '9000', 'town' => 'Ghent', 'country' => 'BE');
		
		$N_user_data = array('name' => 'Kristof', 'surname' => 'Cleymans', 'cell_phone' => '046986532');
		
		$insert = $this->user_model->insert_user($N_user,$N_address,$N_user_data);
		if($insert)
		{
			echo "user inserted";
		}
	}
}