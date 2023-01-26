<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari_model extends CI_Model
{
    function cari_mobil($suv)
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->where('merk_id', $suv);
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb', 'tnkb.id_tnkb=car.nomor_tnkb_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}