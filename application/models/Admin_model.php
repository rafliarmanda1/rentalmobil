<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function getAdmin()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 1);
        $this->db->join('user_role','user_role.id_role=user.role_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}