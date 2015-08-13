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

    public function update($data,$id){
        $this->db->update($this->table, $data, array('id'=>$id));
    }

    public function count()
    {
        return $this->db->count_all_results($this->table);
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function delete($id){
        $this->db->where('id_pelanggan', $id);
        $this->db->delete($this->table);
    }
}