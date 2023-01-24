<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Bank_model', 'bank');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_bank'] =  $this->bank->total_bank();
        $data['bank'] =  $this->bank->getAllBank();
        $data['title'] = 'Rekening Bank';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/bank', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('bank', "Jenis Bank", 'required');
        $this->form_validation->set_rules('norek', "No Rekening", 'required');

        if ($this->form_validation->run() == false ) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> menambahkan. <strong>Tidak boleh ada form yang kosong</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('bank');
        } else {
            $bank = $this->input->post('bank');
            $norek = $this->input->post('norek');
            $this->bank->tambahBank($bank, $norek);

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> menambahkan rekening bank
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('bank');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
		$this->bank->delete_data($where,'rekening');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> menghapus rekening bank
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('bank');
    }
}