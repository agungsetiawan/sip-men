<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penyambungan_model extends CI_Model {

    public $table = 'penyambungan_sementara';
    public $id = 'id';
    public $order = 'DESC';
    
    public function create($data){
        $this->db->insert($this->table, $data);
    }

    public function count()
    {
       $this->db->not_like('tanggal_cabut', '0000-00-00');
       $this->db->from($this->table);
       return $this->db->count_all_results(); 
    }

    public function get_by_idpelanggan($idPelanggan){
        $this->db->select('penyambungan_sementara.id,nama, alamat,no_telepon,daya,tarif,rpkwh,tujuan,tanggal_pasang,stand_awal,petugas_pasang,id_kwh_ganti,tanggal_cabut');
        $this->db->where('penyambungan_sementara.id_pelanggan', $idPelanggan);
        // $this->db->not_like('tanggal_cabut', '0000-00-00');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penyambungan_sementara.id_pelanggan');
        $this->db->order_by('penyambungan_sementara.id', 'DESC');
        return $this->db->get()->row();
    }
}