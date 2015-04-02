<?php
class processSales extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		//LOAD THE SHOPPINGCATR CLASS
		$this->load->library('cart');
		
		//LOAD THE MODEL
		$this->load->model('sales_model');
	}
	
	function addToShoppingCartSession()
	{
		
		var_dump($this->input->post());
		
		$data = array(
				'id'      => $art_object_id,
				'qty'     => 1,
				'price'   => $price,
				'name'    => $title,
				'options' => array('artist' => $artist)
		);
		
		if($this->cart->insert($data))
		{
			$response = 1;
		}
		else
		{
			$response = 0;
		}
	}
}