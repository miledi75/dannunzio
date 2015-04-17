<?php
class pages extends CI_Controller
{
	
	private $artifacts;
	
	
	/**
	 * initialize online store variables by artefact type
	 */
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//LOAD SHOWROOM MODEL
		$this->load->model('showroom_model');
		$this->artifacts = $this->showroom_model->getPublishedShowrooms();
		
	}
	
	function register($message=0)
	{
		
		if($message == 1)//register successful
		{
			$data['shopName'] = "D'annunzio art gallery";
			$data['types'] = $this->artifacts;
			$data['message'] = "You have registered succesfully.";
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer', $data);
		}
		elseif ($message == 2) //register failed
		{
			$data['shopName'] = "Register as a customer";
			$data['types'] = array();
			$data['message'] = "There has been an issue, please try again.";
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register', $data);
			$this->load->view('templates/footer', $data);
		}
		else 
		{
			$data['shopName'] = "Register as a customer";
			$data['types'] = array();
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register', $data);
			$this->load->view('templates/footer', $data);
		}
		
		
	}
	
	
	public function landing()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$this->load->view('pages/landing', $data);
	}
	
	
	public function home()
	{
		//LOAD THE ARTOBJECTS MODEL
		
		$this->load->model('artobject_model');
		
		$images = $this->artobject_model->getImagesForSLideshow();
		
		$data['images'] = $images;
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
		//$data['message'] = 0;
		/**$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";**/
		
		
		//test homepage
		//don't load the header and footer template
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function store($showroom)
	{
		
		$this->load->model('artobject_model');
		$artObjects = $this->artobject_model->getArtObjectsByArtefactType($showroom);
		
		
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
		$data['artObjects'] = $artObjects;
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/showroom', $data);
		//$this->load->view('pages/copyHome', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
	
	public function information()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
	
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/information', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function location()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
	
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/location', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function events($message = 0)
	{
		//LOAD THE EVENT MODEL
		$this->load->model('event_model');
		//GET THE EVENTS
		$data['events'] = $this->event_model->getEvents();
		$user_id = $this->session->userdata('user_id');
		$registered_events = array();
		foreach($data['events'] as $event)
		{
			if($this->event_model->checkIfRegistered($user_id,$event->event_id))
			{
				$registered_events[] = $event->event_id;
			}
		}
		
		$data['registeredEvents'] = $registered_events;
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
		if($message == 1)
		{
			$data['messageSuccess'] = "You are registered for this event.";	
		}
		elseif($message == 2)
		{
			$data['messageFailed'] = "Your registration failed! Please try again.";
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/events', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function artists()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
	
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/artists', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>
