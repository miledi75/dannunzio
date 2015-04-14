<?php
class Event_model extends CI_Model
{
	/**
	 * loads the database core class
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	/*
	 * gets all the events
	 */
	public function getEvents()
	{
		return $this->db->get('tbl_events')->result();
	}
	
	/*
	 * inserts a new event
	 */
	public function insertEvent($eventName,$date,$max_allowed)
	{
		$data = array(
				'event_name' 		=> $eventName,
				'date'				=> $date,
				'max_allowed'		=> $max_allowed
		);
		
		return $this->db->insert('tbl_events', $data);
	}
	
	/**
	 * inserts an event registration
	 * @param unknown_type $user_id
	 * @param unknown_type $event_id
	 * @param unknown_type $nr_of_persons
	 */
	public function registerEvent($user_id,$event_id,$nr_of_persons)
	{
		$data = array(
				'user_id' 			=> $user_id,
				'event_id'			=> $event_id,
				'nr_of_persons'		=> $nr_of_persons
		);
		
		return $this->db->insert('tbl_events_registration', $data);
	}
}
?>