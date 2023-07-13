<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    function getAllSewa()
    {
        $this->db->select('sewa.*, sewa.created_at AS sewa_created_at, car.*, merk.*, user.*, transmisi.*, tnkb.*');
        $this->db->from('sewa');
        $this->db->join('car', 'car.id=sewa.mobil_id');
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('user', 'user.id=sewa.user_id');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb', 'tnkb.id_tnkb=car.nomor_tnkb_id');
        $this->db->order_by('sewa.id_sewa', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllSewaById($id)
    {
        $this->db->select('sewa.*, sewa.created_at AS sewa_created_at, car.*, merk.*, user.*, transmisi.*, tnkb.*');
        $this->db->from('sewa');
        $this->db->join('car', 'car.id=sewa.mobil_id');
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('user', 'user.id=sewa.user_id');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb', 'tnkb.id_tnkb=car.nomor_tnkb_id');
        $this->db->where('sewa.id_sewa', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
