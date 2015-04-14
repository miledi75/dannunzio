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
	public function getUnreadMessages()
	{
		$this->db->where('read',0);
		return $this->db->get('tbl_messages').result();
	}
	
	/**
	 * gets all the messages
	 * @return string
	 */
	public function getAllMessages()
	{
		return $this->db->get('tbl_messages').result();
	}
	
}