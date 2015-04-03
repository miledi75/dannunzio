<?php
class processSales extends CI_Controller
{
	/**
	 * ci-onstructor loads the database model.
	 */
	function __construct()
	{
		parent::__construct();
		
		//LOAD THE SHOPPINGCATR CLASS
		//$this->load->library('cart');
		
		//LOAD THE MODEL
		$this->load->model('sales_model');
	}
	
	/**
	 * adds an artobject to the shoppingcart session
	 * called from AJAX function
	 */
	function addToShoppingCartSession()
	{
		$art_object_id =  $this->input->post('id');
		$price = $this->input->post('price');
		$title = $this->input->post('title');
		$artist = $this->input->post('artist');
		
		$data = array(
				'id'      => $art_object_id,
				'qty'     => 1,
				'price'   => $price,
				'name'    => $title,
				'artist'  =>  $artist
		);
		
		if($this->cart->insert($data))
		{
			$response = 1;
		}
		else
		{
			$response = 0;
		}
		echo $response;
	}
	
	
	/**
	 * removes an artobject from the shoppingcart session
	 * @param unknown $art_object_id
	 */
	function removeFromShoppingCartSession()
	{
		$art_object_id =  $this->input->post('id');
		
		//run through the shoppingcart items and set the quantity to 0
		$response = 0;
		foreach ($this->cart->contents() as $item)
		{
			if($item['id'] == $art_object_id)
			{
				$data = array(
					'rowid'   => $item['rowid'],
					'qty'     => 0
				);
				$this->cart->update($data);
				$response = 1;
			}	
		}
		echo $response;
	}
	
	function checkoutSales()
	{
		//CHECK IF LOGGED IN
		if ($this->session->userdata('logged_in') == 0)
		{
			$this->load->view('templates/header');
			echo "You need to log in";
			$this->load->view('templates/footer');
			
		}
		else
		{
			//DISPLAY THE SUMMARY
			$this->load->view('templates/header');
			$this->load->view('pages/checkout');
			$this->load->view('templates/footer');
		}
	}
	
	/**
	 * returns the number of items in the shoppingcart
	 */
	function nrOfItemsInShoppingCart()
	{
		$response = $this->cart->total_items();

		echo $response;
	}
	
	
}