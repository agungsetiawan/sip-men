<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('monitoring_model');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}

		if($this->session->userdata('level')=='Operator')
		{
			redirect(site_url('welcome/index'));
		}
    }

	public function index()
	{
		$data['monitoring']=$this->monitoring_model->getAll();
		// $value=$this->monitoring_model->getAll();
		// $this->output
  //   		 ->set_content_type('application/json')
  //   		 ->set_output(json_encode($value));
		$this->template->load('master','monitoring',$data);
	}
}
