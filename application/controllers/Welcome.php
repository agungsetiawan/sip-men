<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->model('penyambungan_model');
        $this->load->model('gangguan_model');
    }

	public function index()
	{
		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}

		$data['jumlahPengguna']=$this->pengguna_model->count();
		$data['jumlahPenyambungan']=$this->penyambungan_model->count();
		$data['jumlahGangguan']=$this->gangguan_model->count();

		$this->template->load('master','dashboard',$data);
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function loginAction()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));

		$row=$this->pengguna_model->getByUsernamePassword($username,$password);

		if($row<1)
		{
			$this->session->set_flashdata('message', 'Username / Password Salah');
			redirect(site_url('welcome/login'));
		}
		else
		{
			$pengguna=$this->pengguna_model->getByUsername($username);

			$data=array(
				'username'=> $username,
				'level'=> $pengguna->level,
				'nama' => $pengguna->nama
				);

			$this->session->set_userdata($data);
			redirect(site_url('welcome/index'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		redirect(site_url('welcome/login'));
	}
}
