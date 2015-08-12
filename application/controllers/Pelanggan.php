<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');

        if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}
    }

	public function search($idPelanggan)
	{
		$value=$this->pelanggan_model->get_by_idpelanggan($idPelanggan);
		$this->output
    		 ->set_content_type('application/json')
    		 ->set_output(json_encode($value));
	}

	public function index()
	{
		restrictedFor(array('Operator'));

		$data['pelanggan']=$this->pelanggan_model->getAll();
		$this->template->load('master','pelanggan_data',$data);
	}
}
