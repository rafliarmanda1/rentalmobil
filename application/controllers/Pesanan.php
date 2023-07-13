<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notifikasi_model', 'sewa');
        $this->load->model('Bank_model', 'bank');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Sewa Mobil';
        $data['sewa'] = $this->sewa->getAllSewa();


        // var_dump($data['sewa'][0]);
        // die();
        $data['bank'] = $this->bank->getAllBankRow();

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/pesanan', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function terima($id)
    {
        if ($this->session->userdata('role_id') == 1) {

            $this->form_validation->set_rules('admin', "Harga", 'required');
            $this->form_validation->set_rules('mobil', "Harga", 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menerima penyewa
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

                redirect('pesanan');
            } else {
                $admin_id = $this->input->post('admin');

                $this->db->set('admin_id', $admin_id);
                $this->db->set('accepted_at', time());
                $this->db->set('updated_at', time());
                $this->db->where('id_sewa', $id);
                $this->db->update('sewa');

                $mobil_id = $this->input->post('mobil');
                $this->db->set('is_active', 0);
                $this->db->where('id', $mobil_id);
                $this->db->update('car');

                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> meneriwa penyewaan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('pesanan');
            }
        }
    }

    public function tolak($id)
    {
        if ($this->session->userdata('role_id') == 1) {

            $this->form_validation->set_rules('admin', "admin", 'required');
            $this->form_validation->set_rules('keterangan', "Keterangan", 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Mohon untuk mengisi <strong>keterangan penolakan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

                redirect('pesanan');
            } else {
                $admin_id = $this->input->post('admin');
                $keterangan = $this->input->post('keterangan');

                $this->db->set('admin_id', $admin_id);
                $this->db->set('rejected_at', time());
                $this->db->set('keterangan', $keterangan);
                $this->db->set('updated_at', time());
                $this->db->where('id_sewa', $id);
                $this->db->update('sewa');

                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menolak penyewaan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('pesanan');
            }
        }
    }

    public function payConfirm($id)
    {
        $this->db->set('pay_confirm_at', time());
        $this->db->set('updated_at', time());
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> konfirmasi pembayaran pelanggan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('pesanan');
    }
}
