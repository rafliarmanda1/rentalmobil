<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Notifikasi_model', 'notifikasi');
        $this->load->model('Bank_model', 'bank');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Notifikasi || ' . $data['user']['name'];
        $data['sewa'] = $this->notifikasi->getAllSewa();
        $data['bank'] = $this->bank->getAllBankRow();

        // var_dump($data['sewa']); die;

        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('layout/user/header', $data);
            $this->load->view('notifikasi/notifikasi', $data);
            $this->load->view('layout/user/footer', $data);
        } else {
            redirect('admin');
        }
    }

    public function print()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sewa'] = $this->notifikasi->getAllSewa();
        
        $this->load->view('notifikasi/print', $data);
    }
}