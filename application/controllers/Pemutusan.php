<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemutusan extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		$this->load->library('form_validation');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}
    }

	public function index()
	{
		$this->template->load('master','pemutusan');
	}
}
