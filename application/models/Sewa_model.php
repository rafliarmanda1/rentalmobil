<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa_model extends CI_Model
{
    function tambahSewa($user_id, $mobil_id, $hari)
    {
        $this->db->set('user_id', $user_id);
        $this->db->set('mobil_id', $mobil_id);
        $this->db->set('hari', $hari);
        $this->db->set('created_at', time());
        $this->db->set('updated_at', time());
        $this->db->insert('sewa');
    }
}