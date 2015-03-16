<?php
class pages extends CI_Controller
{
	/*public function view($page='home')
	{
		if(! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			echo APPPATH.'views/pages/'.$page.'.php';
			//no page
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
		//test homepage
		//don't load the header and footer template
		if($page == "copyHome")
		{
			$this->load->view('pages/'.$page, $data);
		}
		else
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}	
		
	}*/
	
	public function landing()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$this->load->view('pages/landing', $data);
	}
	
	
	public function home()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";

		//test homepage
		//don't load the header and footer template
		$this->load->view('templates/header', $data);
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function paintings()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";

		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/paintings', $data);
		//$this->load->view('pages/copyHome', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function sculptures()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";

		$this->load->view('templates/header', $data);
		$this->load->view('pages/sculptures', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function lithos()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/lithos', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function information()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
	
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/information', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function location()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
	
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/location', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function events()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
	
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/events', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function artists()
	{
		$data['shopName'] = "D'annunzio art gallery";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
	
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/artists', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>
