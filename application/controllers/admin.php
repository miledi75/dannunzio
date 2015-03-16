<?php
class admin extends CI_Controller
{
	
	public function home()
	{
		$data['pageTitle'] = "Admin page";
		$data['newSales'] = "New sales registered";
		$data['newUsers'] = "New users to be approved";
		$data['newContactRequests'] = "New contact messages";
		
		
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
	
	public function manageCustomers()
	{
		$this->load->model('user_model');
		
		//GETTING THE customers
		$users = $this->user_model->get_customers();
		
		$data['pageTitle'] = "Manage customers";
		$data['customers'] = $users;
		$data['cat1'] = "Add customer";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
	
		
			
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageCustomers');
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageShowrooms()
	{
		$data['pageTitle'] = "Manage Showrooms";
		$data['cat1'] = "New showroom";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		

		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageShowrooms');
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageEvents()
	{
		$data['pageTitle'] = "Manage events";
		$data['cat1'] = "New event";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
	
	
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageEvents');
		$this->load->view('templates/adminFooter', $data);
	}
	
}

?>
