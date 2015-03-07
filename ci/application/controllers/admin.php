<?php
class admin extends CI_Controller
{
	public function home()
	{
		$data['pageTitle'] = "Admin page";
		$data['cat1'] = "Add new art object";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageArt()
	{
		
		$data['pageTitle'] = "Manage art collection";
		$data['cat1'] = "Add new art object";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageArt');
		$this->load->view('templates/adminFooter', $data);
	}
}

?>
