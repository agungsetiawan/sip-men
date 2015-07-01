<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
		$this->load->library('form_validation');
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
}
