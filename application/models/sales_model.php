<?php

class Sales_model extends CI_Model
{
	/**
	 * loads the database core claass
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * gets all the sales in the sales table
	 * @return string
	 */
	function getAllSales()
	{
		return $this->db->get().results();
	}
	
	/**
	 * gets all the sales that haven't been approved yet
	 * @return string
	 */
	function getNewSales()
	{
		$this->db->where('approved',0);
		return $this->db->get().results();
	}
	
	/**
	 * registers the sale for approval
	 * @param unknown $user_id
	 * @param unknown $art_object_id
	 */
	function registerSale($user_id, $art_object_id)
	{
		$data = array(
				'user_id' 		=> $user_id,
				'art_object_id'	=> $art_object_id
		);
		
		return $this->db->insert('tbl_sales', $data);
	}
	
	
	
}