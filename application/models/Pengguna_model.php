<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    public $table = 'pengguna';
    public $id = 'id';
    public $order = 'DESC';
    
    public function create($data){
        $this->db->insert($this->table, $data);
    }

    public function update($data,$id){
    	// $this->db->where('id', $id);
		$this->db->update($this->table, $data, array('id'=>$id));
    }

    public function getAll(){
    	return $this->db->get($this->table)->result();
    }

    public function get_by_id_pengguna($idPengguna){
        $this->db->where('id', $idPengguna);
        return $this->db->get($this->table)->row();
    }
}