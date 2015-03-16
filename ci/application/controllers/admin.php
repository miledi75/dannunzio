<?php
class admin extends CI_Controller
{
	
	public function home()
	{
		$data['pageTitle'] = "Admin page";
		$data['newSales'] = "New sales registered";
		$data['newUsers'] = "New users to be approved";
		$data['newContactRequests'] = "New contact messages";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageArt()
	{
		
		$data['pageTitle'] = "Manage art collection";
		$data['cat1'] = "Add new art object";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		
		
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageArt');
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageCustomers()
	{
		//LOAD DBASE
		$this->load->database();
		
		//GETTING THE CUSTOMERS (BUYERS AND ARTISTS, 3 AND 4)
		$this->db->select('tbl_users.*,tbl_user_roles.user_role');
		$this->db->from('`tbl_users`,tbl_user_roles');
		$this->db->join('tbl_user_roles', 'tbl_users.user_role_id = tbl_user_roles.user_role_id');
		$where = "(user_role_id = 4 OR user_role_id = 3)";
		$this->db->where($where);
		$users = $this->db->get();
		
		
		$data['pageTitle'] = "Manage customers";
		$data['customers'] = $users->result();
		$data['cat1'] = "Add customer";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
	
	
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageCustomers');
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageShowrooms()
	{
		$data['pageTitle'] = "Manage Showrooms";
		$data['cat1'] = "New showroom";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
		

		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageShowrooms');
		$this->load->view('templates/adminFooter', $data);
	}
	
	public function manageEvents()
	{
		$data['pageTitle'] = "Manage events";
		$data['cat1'] = "New event";
		$data['cat2'] = "empty";
		$data['cat3'] = "empty";
	
	
		$this->load->view('templates/adminHeader', $data);
		$this->load->view('admin/manageEvents');
		$this->load->view('templates/adminFooter', $data);
	}
	
}

?>
