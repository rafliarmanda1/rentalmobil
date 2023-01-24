<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Car_model', 'car');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['merk'] = $this->car->getAllMerk();
        $data['title'] = 'Type Mobil';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/merk', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function tambahMerk()
    {
        $this->form_validation->set_rules('merk', "Merk", 'required|trim|max_length[50]', [
            'required' => 'Type mobil harus di isi!',
            'max_length' => 'Type mobil terlalu panjang'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> menambah type mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            if ($this->session->userdata('role_id') == 2) {
                redirect('home');
            } else {
                redirect('merk');
            }
        } else {
            $merk = $this->input->post('merk');
            $this->car->tambahMerk($merk);

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> menambah type mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('merk');
        }
    }

    function update()
    {
        $id = $this->input->post('id');
        $merk = $this->input->post('merk');

        $this->form_validation->set_rules('merk', "Merk", 'required|trim', [
            'required' => 'Type harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> mengubah type mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            if ($this->session->userdata('role_id') == 2) {
                redirect('home');
            } else {
                redirect('merk');
            }
        } else {
            $this->car->updateMerk($merk, $id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> mengubah type mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('merk');
        }
    }

    function hapus($id)
    {
        $where = array('id_merk' => $id);
        $this->car->delete_data($where, 'merk');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> menghapus type mobil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('merk');
    }
}
