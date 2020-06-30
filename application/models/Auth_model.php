<?php 
/**
 * 
 */
class Auth_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function login($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username' => $data['username'],
								'password' => $data['password']
							)
						);
		
		$query = $this->db->get();
		return $query->result_array();
	}
}

 ?>