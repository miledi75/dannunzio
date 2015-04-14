<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	/**
	 * gets all the active users from the db
	 */
	public function getArtists()
	{
	
		$sql = "SELECT tbl_users.user_id,
		tbl_user_data.surname,
		tbl_user_data.name,
		tbl_user_roles.user_role,
		tbl_users.email
		FROM (db_dannunzio.tbl_users tbl_users
		INNER JOIN db_dannunzio.tbl_user_roles tbl_user_roles
		ON (tbl_users.user_role_id = tbl_user_roles.user_role_id))
		INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
		ON (tbl_users.user_id = tbl_user_data.user_id)
		WHERE (tbl_users.archived = 0)
		AND
		(tbl_users.user_role_id =4)";
	
		$query = $this->db->query($sql);
	
		return $query->result();
	
	}
	
	
	
	
	/**
	 * gets all the active users from the db
	 */
	public function getUsers($limit,$start)
	{
		
	$sql = "SELECT tbl_users.user_id,
       tbl_user_data.surname,
       tbl_user_data.name,
       tbl_user_roles.user_role,
       tbl_users.email
  		FROM (db_dannunzio.tbl_users tbl_users
        INNER JOIN db_dannunzio.tbl_user_roles tbl_user_roles
           ON (tbl_users.user_role_id = tbl_user_roles.user_role_id))
       INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          ON (tbl_users.user_id = tbl_user_data.user_id)
		AND (tbl_users.archived = 0) LIMIT $limit offset $start";
		
		$query = $this->db->query($sql);
		
		return $query->result();
		
	}
	
	/**
	 * count all the users for pagination
	 */
	public function countUsers()
	{
		return $this->db->count_all("tbl_users");
	}
	
	/**
	 * count all the customers for pagination
	 */
	public function countCustomers()
	{
		//GETTING THE CUSTOMERS (BUYERS AND ARTISTS, 3 AND 4)
		
		$sql = 'SELECT tbl_users.user_id,
       tbl_user_data.surname,
       tbl_user_data.name,
       tbl_user_roles.user_role,
       tbl_users.email
  		FROM (db_dannunzio.tbl_users tbl_users
        INNER JOIN db_dannunzio.tbl_user_roles tbl_user_roles
           ON (tbl_users.user_role_id = tbl_user_roles.user_role_id))
       INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          ON (tbl_users.user_id = tbl_user_data.user_id)
		WHERE (tbl_users.user_role_id =? OR tbl_users.user_role_id =?)
		AND (tbl_users.archived = 0)';
		
		$query = $this->db->query($sql,array(3,4));
		
		return $query->num_rows();
	}
	/**
	 * gets all the active customers from db
	 */
	public function getCustomers($limit,$start)
	{
	
		//GETTING THE CUSTOMERS (BUYERS AND ARTISTS, 3 AND 4)
		$this->db->limit($limit,$start);
		$sql = "SELECT tbl_users.user_id,
       tbl_user_data.surname,
       tbl_user_data.name,
       tbl_user_roles.user_role,
       tbl_users.email
  		FROM (db_dannunzio.tbl_users tbl_users
        INNER JOIN db_dannunzio.tbl_user_roles tbl_user_roles
           ON (tbl_users.user_role_id = tbl_user_roles.user_role_id))
       INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          ON (tbl_users.user_id = tbl_user_data.user_id)
		WHERE (tbl_users.user_role_id =? OR tbl_users.user_role_id =?)
		AND (tbl_users.archived = 0) LIMIT $limit offset $start";
		
		$query = $this->db->query($sql,array(3,4));
		
		return $query->result();
		
	}
	
	/**
	 * gets all the new customers that have to be approved
	 * = customers that registered on the website
	 */
	public function getNewCustomers()
	{
		$sql = "SELECT tbl_users.user_id,
		tbl_user_data.surname,
		tbl_user_data.name,
		tbl_user_roles.user_role,
		tbl_users.email
		FROM (db_dannunzio.tbl_users tbl_users
		INNER JOIN db_dannunzio.tbl_user_roles tbl_user_roles
		ON (tbl_users.user_role_id = tbl_user_roles.user_role_id))
		INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
		ON (tbl_users.user_id = tbl_user_data.user_id)
		WHERE approved=? ORDER BY tbl_user_data.surname";
		
		$query = $this->db->query($sql,array(0));
		
		return $query->result();
				
	}
	
	/**
	 * inserts a user in the database
	 * only called from the admin module
	 * @param unknown $ar_user
	 */
	public function insert_user($ar_user, $ar_user_adress, $ar_user_data)
	{
		//FILLING THE MAIN USER TABLE
		$sql_user = $this->db->insert_string('tbl_users', $ar_user);
		$query_user = $this->db->query($sql_user);
		
		if($query_user)
		{
			$user_id = $this->db->insert_id();
			
			//FILLING THE ADDRESS USER TABLE
			$sql_user_address = $this->db->insert_string('tbl_user_address', $ar_user_adress);
			$query_user_address = $this->db->query($sql_user_address);
			if($query_user_address)
			{
				$user_address_id = $this->db->insert_id();
				$ar_user_data['user_id'] = $user_id;
				$ar_user_data['user_address_id'] = $user_address_id;
				
				$sql_user_data = $this->db->insert_string('tbl_user_data', $ar_user_data);
				$query_user_data = $this->db->query($sql_user_data);
				
				return $query_user_data;
			}
		}
	}
	
	/*
	 * inserts the new user from the store module
	 */
	function insert_user_from_store($ar_user, $ar_user_adress, $ar_user_data)
	{
	//FILLING THE MAIN USER TABLE
		$sql_user = $this->db->insert_string('tbl_users', $ar_user);
		$query_user = $this->db->query($sql_user);
		
		if($query_user)
		{
			$user_id = $this->db->insert_id();
			
			//FILLING THE ADDRESS USER TABLE
			$sql_user_address = $this->db->insert_string('tbl_user_address', $ar_user_adress);
			$query_user_address = $this->db->query($sql_user_address);
			if($query_user_address)
			{
				$user_address_id = $this->db->insert_id();
				$ar_user_data['user_id'] = $user_id;
				$ar_user_data['user_address_id'] = $user_address_id;
				
				$sql_user_data = $this->db->insert_string('tbl_user_data', $ar_user_data);
				$query_user_data = $this->db->query($sql_user_data);
				
				return $query_user_data;
			}
		}
	}
	
	/**
	 * gets the user credentials
	 * @param unknown $login
	 * @param unknown $password
	 */
	public function get_user_credentials($login, $password)
	{
		$sql = "Select * FROM tbl_users WHERE userName=?";
		
		$query = $this->db->query($sql,array($login));
		return $query->result();
	}
	
	/*
	 * checks if userName exists
	 */
	function countUsername($userName)
	{
		$sql = "Select count(userName) as total FROM tbl_users WHERE userName=?";
		
		$query = $this->db->query($sql,array($userName));
		return $query->result();
	}
	
	/*
	 * checks if email exists
	*/
	function countUserEMail($email)
	{
		$sql = "Select count(email) as total FROM tbl_users WHERE email=?";
	
		$query = $this->db->query($sql,array($email));
		return $query->result();
	}
}
?>