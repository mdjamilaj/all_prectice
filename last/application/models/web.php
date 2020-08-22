<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class web extends CI_Model { 
     
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }


    public function update($table, $data, $id, $cloum)
    {
        $this->db->where($cloum, $id);
        $this->db->update($table, $data);
    }

    public function delete($table, $id, $cloum)
    {
        $this->db->where($cloum, $id);
        $this->db->delete($table);
    }
 
}