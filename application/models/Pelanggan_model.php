<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public $table = 'pelanggan';
    public $id = 'id_pelanggan';
    public $order = 'DESC';
    
    public function get_by_idpelanggan($idPelanggan){
        $this->db->where('id_pelanggan', $idPelanggan);
        return $this->db->get($this->table)->row();
    }

    public function create($data){
        $this->db->insert($this->table, $data);
    }

    public function count()
    {
        return $this->db->count_all_results($this->table);
    }
}