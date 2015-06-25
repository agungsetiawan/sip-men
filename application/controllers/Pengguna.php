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
		//todo
		// simpan data baru di sini
	}

	public function edit($idPengguna)
	{
		$pengguna=$this->pengguna_model->get_by_id_pengguna($idPengguna);
		$data['pengguna']=$pengguna;
		$this->template->load('master','data_pengguna_edit', $data);
	}

	public function editAction()
	{
		//todo
		// simpan perubahan di sini
	}
}
