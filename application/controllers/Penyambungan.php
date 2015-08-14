<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyambungan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('penyambungan_model');
        $this->load->model('pelanggan_model');
        $this->load->model('tdl_model');
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
		$this->form_validation->set_rules('jenis-tarif', 'Jenis Tarif', 'required');
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

			$jenisTarif=$this->input->post('jenis-tarif');
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

			$tarif=$tdl->tarif;
			$rpkwh=$tdl->rpkwh;

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

	public function data()
	{
		restrictedFor(array('Operator'));

		$data['penyambungan']=$this->penyambungan_model->getAll();

		$this->template->load('master','penyambungan_data',$data);
	}

	public function edit($id=0)
	{
		onlyFor('Admin');

		if($id==0){
			$this->template->load('master','404/not_found');
			return;
		}

		$data['penyambungan']=$this->penyambungan_model->getById($id);

		if(is_null($data['penyambungan'])){
			$this->template->load('master','404/not_found');
			return;
		}

		//IF Gangguan
		if($data['penyambungan']->tanggal_cabut=="0000-00-00"){
			$this->template->load('master','404/not_found');
			return;
		}

		$timePermintaan = strtotime($data['penyambungan']->tanggal_permohonan);
		$data['penyambungan']->tanggal_permohonan = date('d-m-Y',$timePermintaan);

		$timePasang = strtotime($data['penyambungan']->tanggal_pasang);
		$data['penyambungan']->tanggal_pasang = date('d-m-Y',$timePasang);

		$timeCabut = strtotime($data['penyambungan']->tanggal_cabut);
		$data['penyambungan']->tanggal_cabut = date('d-m-Y',$timeCabut);

		$this->template->load('master','penyambungan_edit',$data);
	}

	public function editAction()
	{
		onlyFor('Admin');

		$this->form_validation->set_rules('nohp', 'No HP', 'required');
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
           $id=$this->input->post('id-penyambungan-true');
           $this->edit($id);
        }
        else
        {
        	$id=$this->input->post('id-penyambungan-true');
			$noHp=$this->input->post('nohp');
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


			$data=array(
				'no_telepon'=>$noHp,
				'tujuan'=>$kegiatan,
				'tanggal_permohonan'=>$newTanggalPermintaan,
				'tanggal_pasang'=>$newTanggalPasang,
				'tanggal_cabut'=>$newTanggalCabut,
				'id_kwh_ganti'=>$idKwhGanti,
				'stand_awal'=>$standAwal,
				'petugas_pasang'=>$petugas
			);

			$this->penyambungan_model->update($data,$id);
			$this->session->set_flashdata('message', 'Data Penyambungan Berhasil diperbaharui');
			redirect(site_url('penyambungan/data'));
        }
	}

	public function delete($id){
		onlyFor('Admin');

		$this->penyambungan_model->delete($id);
		$this->session->set_flashdata('message', 'Data Penyambungan Berhasil Dihapus');
		redirect(site_url('penyambungan/data'));
	}
}
