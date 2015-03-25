<?php
class Period_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	function getPeriods()
	{
		$query = $this->db->get('tbl_art_period');
		return $query->result();
	}
}