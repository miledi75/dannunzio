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
		$data['pageTitle'] = "Art gallery admin page";
		$data['cat1'] = "Paintings";
		$data['cat2'] = "Sculptures";
		$data['cat3'] = "Lithos";
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/adminFooter', $data);
	}
}

?>
