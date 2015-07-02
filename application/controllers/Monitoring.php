<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	function __construct()
    {
        parent::__construct();

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
		$this->template->load('master','monitoring');
	}
}
