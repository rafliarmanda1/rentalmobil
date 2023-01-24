<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function total_user_rows() {
		$query = $this->db->query('SELECT * FROM user WHERE role_id= 2');
		$user=$query->num_rows();
		return $user;
	}

	function total_admin_rows() {
		$query = $this->db->query('SELECT * FROM user WHERE role_id= 1');
		$admin=$query->num_rows();
		return $admin;
	}
}