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
}