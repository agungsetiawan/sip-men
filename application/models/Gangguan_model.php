<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gangguan_model extends CI_Model {

    public $table = 'penyambungan_sementara';
    public $id = 'id';
    public $order = 'DESC';
    
    public function create($data){
        $this->db->insert($this->table, $data);
    }

    public function count()
    {
    	$this->db->like('tanggal_cabut', '0000-00-00');
		$this->db->from($this->table);
		return $this->db->count_all_results(); 
    }

    public function getAll()
    {
        $this->db->like('tanggal_cabut', '0000-00-00');
        return $this->db->get($this->table)->result();
    }
}