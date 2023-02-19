<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Car_model extends CI_Model
{
    // Admin
    function tambahMerk($merk)
    {
        $this->db->set('merk', $merk);
        $this->db->set('created_at', time());
        $this->db->set('updated_at', time());
        $this->db->insert('merk');
    }

    function getAllMerk()
    {
        $this->db->select('*');
        $this->db->from('merk');
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_merk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function updateMerk($merk, $id)
    {
        $this->db->set('merk', $merk);
        $this->db->set('updated_at', time());
        $this->db->where('id_merk', $id);
        $this->db->update('merk');
    }

    function delete_data($where, $table)
    {
        $this->db->set('FOREIGN_KEY_CHECKS', 0);
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->set('FOREIGN_KEY_CHECKS', 1);
    }

    function tambahMobil($id_merk, $warna, $jml_kursi, $plat_nomer, $thn_mobil, $id_transmisi, $id_tnkb, $harga)
    {
        $this->db->set('merk_id', $id_merk);
        $this->db->set('warna', $warna);
        $this->db->set('jml_kursi', $jml_kursi);
        $this->db->set('plat_nomer', $plat_nomer);
        $this->db->set('thn_mobil', $thn_mobil);
        $this->db->set('image_mobil', "default_mobil.jpg");
        $this->db->set('transmisi_id', $id_transmisi);
        $this->db->set('nomor_tnkb_id', $id_tnkb);
        $this->db->set('harga', $harga);
        $this->db->set('is_active', 0);
        $this->db->set('created_at', time());
        $this->db->set('updated_at', time());
        $this->db->insert('car');
    }

    function getCar($id)
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->where('id', $id);
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb', 'tnkb.id_tnkb=car.nomor_tnkb_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getCarRow($id)
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->where('id', $id);
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    function getAllCar()
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->join('status_mobil', 'status_mobil.id_status=car.is_active');
        $this->db->join('transmisi', 'transmisi.id_transmisi=car.transmisi_id');
        $this->db->join('tnkb', 'tnkb.id_tnkb=car.nomor_tnkb_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllTransmisi()
    {
        $this->db->select('*');
        $this->db->from('transmisi');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllTnkb()
    {
        $this->db->select('*');
        $this->db->from('tnkb');
        $query = $this->db->get();
        return $query->result_array();
    }

    function updateAktif($id)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update('car');
    }

    function updateNonaktif($id)
    {
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('car');
    }

    // Penjumlahan
    function total_car_nonactive()
    {
        $query = $this->db->query('SELECT * FROM car WHERE is_active = 0');
        $car = $query->num_rows();
        return $car;
    }

    function total_car_active()
    {
        $query = $this->db->query('SELECT * FROM car WHERE is_active = 1');
        $car = $query->num_rows();
        return $car;
    }

    function total_pesanan()
    {
        $query = $this->db->query('SELECT * FROM sewa WHERE accepted_at = 0');
        $sewa = $query->num_rows();
        return $sewa;
    }

    function total_transaksi()
    {
        $query = $this->db->query('SELECT * FROM sewa WHERE pay_confirm_at != 0');
        $sewa = $query->num_rows();
        return $sewa;
    }

    // User
    public function getAllCarByActive()
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->join('merk', 'merk.id_merk=car.merk_id');
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
}
