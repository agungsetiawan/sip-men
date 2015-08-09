<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function penyambungan()
	{
		// $this->load->view('lembar_penyambungan');

		$this->form_validation->set_rules('id-pelanggan', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nohp', 'No HP', 'required');
		$this->form_validation->set_rules('daya', 'Daya', 'required');
		$this->form_validation->set_rules('kegiatan', 'Jenis Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal-permintaan', 'Tanggal Permintaan', 'required');
		$this->form_validation->set_rules('tanggal-pasang', 'Tanggal Pasang', 'required');
		$this->form_validation->set_rules('tanggal-cabut', 'Tanggal Cabut', 'required');
		$this->form_validation->set_rules('idkwhganti', 'Id KWH Ganti', 'required');
		$this->form_validation->set_rules('stand-awal', 'Stand Awal', 'required');
		$this->form_validation->set_rules('petugas-pasang', 'Petugas', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
           $this->template->load('master','penyambungan_sementara');
        }
        else
        {
			$arrayBulan=array(
				1=>"Januari",
				2=>"Februari",
				3=>"Maret",
				4=>"April",
				5=>"Mei",
				6=>"Juni",
				7=>"Juli",
				8=>"Agustus",
				9=>"September",
				10=>"Oktober",
				11=>"November",
				12=>"Desember"
			);

			$data['kegiatan']=$this->input->post('kegiatan');
			$data['idPelanggan']=$this->input->post('id-pelanggan');
			$data['nama']=$this->input->post("nama");
			$data['alamat']=$this->input->post('alamat');
			$data['daya']=$this->input->post('daya');
			$data['noHp']=$this->input->post('nohp');
			$data['tarif']=2200;

			$data['idKwhGanti']=$this->input->post('idkwhganti');
			$data['standAwal']=$this->input->post('stand-awal');
			$data['tanggal']=date("d")." ".$arrayBulan[date("n")]." ".date("Y");
			$data['petugas']=$this->input->post('petugas-pasang');

			$this->load->library('pdfgenerator');
			$lembar=$this->load->view('lembar_penyambungan',$data,true);
			$this->pdfgenerator->generate($lembar,'Form Penyambungan Sementara');
		}
	}

}

