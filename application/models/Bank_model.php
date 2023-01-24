<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    function total_bank() {
		$query = $this->db->query('SELECT * FROM rekening');
		$rek=$query->num_rows();
		return $rek;
	}

	function getAllBank()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllBankRow()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $query = $this->db->get();
        return $query->row_array();
    }

	function tambahBank($bank, $norek)
	{
		$this->db->set('bank', $bank);
		$this->db->set('norek', $norek);
        $this->db->set('created_at', time());
        $this->db->set('updated_at', time());
        $this->db->insert('rekening');
	}

    function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}