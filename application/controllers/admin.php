<?php
class admin extends CI_Controller
{
	public function home()
	{
		//LOAD THE SALES MODEL
		$this->load->model('sales_model');
		//LOAD THE USER MODEL
		$this->load->model('user_model');
		//LOAD THE MESSAGES MODEL
		$this->load->model('messages_model');
		
		$data['pageTitle'] = "Admin page";
		
		//GET THE UNAPPROVED SALES
		$data['newSales'] = $this->sales_model->getSales(0);
		//GET THE NEW CUSTOMERS
		$data['newCustomers'] = $this->user_model->getNewCustomers();
		//GET THE NEW MESSAGES
		$data['newMessages'] = $this->messages_model->getNewMessages();
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/adminFooter', $data);
	}
	
	
	/**
	 * logic for the manage art admin page
	 * @param unknown_type $page
	 * @param unknown_type $action
	 */
	public function manageArt($page=0,$action='nothing')
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
		
		if($action == 'artObjectDeleted')
		{
			$data['artObjectDeleted'] = true;
		}
		else
		{
			$data['artObjectDeleted'] = false;
		}
		
		if($action == 'artObjectDeletedFailed')
		{
			$data['artObjectDeletedFailed'] = true;
		}
		else
		{
			$data['artObjectDeletedFailed'] = false;
		}
		
		if($action == 'artObjectEditedFailed')
		{
			$data['artObjectEditedFailed'] = true;
		}
		else
		{
			$data['artObjectEditedFailed'] = false;
		}
		if($action == 'artObjectEdited')
		{
			$data['artObjectEdited'] = true;
		}
		else
		{
			$data['artObjectEdited'] = false;
		}
		// END NOTIFICATIONS
		
		//LOAD THE DBASE MODELS
		$this->load->model('showroom_model');
		$this->load->model('period_model');
		$this->load->model('user_model');
		$this->load->model('artobject_model');
		
		
		//GET ARTEFACT TYPE
		$artifacts = $this->showroom_model->getAllShowrooms();
		
		//GET ART PERIODS
		$periods = $this->period_model->getPeriods();
		
		//GET ARTIST
		$artists = $this->user_model->getArtists();
		
		
		
		//SET UP THE PAGINATION
		
		//COUNTING THE ART OBJECTS
		
		$num_of_artObjects = $this->artobject_model->countArtObjects();
		
		$this->load->library('pagination');
		
		
		$config['base_url'] = base_url('/admin/manageArt/');
		$config['total_rows'] = $num_of_artObjects;
		$config['per_page'] = 8;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		
		//GET THE ART OBJECT LIST
		
		$art_objects = $this->artobject_model->getAllArtObjects($config["per_page"], $page);
		
		
		//CREATE THE PAGES LINKS
		$data["links"] = $this->pagination->create_links();
		//END PAGINATION SETUP
		
		$data['pageTitle']		= "Manage art collection";
		$data['cat1'] 			= "Add new art object";
		$data['cat2'] 			= "empty";
		$data['cat3'] 			= "empty";
		$data['artifacts'] 		= $artifacts;
		$data['periods'] 		= $periods;
		$data['artists'] 		= $artists;
		$data['art_objects'] 	= $art_objects;
		
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
		
		
		$config['base_url'] = base_url('/admin/manageCustomers/');
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
		
		//CREATE THE PAGES LINKS
		$data["links"] = $this->pagination->create_links();
		
		if($action =='userCreated')
		{
			$data['userCreated'] = true;
		}
		else
		{
			$data['userCreated'] = false;
		}
	
		
			
		//LOAD THE VIEWS
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
		//LOAD THE DATABASE
		
		$this->load->model('showroom_model');
		
		//GET THE SHOWROOMS
		$showrooms = $this->showroom_model->getActiveShowrooms();
		
		//GET THE NR OF ARTOBJECTS IN A SHOWROOM
		$ar_showrooms = array();
		$i = 0;
		foreach ($showrooms as $showroom)
		{
			$nr_of_artObjects = $this->showroom_model->getNumberOfArtObjectsInShowroom($showroom->artefact_type_id);
			
			$ar_showrooms[$i]['showroom_name'] = $showroom->artefact_type;
			$ar_showrooms[$i]['showroom_id'] = $showroom->artefact_type_id;
			$ar_showrooms[$i]['showroom_nr_of_items'] = $nr_of_artObjects[0]->nr_of_artObjects;
			switch ($showroom->state)
			{
				case 1:
					$ar_showrooms[$i]['state'] = 'Published';
					break;
				case 0:
					$ar_showrooms[$i]['state'] = 'Not published';
					break;
							
			}
			
			$i++;
		}
		
		$data['pageTitle'] = "Manage Showrooms";
		$data['cat1'] = "New showroom";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		$data['showrooms'] = $ar_showrooms;

		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageShowrooms');
		$this->load->view('templates/adminFooter', $data);
	}
	
	
	/**
	 * 
	 */
	function manageSales($message = 0)
	{
		$data['pageTitle'] = "Manage new sales";
		
		//LOAD THE SALES MODEL
		$this->load->model('sales_model');
		
		//SET THE NOTIFICATIONS
		if($message == 1) //success
		{
			$data['messageSuccess'] = "Sale has been approved";
		}
		elseif($message == 2)
		{
			$data['messageFailed'] = "Sale approval failed";
		}
		
		
		$data['newSales'] = $this->sales_model->getUnapprovedSalesInfo();

		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/newSales');
		$this->load->view('templates/adminFooter', $data);
	}
	
	/**
	 * event managment homepage
	 * @param number $message
	 */
	public function manageEvents($message=0)
	{
		//LOAD THE MODEL
		$this->load->model('event_model');
		//GET THE EVENTS
		$data['events'] = $this->event_model->getEvents();
		//GET THE REGISTRATIONS
		//LOAD THE MODEL
		$this->load->model('event_model');
	
		$data['registrants'] = $this->event_model->getRegistrations();
		
		//SET UP NOTIFICATIONS
		if($message == 1)
		{
			$data['messageSuccess'] = "Event created succesfully";
		}
		elseif ($message == 2)
		{
			$data['messageFailed'] = "Event creation failed!";
		}
		elseif ($message == 3)
		{
			$data['eventDeleted'] = "Event deleted";
		}
		elseif ($message == 4)
		{
			$data['eventDeletedFailed'] = "Event deletion failed!";
		}
		elseif ($message == 5)
		{
			$data['eventUpdated'] = "Event Updated";
		}
		elseif ($message == 6)
		{
			$data['eventUpdatedFailed'] = "Event update failed!";
		}
		
		
		
		$data['pageTitle'] = "Manage events";
		$data['cat1'] = "New event";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageEvents');
		$this->load->view('templates/adminFooter', $data);
	}
	
}