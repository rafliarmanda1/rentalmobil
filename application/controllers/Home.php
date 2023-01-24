<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Car_model', 'car');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rental Mobil - Homepage';
        $data['car'] = $this->car->getAllCarByActive();

        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('layout/user/header_home', $data);
            $this->load->view('user/index', $data);
            $this->load->view('layout/user/footer', $data);
        } else {
            redirect('admin');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rental Mobil - Detail';
        $data['car'] = $this->car->getCar($id);

        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('layout/user/header', $data);
            $this->load->view('user/detail', $data);
            $this->load->view('layout/user/footer', $data);
        } else {
            redirect('admin');
        }
    }

    public function logout()
    {
        $session = ['email', 'role_id', 'status'];
        $this->session->unset_userdata($session);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout</div>');
        redirect('landing');
    }
}
