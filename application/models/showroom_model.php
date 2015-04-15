<?php

class Showroom_model extends CI_Model
{
	/**
	* loads the database core class
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
	
	/*
	 * gets all the non archived artobjects
	 * 1 = published
	 * 0 = not published
	 */
	public function getActiveShowrooms()
	{
		$this->db->where('state',1);
		$this->db->or_where('state',0);
		$query = $this->db->get('tbl_artefact_type');
		return $query->result();
	}
	
	public function getPublishedShowrooms()
	{
		$this->db->where('state',1);
		
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
	
	/**
	 * inserts a new showroom
	 * @param unknown_type $showroom_name
	 * @param unknown_type $state
	 */
	public function insert_showroom($showroom_name,$state)
	{
		$data = array(
				'artefact_type' => $showroom_name,
				'state'		=> $state
		);
		
		return $this->db->insert('tbl_artefact_type', $data);
	}
	
	/**
	 * delete a showroom through archiving function
	 * @param unknown_type $showroom_id
	 * @param integer type $state
	 * state = 0 inactive
	 * state = 1 active
	 * state = 2 archived
	 */
	public function updateStateOfShowroom($showroom_id, $state)
	{
		$data = array(
				'state' => $state
					);
		
		$this->db->where('artefact_type_id', $showroom_id);
		$this->db->update('tbl_artefact_type', $data);
		return $this->db->affected_rows();
	}
	
	/**
	 * updates the showroom name
	 * @param unknown_type $showroom_id
	 * @param unknown_type $showroom_name
	 */
	public function editShowroomName($showroom_id, $showroom_name)
	{
		$data = array(
				'artefact_type' => $showroom_name
		);
		
		$this->db->where('artefact_type_id', $showroom_id);
		$this->db->update('tbl_artefact_type', $data);
		return $this->db->affected_rows();
	}
	
	/**
	 * checks if showroom name exists
	 * @param unknown_type $showroom_name
	 */
	public function checkIfShowroomNameExist($showroom_name)
	{
		$this->db->where('artefact_type',$showroom_name);
		$this->db->where('state',1);
		return $this->db->get('tbl_artefact_type');
	}
}