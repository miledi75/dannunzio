<?php

class Showroom_model extends CI_Model
{
	/**
	 * loads the database core claass
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * returns all the showrooms
	 */
	public function getAllShowrooms()
	{
		$query = $this->db->get('tbl_artefact_type');
		return $query->result();
	}
	
	/**
	 * returns the number of art objects in each showroom
	 * @param unknown $artefact_type_id
	 */
	public function getNumberOfArtObjectsInShowroom($artefact_type_id)
	{
		$sql = "SELECT 
					COUNT(tbl_art_objects.title) as nr_of_artObjects
  				FROM 
					db_dannunzio.tbl_art_objects tbl_art_objects
  				WHERE 
					artefact_type_id=?";
		$query = $this->db->query($sql,array('artefact_type_id' => $artefact_type_id));
		return $query->result();
	}
}