<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tdl_model extends CI_Model {

    public $table = 'tdl';
    public $id = 'id';
    public $order = 'DESC';

    public function getByJenisAndDaya($jenis,$daya)
    {
        $this->db->where('jenis',$jenis);
        $this->db->where('daya',$daya);
        return $this->db->get($this->table)->row();   
    }
}