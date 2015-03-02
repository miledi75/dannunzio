<?php
class admin extends CI_Controller
{
	public function view($page='home')
	{
		if(! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		{
			echo APPPATH.'views/admin/'.$page.'.php';
			//no page
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['pageTitle'] = "Admin page";
		$data['cat1'] = "Add new art object";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageArt()
	{
		$data['title'] = ucfirst($page); // Capitalize the first letter
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
