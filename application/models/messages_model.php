<?php

class Messages_model extends CI_Model
{
	/**
	 * loads the database core claass
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * gets all the unread messages
	 * @return string
	 */
	public function getNewMessages()
	{
		$this->db->where('read',0);
		return $this->db->get('tbl_messages')->result();
	}
	
	/**
	 * gets all the messages
	 * @return string
	 */
	public function getAllMessages()
	{
		return $this->db->get('tbl_messages')->result();
	}
	
	public function insertMessage($from,$title,$body)
	{
		$data = array
		(
				'from' 		=> $from,
				'title' 	=> $title,
				'body'		=> $body
		);
		return $this->db->insert('tbl_messages',$data);
	}
	
}