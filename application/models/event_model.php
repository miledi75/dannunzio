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
	 * deletes an event from the database
	 * @param unknown $eventId
	 */
	public function deleteEvent($eventId)
	{
		$this->db->where('event_id', $eventId);
		$this->db->delete('tbl_events');
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
	
	/**
	 * checks if user is already registered
	 * @param unknown_type $user_id
	 * @param unknown_type $event_id
	 */
	public function checkIfRegistered($user_id,$event_id)
	{
		$sql = "SELECT 
				count(user_id) as total 
				FROM tbl_events_registration 
				WHERE user_id=? AND event_id=?";
		$query = $this->db->query($sql,array('user_id' => $user_id,'event_id' => $event_id));
		return $query->result()[0]->total;
	}
}
?>