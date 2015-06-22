<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan extends CI_Controller {

	public function index()
	{
		$this->template->load('master','gangguan');
	}
}
