<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemutusan extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('penyambungan_model');
		$this->load->model('pemutusan_model');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}
    }

	public function index()
	{
		$this->template->load('master','pemutusan');
	}

	public function create()
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
        	$idPelanggan=$this->input->post('id-pelanggan');
        	$idPenyambungan=$this->input->post('id-penyambungan');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$noHp=$this->input->post('nohp');
			$daya=$this->input->post('daya');
			$tarif=$this->input->post('tarif');
			$rpkwh=$this->input->post('rpkwh');
			$gangguan=$this->input->post('gangguan');
			$tanggalPasang=$this->input->post('tanggal-pasang');
			$standAwal=$this->input->post('stand-awal');
			$petugas=$this->input->post('petugas');
			$idKwhGanti=$this->input->post('idkwhganti');

			$tanggalCabut=$this->input->post('tanggal-cabut');
			$standAkhir=$this->input->post('stand-akhir');
			$petugasCabut=$this->input->post('petugas-cabut');

			$timePasang = strtotime($tanggalPasang);
			$newTanggalPasang = date('Y-m-d',$timePasang);

			$timeCabut = strtotime($tanggalCabut);
			$newTanggalCabut = date('Y-m-d',$timeCabut);

			$pemakaianKwh=$standAkhir-$standAwal;
			$tagihan=$pemakaianKwh*$rpkwh;
			
			$data=array(
				'id_pelanggan'=>$idPelanggan,
				'no_telepon'=>$noHp,
				'petugas_cabut'=>$petugasCabut,
				'rpkwh'=>$rpkwh,
				'tanggal_cabut'=>$newTanggalCabut,
				'stand_akhir'=>$standAkhir,
				'pemakaian_kwh'=>$pemakaianKwh,
				'tagihan'=>$tagihan,
				'terbilang'=>'Dua Ratus Juta Rupiah',
				'penyambungan_id'=>$idPenyambungan
			);

			$this->pemutusan_model->create($data);
			$this->session->set_flashdata('message', 'Data Pemutusan Berhasil ditambahkan');
			redirect(site_url('pemutusan'));
        }
    }

	public function search($idPelanggan)
	{
		$value=$this->penyambungan_model->get_by_idpelanggan($idPelanggan);
		$timePasang = strtotime($value->tanggal_pasang);
		$value->tanggal_pasang = date('d-m-Y',$timePasang);

		$diff=date_diff(date_create('0000-00-00'),date_create($value->tanggal_cabut));
		if($diff->d==0 && $diff->m==0 && $diff->y==0)
		{
			$value->tanggal_cabut="";
		}
		else
		{
			$timeCabut = strtotime($value->tanggal_cabut);
			$value->tanggal_cabut = date('d-m-Y',$timeCabut);
		}

		$this->output
    		 ->set_content_type('application/json')
    		 ->set_output(json_encode($value));
	}
}
