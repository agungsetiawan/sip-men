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

			$data['kalimat']="untuk keperluan";
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

	public function gangguan()
	{
		$this->form_validation->set_rules('id-pelanggan', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nohp', 'No HP', 'required');
		$this->form_validation->set_rules('daya', 'Daya', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required');
		$this->form_validation->set_rules('rpkwh', 'RP KWH', 'required');
		$this->form_validation->set_rules('gangguan', 'Jenis Gangguan', 'required');
		$this->form_validation->set_rules('tanggal-gangguan', 'Tanggal Gangguan', 'required');
		$this->form_validation->set_rules('tanggal-pasang', 'Tanggal Pasang', 'required');
		$this->form_validation->set_rules('idkwhganti', 'Id KWH Ganti', 'required');
		$this->form_validation->set_rules('stand-awal', 'Stand Awal', 'required');
		$this->form_validation->set_rules('petugas', 'Petugas', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('master','gangguan');
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

			$data['kalimat']="gangguan kwh";
			$data['kegiatan']=$this->input->post('gangguan');
			$data['idPelanggan']=$this->input->post('id-pelanggan');
			$data['nama']=$this->input->post("nama");
			$data['alamat']=$this->input->post('alamat');
			$data['daya']=$this->input->post('daya');
			$data['noHp']=$this->input->post('nohp');
			$data['tarif']=$this->input->post('tarif');

			$data['idKwhGanti']=$this->input->post('idkwhganti');
			$data['standAwal']=$this->input->post('stand-awal');
			$data['tanggal']=date("d")." ".$arrayBulan[date("n")]." ".date("Y");
			$data['petugas']=$this->input->post('petugas');

			$this->load->library('pdfgenerator');
			$lembar=$this->load->view('lembar_penyambungan',$data,true);
			$this->pdfgenerator->generate($lembar,'Form Gangguan Kwh');
        }
	}

	public function pemutusan()
	{
		$this->form_validation->set_rules('id-pelanggan', 'ID Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nohp', 'No HP', 'required');
		$this->form_validation->set_rules('daya', 'Daya', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required');
		$this->form_validation->set_rules('rpkwh', 'RP KWH', 'required');
		$this->form_validation->set_rules('gangguan', 'Jenis Gangguan', 'required');
		$this->form_validation->set_rules('tanggal-pasang', 'Tanggal Pasang', 'required');
		$this->form_validation->set_rules('stand-awal', 'Stand Awal', 'required');
		$this->form_validation->set_rules('petugas', 'Petugas', 'required');
		$this->form_validation->set_rules('idkwhganti', 'Id KWH Ganti', 'required');
		$this->form_validation->set_rules('tanggal-cabut', 'Tanggal Cabut', 'required');
		$this->form_validation->set_rules('stand-akhir', 'Stand Akhir', 'required');
		$this->form_validation->set_rules('petugas-cabut', 'Petugas Cabut', 'required');

		$this->form_validation->set_message('required', '{field} harus di isi');

		$this->form_validation->set_error_delimiters('<p class="help-block error">', '</p>');

		if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('master','pemutusan');
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

			$data['idKwhGanti']=$this->input->post('idkwhganti');
			$data['tanggalPasang']=$tanggalPasang=$this->input->post('tanggal-pasang');
			$data['tanggalCabut']=$tanggalCabut=$this->input->post('tanggal-cabut');
			$data['idPelanggan']=$this->input->post('id-pelanggan');
			$data['nama']=$this->input->post("nama");
			$data['standAwal']=$this->input->post('stand-awal');
			$data['standAkhir']=$this->input->post('stand-akhir');
			$data['tarif']=$this->input->post('tarif');
			$data['pemakaianKwh']=$data['standAkhir']-$data['standAwal'];
			$data['rpkwh']=$this->input->post('rpkwh');
			$data['tagihan']=$data['pemakaianKwh']*$data['rpkwh'];
			$data['terbilang']="Dua ratus lima puluh ribu rupiah";
			$data['tanggal']=date("d")." ".$arrayBulan[date("n")]." ".date("Y");
			$data['petugas']=$this->input->post('petugas-cabut');

			$this->load->library('pdfgenerator');
			$lembar=$this->load->view('lembar_pemutusan',$data,true);
			$this->pdfgenerator->generate($lembar,'Form Pemutusan Kwh');
        }
	}

}

