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
	
	/**
	 * updates an event
	 * @param unknown $eventId
	 * @param unknown $eventName
	 * @param unknown $date
	 * @param unknown $max
	 * @return  boolean
	 */
	public function updateEvent($eventId,$eventName,$date,$max)
	{
		$data = array(
				'event_name' => $eventName,
				'max_allowed' => $max,
				'date' => $date
		);
		
		$this->db->where('event_id', $eventId);
		return $this->db->update('tbl_events', $data);
	}
	
	/**
	 * gets the registrations of an event
	 * @param unknown $event_id
	 */
	public function getRegistrations()
	{
		$sql = "SELECT tbl_events.event_name,
			       tbl_user_data.name,
			       tbl_user_data.surname,
			       tbl_users.email,
			       tbl_events_registration.nr_of_persons,
				   tbl_events_registration.event_id
  				FROM ((db_dannunzio.tbl_user_data tbl_user_data
		         INNER JOIN db_dannunzio.tbl_users tbl_users
		            ON (tbl_user_data.user_id = tbl_users.user_id))
		        INNER JOIN
		        db_dannunzio.tbl_events_registration tbl_events_registration
		           ON (tbl_events_registration.user_id = tbl_user_data.user_id))
		       INNER JOIN db_dannunzio.tbl_events tbl_events
		          ON (tbl_events_registration.event_id = tbl_events.event_id)";
		$query = $this->db->query($sql);
		return $query->result();
	}
}
?>