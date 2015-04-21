<?php
class tests extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('user_model');
	}
	
	function runTests()
	{
		
		$test = $this->user_model->getArtists();
		$this->run($test, 'is_array', 'get_artists');
		$test = $this->user_model->findCustomer('cle');
		$this->run($test, 'is_array', 'find_customers');
		$test = $this->user_model->getUsers(10,0);
		$this->run($test, 'is_array', 'get_users');
		$test = $this->user_model->countUsers();
		$this->run($test, 'is_array', 'count_users');
		$test = $this->user_model->countCustomers();
		$this->run($test, 'is_int', 'Count Customers');
		$test = $this->user_model->getCustomers(10,0);
		$this->run($test, 'is_array', 'get_customers');
		$test = $this->user_model->getNewCustomers();
		$this->run($test, 'is_array', 'get new customers');
		
		
		
		
	}
	
	private function run($test,$expected,$testName)
	{
		$this->unit->run($test, $expected, $testName);
		echo $this->unit->report();
	}
}