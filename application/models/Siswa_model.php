<?php 
/**
 * 
 */
class Siswa_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getAll()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getById($id)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('id',$id);
		$data = $this->db->get();
		return $data;
	}

	function save($data)
	{
		$query = $this->db->insert('siswa',$data);
		return $query;
	}

	function update($data)
	{
		$this->db->where('id',$data['id']);
		$query = $this->db->update('siswa',$data);
		return $query;
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('siswa');
	}
}


 ?>