<?php
class pages extends CI_Controller
{
	public function view($page='home')
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
		//$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		//$this->load->view('templates/footer', $data);
	}
}

?>
