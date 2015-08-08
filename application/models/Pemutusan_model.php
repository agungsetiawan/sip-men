<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemutusan_model extends CI_Model {

    public $table = 'pemutusan';
    public $id = 'id';
    public $order = 'DESC';
    
    public function create($data){
        $this->db->insert($this->table, $data);
    }
}