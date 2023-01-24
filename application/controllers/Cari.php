<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Cari_model', 'cari');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function empatKursi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rental Mobil - Homepage';
        $data['car'] = $this->cari->seat("4");

        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/empat_kursi', $data);
        $this->load->view('layout/user/footer', $data);
    }

    public function enamKursi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rental Mobil - Homepage';
        $data['car'] = $this->cari->seat("6");

        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/enam_kursi', $data);
        $this->load->view('layout/user/footer', $data);
    }
}