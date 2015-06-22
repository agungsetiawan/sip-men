<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }

	public function index()
	{
		$this->template->load('master','gangguan');
	}
}
