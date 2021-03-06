<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('tdl_model');
        $this->load->library('form_validation');

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

	public function searchAutoComplete()
	{
		$id=$this->input->get('term');
		$value=$this->pelanggan_model->searchByIdPelanggan($id);

		$json=array();
		foreach($value as $v){
			$json[]=array('label'=>$v->id_pelanggan." - ".$v->nama,
						  'value'=>$v->id_pelanggan);
		}

		$this->output
    		 ->set_content_type('application/json')
    		 ->set_output(json_encode($json));
	}

	public function index()
	{
		restrictedFor(array('Operator'));

		$data['pelanggan']=$this->pelanggan_model->getAll();
		$this->template->load('master','pelanggan_data',$data);
	}

	public function create()
	{
		$this->template->load('master','pelanggan_create');
	}

	public function createAction()
	{
		$this->form_validation->set_rules('id-pelanggan', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('daya', 'Daya', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
           $this->template->load('master','pelanggan_create');
        }
        else
        {

        	$idPelanggan=$this->input->post('id-pelanggan');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$jenisTarif=$this->input->post('jenis-tarif');
			$daya=$this->input->post('daya');

			if($jenisTarif=="rumahtangga"){
				$tdl=$this->tdl_model->getByJenisAndDaya('R',$daya);	
			}else if($jenisTarif=="bisnis"){
				$tdl=$this->tdl_model->getByJenisAndDaya('B',$daya);
			}else if($jenisTarif=="industri"){
				$tdl=$this->tdl_model->getByJenisAndDaya('I',$daya);
			}else if($jenisTarif=="sosial"){
				$tdl=$this->tdl_model->getByJenisAndDaya('S',$daya);
			}else if($jenisTarif=="pemerintah"){
				$tdl=$this->tdl_model->getByJenisAndDaya('P',$daya);
			}


			$data=array(
				'unitupi'=>42,
				'unitap'=>'42JYP',
				'unitup'=>42110,
				'id_pelanggan'=>$idPelanggan,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'tarif'=>$tdl->tarif,
				'daya'=>$daya,
				'rpkwh'=>$tdl->rpkwh
				);

			$this->pelanggan_model->create($data);
			$this->session->set_flashdata('message', 'Data Pelanggan Berhasil ditambahkan');
			redirect(site_url('pelanggan'));
        }
	}


	public function edit($id=0)
	{
		onlyFor('Admin');

		if($id==0){
			$this->template->load('master','404/not_found');
			return;
		}

		$pelanggan=$this->pelanggan_model->get_by_idpelanggan($id);

		if(is_null($pelanggan)){
			$this->template->load('master','404/not_found');
			return;
		}

		$tarif=$pelanggan->tarif;
		$kode=substr($tarif, 0,1);
		if(strcasecmp($kode,'r')==0){
			$pelanggan->tarif='rumahtangga';
		}else if(strcasecmp($kode,'b')==0){
			$pelanggan->tarif='bisnis';
		}else if(strcasecmp($kode,'i')==0){
			$pelanggan->tarif='industri';
		}else if(strcasecmp($kode,'s')==0){
			$pelanggan->tarif='sosial';
		}else if(strcasecmp($kode,'p')==0){
			$pelanggan->tarif='pemerintah';
		}

		$data['pelanggan']=$pelanggan;
		$this->template->load('master','pelanggan_edit',$data);
	}

	public function editAction()
	{
		onlyFor('Admin');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('daya', 'Daya', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
        	$idPelanggan=$this->input->post('id-pelanggan-true');
        	$data['pelanggan']=$this->pelanggan_model->get_by_idpelanggan($idPelanggan);
            $this->template->load('master','pelanggan_edit',$data);
        }
        else
        {

        	$idPelanggan=$this->input->post('id-pelanggan-true');

        	$pelanggan=$this->pelanggan_model->get_by_idpelanggan($idPelanggan);

			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$jenisTarif=$this->input->post('jenis-tarif');
			$daya=$this->input->post('daya');

			if($jenisTarif=="rumahtangga"){
				$tdl=$this->tdl_model->getByJenisAndDaya('R',$daya);	
			}else if($jenisTarif=="bisnis"){
				$tdl=$this->tdl_model->getByJenisAndDaya('B',$daya);
			}else if($jenisTarif=="industri"){
				$tdl=$this->tdl_model->getByJenisAndDaya('I',$daya);
			}else if($jenisTarif=="sosial"){
				$tdl=$this->tdl_model->getByJenisAndDaya('S',$daya);
			}else if($jenisTarif=="pemerintah"){
				$tdl=$this->tdl_model->getByJenisAndDaya('P',$daya);
			}


			$data=array(
				'unitupi'=>42,
				'unitap'=>'42JYP',
				'unitup'=>42110,
				'id_pelanggan'=>$idPelanggan,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'tarif'=>$tdl->tarif,
				'daya'=>$daya,
				'rpkwh'=>$tdl->rpkwh
				);

			$this->pelanggan_model->update($data,$pelanggan->id);
			$this->session->set_flashdata('message', 'Data Pelanggan Berhasil diubah');
			redirect(site_url('pelanggan'));
        }
	}

	public function delete($id)
	{
		onlyFor('Admin');

		$this->pelanggan_model->delete($id);
		$this->session->set_flashdata('message', 'Data Pelanggan Berhasil Dihapus');
		redirect(site_url('pelanggan'));
	}
}
