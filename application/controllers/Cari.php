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

    // SUV
    public function cariSuv()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'SUV - Homepage';
        $data['car'] = $this->cari->cari_mobil("52");

        // var_dump($data['car']);
        // die;
        
        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/car', $data);
        $this->load->view('layout/user/footer', $data);
    }


    // MPV AT
    public function cariMpvAt()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'MPV AT - Homepage';
        $data['car'] = $this->cari->cari_mobil("53");
        
        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/car', $data);
        $this->load->view('layout/user/footer', $data);
    }

    // MPV MT
    public function cariMpvMt()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'MPV MT - Homepage';
        $data['car'] = $this->cari->cari_mobil("54");
        
        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/car', $data);
        $this->load->view('layout/user/footer', $data);
    }

    // City Car
    public function cariCityCar()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'MPV MT - Homepage';
        $data['car'] = $this->cari->cari_mobil("55");
        
        $this->load->view('layout/user/header_home', $data);
        $this->load->view('cari/car', $data);
        $this->load->view('layout/user/footer', $data);
    }
}