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
		return $this->db->get('tbl_sales').result();
	}
	
	/**
	 * gets the sales corresponding to the flag
	 * 0 = all unapproved sales
	 * 1 = all approved sales
	 * 2 = all closed sales
	 * to get all sales use function getAllSales()
	 * @param unknown $flag
	 * @return string
	 */
	function getSales($flag)
	{

		switch ($flag)
		{
			case 0:
				$this->db->where('approved',0);
				break;
			case 1:
				$this->db->where('approved',1);
				break;
			case 2:
				$this->db->where('closed',1);
				break;
		}
		
		return $this->db->get('tbl_sales')->result();
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
	
	/**
	 * inserts the sale in the database for approval
	 */
	function insertSale($user_id,$art_object_id)
	{
		$data = array
		(
			'user_id' 		=> $user_id,
			'art_object_id' => $art_object_id
		);
		return $this->db->insert('tbl_sales',$data);
	}
	
	
	
}