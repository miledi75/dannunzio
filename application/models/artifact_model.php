<?php
class Artifact_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	function getArtifacts()
	{
		$query = $this->db->get('tbl_artefact_type');
		return $query->result();
	}
}