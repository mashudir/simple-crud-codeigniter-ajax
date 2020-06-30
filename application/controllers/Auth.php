<?php 
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'am');
	}

	function index()
	{
		$data = array (	'title'		=>'Login Pengguna',
						'isi'		=>'auth'
						);
		$this->load->view('auth',$data, FALSE);
	}

	function login()
	{
		$data = array('username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
		$request = $this->am->login($data);
		if ($request)
		{
			// var_dump();exit();
			$this->session->set_userdata('username',$request[0]['username']);

			redirect('admin');
		}
		else
		{
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect('auth');
	}
}

 ?>