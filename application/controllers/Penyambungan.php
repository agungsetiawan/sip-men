<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyambungan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('penyambungan_model');
        $this->load->model('pelanggan_model');
		$this->load->library('form_validation');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}
    }

	public function index()
	{
		$this->template->load('master','penyambungan_sementara');
	}

	public function create()
	{
		
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
        	$idPelanggan=$this->input->post('id-pelanggan');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$noHp=$this->input->post('nohp');
			$daya=$this->input->post('daya');
			$tarif=2200;
			$rpkwh=6000;
			$kegiatan=$this->input->post('kegiatan');
			$tanggalPermintaan=$this->input->post('tanggal-permintaan');
			$tanggalPasang=$this->input->post('tanggal-pasang');
			$tanggalCabut=$this->input->post('tanggal-cabut');
			$idKwhGanti=$this->input->post('idkwhganti');
			$standAwal=$this->input->post('stand-awal');
			$petugas=$this->input->post('petugas-pasang');

			$timePermintaan = strtotime($tanggalPermintaan);
			$newTanggalPermintaan = date('Y-m-d',$timePermintaan);

			$timePasang = strtotime($tanggalPasang);
			$newTanggalPasang = date('Y-m-d',$timePasang);

			$timeCabut = strtotime($tanggalCabut);
			$newTanggalCabut = date('Y-m-d',$timeCabut);

			$dataPelanggan=array(
				'unitupi'=>42,
				'unitap'=>'42JYP',
				'unitup'=>42505,
				'id_pelanggan'=>$idPelanggan,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'tarif'=>$tarif,
				'daya'=>$daya,
				'rpkwh'=>$rpkwh
			);

			$data=array(
				'id_pelanggan'=>$idPelanggan,
				'no_telepon'=>$noHp,
				'tujuan'=>$kegiatan,
				'tanggal_permohonan'=>$newTanggalPermintaan,
				'tanggal_pasang'=>$newTanggalPasang,
				'tanggal_cabut'=>$newTanggalCabut,
				'id_kwh_ganti'=>$idKwhGanti,
				'stand_awal'=>$standAwal,
				'petugas_pasang'=>$petugas
			);

			$this->pelanggan_model->create($dataPelanggan);
			$this->penyambungan_model->create($data);
			$this->session->set_flashdata('message', 'Data Penyambungan Berhasil ditambahkan');
			redirect(site_url('penyambungan'));
        }

		
	}
}
