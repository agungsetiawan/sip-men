<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyambungan extends CI_Controller {

	public function index()
	{
		$this->template->load('master','penyambungan_sementara');
	}
}
