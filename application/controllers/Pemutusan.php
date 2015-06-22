<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemutusan extends CI_Controller {

	public function index()
	{
		$this->template->load('master','pemutusan');
	}
}
