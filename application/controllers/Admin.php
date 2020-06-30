<?php 
/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model','sm');
	}

	function index()
	{
		$data = array( 'title' => 'Daftar Siswa',
					'isi' => 'siswa/list');

		$this->data['siswa'] = $this->allSiswa();

		if (!$this->session->userdata('username'))
		{
			redirect('auth');
		}
		else
		{
			$this->load->view('layout/wrapper', $data, $this->data);
		}
	}

	function refreshTabel()
	{
		$this->data['siswa'] = $this->allSiswa();
		$this->load->view('siswa/tabel',$this->data);
	}

	function allSiswa()
	{
		$request = $this->sm->getAll();
		return $request;
	}

	function siswaById()
	{
		$id = $this->input->post('id');
		$request = $this->sm->getById($id);
		// var_dump($request);exit();
		echo json_encode($request->result());
	}

	function save()
	{
		$data = array(	'nama' => $this->input->post('nama'),
						'nim' => $this->input->post('nim')
					);

		if(!empty($_FILES['foto']['name']))
        {
            $upload = $this->_do_upload();
            $data['foto'] = $upload;
        }

		$request = $this->sm->save($data);
		
		if ($request) {
			$result = array(
				'status' => 'success',
				'message' => 'Input Success'
			);
		}else{
			$result = array(
				'status' => 'failed',
				'message' => 'Input Failed'
			);
		}
		echo json_encode($result);
	}

	function update()
	{
		$data = array(	'id' => $this->input->post('id'),
						'nama' => $this->input->post('nama'),
						'nim' => $this->input->post('nim')
					);

		if($this->input->post('hapusfoto')) // if remove photo checked
        {
            if(file_exists('./assets/img/'.$this->input->post('hapusfoto')) && $this->input->post('hapusfoto'))
                unlink('./assets/img/'.$this->input->post('hapusfoto'));
            $data['foto']='';
        }
        if(!empty($_FILES['foto']['name']))
        {
            $upload = $this->_do_upload();
            // $unit 	= $this->session->userdata('MSU_KODE');
            $siswa = $this->sm->getById($this->input->post('id'))->result_array();
            // var_dump($siswa);exit();

            if(file_exists('./assets/img/'.$siswa[0]['foto']) && $siswa[0]['foto'])
            	unlink('./assets/img/'.$siswa[0]['foto']);
            $data['foto']=$upload;
        }

		$request = $this->sm->update($data);

		if ($request) {
			$result = array(
				'status' => 'success',
				'message' => 'Update Success'
			);
		}else{
			$result = array(
				'status' => 'failed',
				'message' => 'Update Failed'
			);
		}
		echo json_encode($result);
	}

	function delete($id)
	{
		if (isset($id)) {
			try
			{
				$siswa = $this->sm->getById($id)->result_array();

				if(file_exists('./assets/img/'.$siswa[0]['foto']) && $siswa[0]['foto'])
					unlink('./assets/img/'.$siswa[0]['foto']);

				$request = $this->sm->delete($id);
				$result = array(
					'status' => 'success',
					'message' => 'Delete Success'
				);
				echo json_encode($result);
			}
			catch(Exception $e){

			}
		}else{
			$result = array(
				'status' => 'failed',
				'message' => 'Please provide an id'
			);
			echo json_encode($result);
		}
	}

	function _do_upload()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 100; 
        $config['max_width']            = 1000; 
        $config['max_height']           = 1000; 
        $config['file_name']            = round(microtime(true) * 1000);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')) 
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = $this->upload->display_errors(); 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
}


 ?>