<?php
class processSales extends CI_Controller
{
	/**
	 * ci-onstructor loads the database model.
	 */
	function __construct()
	{
		parent::__construct();
		
		//LOAD THE SALES MODEL
		$this->load->model('sales_model');
		
		//LOAD SHOWROOM MODEL
		$this->load->model('showroom_model');
		$this->artifacts = $this->showroom_model->getPublishedShowrooms();
		
		//LOAD ARTOBJECT MODEL
		$this->load->model('showroom_model');
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
		
		//LOCK ITEM IN DATABASE
		$locked = $this->sales_model->update_lock_artObject($art_object_id,1);
		 
		
		if($locked)
		{
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
		
	}
	
	
	/**
	 * removes an artobject from the shoppingcart session
	 * @param unknown $art_object_id
	 */
	function removeFromShoppingCartSession()
	{
		$art_object_id =  $this->input->post('id');
		
		//RELEASE THE ARTOBJECT LOCK
		$locked = $this->sales_model->update_lock_artObject($art_object_id,0);
		
		//run through the shoppingcart items and set the quantity to 0
		$response = 0;
		
		
		if($locked)
		{
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
		}
		
		echo $response;
	}
	
	/**
	 * registers the sale for approval
	 * 
	 */
	function saleFinished()
	{
		$user_id = $this->session->userdata('user_id');
		$success = true;
		foreach ($this->cart->contents() as $item)
		{
			if(!$this->sales_model->registerSale($user_id,$item['id']))
			{
				$success = false;
			}
			else
			{
				if(!$this->sales_model->update_sold_status_artobject($item['id'], 1))
				{
					$success = false;
				}
			}
		}
		if($success)
		{
			//DESTROY THE CART SESSION
			$this->cart->destroy();
			
			$data['shopName'] = "Checkout finished";
			$data['types'] = array();
			
			$data['message'] = "Your sale request has been registered and will be reviewed by our curator as soon as possible. Thank you for your trust in our art gallery";
			
			$this->load->view('templates/header',$data);
			$this->load->view('pages/sales');
			$this->load->view('templates/footer');
		}
	}
	
	
	/**
	 * checkout overview page
	 * @param number $message
	 */
	function checkoutSales($message = 0)
	{
		
		$data['shopName'] = "Check out your items";
		$data['types'] = array();
		
		switch ($message)
		{
			case 0:
				$data['message'] = 0;
				break;
			case 1:
				$data['message'] = "You have registered succesfully.";
			default:
				break;
		}
		//DISPLAY THE SUMMARY
		$this->load->view('templates/header',$data);
		$this->load->view('pages/checkout');
		$this->load->view('templates/footer');
	}
	
	/**
	 * returns the number of items in the shoppingcart
	 */
	function nrOfItemsInShoppingCart()
	{
		$response = $this->cart->total_items();

		echo $response;
	}
	
	/**
	 * approve the sale
	 * @param unknown $sale_id
	 */
	function approveSale($sale_id)
	{
		$approved = $this->sales_model->approveSale($sale_id);
		if($approved)
		{
			redirect("admin/manageSales/1");
		}
		else 
		{
			redirect("admin/manageSales/2");
		}
	}
	
	
}