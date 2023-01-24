<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    function getAllSewa()
    {
        $this->db->select('*');
        $this->db->from('sewa');
        $this->db->join('car','car.id=sewa.mobil_id');
        $this->db->join('merk','merk.id_merk=car.merk_id');
        $this->db->join('user','user.id=sewa.user_id');
        $this->db->join('transmisi','transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb','tnkb.id_tnkb=car.nomor_tnkb_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}