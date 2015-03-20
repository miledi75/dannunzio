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
		//LOAD ARTEFACT MODEL
		$this->load->model('artifact_model');
		$this->artifacts = $this->artifact_model->getArtifacts();
		
	}
	
	public function landing()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$this->load->view('pages/landing', $data);
	}
	
	
	public function home()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
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
		$paintings = $this->artobject_model->getArtObjectsByArtefactType($showroom);
		
		
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
		$data['paintings'] = $paintings;
		
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
	

	public function events()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['types'] = $this->artifacts;
	
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
