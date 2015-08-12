<?php

function restrictedFor($role)
{
	$CI =& get_instance();
	$CI->load->helper('url');
	$CI->load->library('session');

	$isRestricted=false;
	foreach($role as $r){
		if($CI->session->userdata('level')==$r){
			$isRestricted=true;
			break;
		}
	}

	if($isRestricted==true){
		redirect(site_url('welcome/index'));
	}
}

function onlyFor($role)
{
	$CI =& get_instance();
	$CI->load->helper('url');
	$CI->load->library('session');

	$isRestricted=false;

	if($CI->session->userdata('level')!=$role){
		redirect(site_url('welcome/index'));
	}
}