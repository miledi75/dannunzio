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
		
		
	}
	
	private function run($test,$expected,$testName)
	{
		$this->unit->run($test, $expected, $testName);
		echo $this->unit->report();
	}
}