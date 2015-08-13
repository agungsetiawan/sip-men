<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
		$this->load->library('form_validation');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}

		if($this->session->userdata('level')!='Admin')
		{
			redirect(site_url('welcome/index'));
		}
    }

	public function index()
	{
		$data['pengguna']=$this->pengguna_model->getAll();
		$this->template->load('master','data_pengguna', $data);
	}

	public function create()
	{
		$this->template->load('master','data_pengguna_create');
	}

	public function createAction()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
           $this->template->load('master','data_pengguna_create');
        }
        else
        {
        	$nama=$this->input->post('nama');
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$level=$this->input->post('level');

			$data=array(
				'nama'=>$nama,
				'username'=>$username,
				'password'=>$password,
				'level'=>$level
				);

			$this->pengguna_model->create($data);
			$this->session->set_flashdata('message', 'Data Pengguna Berhasil ditambahkan');
			redirect(site_url('pengguna'));
        }
		
	}

	public function edit($idPengguna)
	{
		$pengguna=$this->pengguna_model->get_by_id_pengguna($idPengguna);
		$data['pengguna']=$pengguna;
		$this->template->load('master','data_pengguna_edit', $data);
	}

	public function editAction()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
           $idPengguna=$this->input->post('id-pelanggan-true');
           $this->edit($idPengguna);
        }
        else
        {
        	$nama=$this->input->post('nama');
			$username=$this->input->post('username');
			$level=$this->input->post('level');
			$id=$this->input->post('id-pelanggan-true');

			$data=array(
				'nama'=>$nama,
				'username'=>$username,
				'level'=>$level
				);

			$this->pengguna_model->update($data,$id);
			$this->session->set_flashdata('message', 'Data Pengguna Berhasil Diperbaharui');
			redirect(site_url('pengguna'));
        }
	}

	public function delete($id){
		$this->pengguna_model->delete($id);
		$this->session->set_flashdata('message', 'Data Pengguna Berhasil Dihapus');
		redirect(site_url('pengguna'));
	}

	public function profil()
	{
		$this->template->load('master','pengguna/profil');
	}

	public function change()
	{
		$username=$this->session->userdata('username');
		$data['pengguna']=$this->pengguna_model->getByUsername($username);
		$this->template->load('master','pengguna/change',$data);
	}

	public function changeAction()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
           $this->change();
        }
        else
        {
        	$idPengguna=$this->input->post('id-pengguna-true');
        	$username=$this->session->userdata('username');
        	$nama=$this->input->post('nama');

        	$data=array();
        	$passwordLama=$this->input->post('password-lama');
        	$passwordLamaHash=md5($this->input->post('password-lama'));
        	$passwordBaru=$this->input->post('password-baru');
        	$passwordBaruHash=md5($this->input->post('password-baru'));
        	if(!empty($passwordLama)){

        		if(empty($passwordBaru)){
        			$this->session->set_flashdata('message', 'Password Baru tidak boleh kosong');
        			$this->change();
        			return;
        		}

        		$pengguna=$this->pengguna_model->getByUsernamePassword($username,$passwordLamaHash);

        		if($pengguna>0){
        			$data=array(
        				'nama'=>$nama,
        				'password'=>$passwordBaruHash
					);
        		}else{
        			$this->session->set_flashdata('message', 'Password lama tidak cocok');
        			$this->change();
        			return;
        		}
        	}else{
        		$data=array(
					'nama'=>$nama
				);
        	}
        	
			$this->pengguna_model->update($data,$idPengguna);

			$this->session->set_userdata('nama',$nama);

			$this->session->set_flashdata('message', 'Profil Pengguna Berhasil Diperbaharui');
			redirect(site_url('pengguna/profil'));
        }
	}
}
