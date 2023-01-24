<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Landing Page - REMO';

        if (!empty($data['user'])) {
            $this->load->view('layout/landing2/header_landing_login', $data);
        } else {
            $this->load->view('layout/landing2/header_landing', $data);
        }

        $this->load->view('landing', $data);
        $this->load->view('layout/landing2/footer_landing', $data);
    }
}
