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
	

	function getUnapprovedSalesInfo()
	{
		$sql = "SELECT tbl_art_objects.title,
			       tbl_art_objects.description,
			       tbl_user_data.name,
			       tbl_user_data.surname,
			       tbl_users.email,
			       tbl_sales.sales_id
  				FROM ((db_dannunzio.tbl_users tbl_users
		       INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
		            ON (tbl_users.user_id = tbl_user_data.user_id))
		       INNER JOIN db_dannunzio.tbl_sales tbl_sales
		           ON (tbl_sales.user_id = tbl_users.user_id))
		       INNER JOIN db_dannunzio.tbl_art_objects tbl_art_objects
		          ON (tbl_sales.art_object_id = tbl_art_objects.art_object_id)
		          WHERE tbl_sales.approved = 0";
		return $this->db->query($sql)->result();
			
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
	
	/**
	 * sets the approved flag in the sales database
	 * this means that a sale has been approved by an admin
	 * and can be processed financially
	 * @param unknown_type $sales_id
	 */
	function approveSale($sales_id)
	{
		$data = array(
				
				'approved' => 1
		);
		
		$this->db->where('sales_id', $sales_id);
		return $this->db->update('tbl_sales', $data);
	}
}