<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari_model extends CI_Model
{
    function seat($jml_kursi)
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->where('jml_kursi', $jml_kursi);
        $this->db->join('merk','merk.id_merk=car.merk_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}