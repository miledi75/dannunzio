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
	
	public function manageArt($action = 'nothing')
	{
		//HANDLE NOTIFICATIONS
		
		if($action == 'artObjectCreated')
		{
			$data['artObjectCreated'] = true;
		}
		else
		{
			$data['artObjectCreated'] = false;
		}
		
		if($action == 'artObjectCreatedFailed')
		{
			$data['artObjectCreatedFailed'] = true;
		}
		else
		{
			$data['artObjectCreatedFailed'] = false;
		}
		
		//LOAD THE DBASE MODELS
		$this->load->model('artifact_model');
		$this->load->model('period_model');
		$this->load->model('user_model');
		
		
		//GET ARTEFACT TYPE
		$artifacts = $this->artifact_model->getArtifacts();
		
		//GET ART PERIODS
		$periods = $this->period_model->getPeriods();
		
		//GET ARTIST
		$artists = $this->user_model->getArtists();
		
		$data['pageTitle'] = "Manage art collection";
		$data['cat1'] = "Add new art object";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		$data['artifacts'] = $artifacts;
		$data['periods'] = $periods;
		$data['artists'] = $artists;
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageArt');
		$this->load->view('templates/adminFooter');
	}
	
	public function manageCustomers($page=0,$action='nothing')
	{
		$this->load->model('user_model');
		
		
		//COUNTING THE CUSTOMERS
		
		$num_of_customers = $this->user_model->countCustomers();
		
		$this->load->library('pagination');
		
		$config['base_url'] = 'http://localhost/ci/admin/manageCustomers/';
		$config['total_rows'] = $num_of_customers;
		$config['per_page'] = 8;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		
		//GETTING THE customers
		$users = $this->user_model->getCustomers($config["per_page"], $page);
		
		$data['pageTitle'] = "Manage customers";
		$data['customers'] = $users;
		$data['cat1'] = "Add customer";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		
		$data["links"] = $this->pagination->create_links();
		
		if($action =='userCreated')
		{
			$data['userCreated'] = true;
		}
		else
		{
			$data['userCreated'] = false;
		}
	
		
			
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageCustomers');
		
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageUsers($page=0,$action='nothing')
	{
		$this->load->model('user_model');
		
		//COUNTING THE CUSTOMERS
	
		$num_of_customers = $this->user_model->countUsers();
	
		$this->load->library('pagination');
	
		$config['base_url'] = base_url('admin/manageUsers/');
		$config['total_rows'] = $num_of_customers;
		$config['per_page'] = 8;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
	
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
	
		//GETTING THE customers
		$users = $this->user_model->getUsers($config["per_page"], $page);
	
		$data['pageTitle'] = "Manage Users";
		$data['customers'] = $users;
		$data['cat1'] = "Add User";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
	
		$data["links"] = $this->pagination->create_links();
	
		if($action =='userCreated')
		{
			$data['userCreated'] = true;
		}
		else
		{
			$data['userCreated'] = false;
		}
	
	
			
	
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageUsers');
	
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
