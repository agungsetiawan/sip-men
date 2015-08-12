<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gangguan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // $this->load->model('pelanggan_model');
        $this->load->model('gangguan_model');
        $this->load->model('penyambungan_model');

		$this->load->library('form_validation');

		if(!$this->session->has_userdata('username'))
		{
			redirect(site_url('welcome/login'));
		}
    }

	public function index()
	{
		$this->template->load('master','gangguan');
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
        	$idPelanggan=$this->input->post('id-pelanggan');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$noHp=$this->input->post('nohp');
			$daya=$this->input->post('daya');
			$tarif=$this->input->post('tarif');
			$rpkwh=$this->input->post('rpkwh');
			$gangguan=$this->input->post('gangguan');
			$tanggalGangguan=$this->input->post('tanggal-gangguan');
			$tanggalPasang=$this->input->post('tanggal-pasang');
			$idKwhGanti=$this->input->post('idkwhganti');
			$standAwal=$this->input->post('stand-awal');
			$petugas=$this->input->post('petugas');

			$timeGangguan = strtotime($tanggalGangguan);
			$newTanggalGangguan = date('Y-m-d',$timeGangguan);

			$timePasang = strtotime($tanggalPasang);
			$newTanggalPasang = date('Y-m-d',$timePasang);

			$data=array(
				'id_pelanggan'=>$idPelanggan,
				'no_telepon'=>$noHp,
				'tujuan'=>$gangguan,
				'tanggal_permohonan'=>$newTanggalGangguan,
				'tanggal_pasang'=>$newTanggalPasang,
				'id_kwh_ganti'=>$idKwhGanti,
				'stand_awal'=>$standAwal,
				'petugas_pasang'=>$petugas
			);

			$this->gangguan_model->create($data);
			$this->session->set_flashdata('message', 'Data Gangguan Berhasil ditambahkan');
			redirect(site_url('gangguan'));
        }
	}

	public function data()
	{
		restrictedFor(array('Operator'));

		$data['penyambungan']=$this->gangguan_model->getAll();
		$this->template->load('master','gangguan_data',$data);
	}

	public function edit($id)
	{
		onlyFor('Admin');

		$data['gangguan']=$this->penyambungan_model->getById($id);

		//TODO
		//IF Penyambungan
		
		$timePermintaan = strtotime($data['gangguan']->tanggal_permohonan);
		$data['gangguan']->tanggal_permohonan = date('d-m-Y',$timePermintaan);

		$timePasang = strtotime($data['gangguan']->tanggal_pasang);
		$data['gangguan']->tanggal_pasang = date('d-m-Y',$timePasang);

		$diff=date_diff(date_create('0000-00-00'),date_create($data['gangguan']->tanggal_cabut));
		if($diff->d==0 && $diff->m==0 && $diff->y==0)
		{
			$data['gangguan']->tanggal_cabut="";
		}
		else
		{
			$timeCabut = strtotime($data['gangguan']->tanggal_cabut);
			$data['gangguan']->tanggal_cabut = date('d-m-Y',$timeCabut);
		}

		$this->template->load('master','gangguan_edit',$data);
	}

	public function editAction()
	{
		onlyFor('Admin');

		$this->form_validation->set_rules('nohp', 'No HP', 'required');
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
        	$id=$this->input->post('id-gangguan-true');
            $this->edit($id);
        }
        else
        {
        	$id=$this->input->post('id-gangguan-true');
			$noHp=$this->input->post('nohp');
			$gangguan=$this->input->post('gangguan');
			$tanggalGangguan=$this->input->post('tanggal-gangguan');
			$tanggalPasang=$this->input->post('tanggal-pasang');
			$idKwhGanti=$this->input->post('idkwhganti');
			$standAwal=$this->input->post('stand-awal');
			$petugas=$this->input->post('petugas');

			$timeGangguan = strtotime($tanggalGangguan);
			$newTanggalGangguan = date('Y-m-d',$timeGangguan);

			$timePasang = strtotime($tanggalPasang);
			$newTanggalPasang = date('Y-m-d',$timePasang);

			$data=array(
				'no_telepon'=>$noHp,
				'tujuan'=>$gangguan,
				'tanggal_permohonan'=>$newTanggalGangguan,
				'tanggal_pasang'=>$newTanggalPasang,
				'id_kwh_ganti'=>$idKwhGanti,
				'stand_awal'=>$standAwal,
				'petugas_pasang'=>$petugas
			);

			$this->penyambungan_model->update($data,$id);
			$this->session->set_flashdata('message', 'Data Gangguan Berhasil diperbaharui');
			redirect(site_url('gangguan/data'));
        }
	}

	public function delete($id){
		onlyFor('Admin');

		$this->penyambungan_model->delete($id);
		$this->session->set_flashdata('message', 'Data Gangguan Berhasil Dihapus');
		redirect(site_url('gangguan/data'));
	}
}
