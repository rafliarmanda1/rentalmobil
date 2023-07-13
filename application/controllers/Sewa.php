<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Sewa_model', 'sewa');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function createSewa($id)
    {
        $this->form_validation->set_rules('hari', "Harga", 'required', [
            'required' => 'Hari harus di isi!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hari</strong> harus di isi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('home/detail/' . $id);
        } else {
            $user_id = $this->input->post('user');
            $mobil_id = $this->input->post('mobil');
            $tanggalInput = $this->input->post('hari');

            $tanggal = new DateTime($tanggalInput);
            $hari = floor(($tanggal->diff(new DateTime())->days) + 1);
            $hariInt = intval($hari);

            $this->sewa->tambahSewa($user_id, $mobil_id, $hariInt);

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="text-bold">Berhasil</strong> menyewa mobil. Mohon untuk melihat <strong class="text-bold">Notifikasi</strong> untuk informasi lebih lanjut!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('home/detail/' . $id);
        }
    }

    public function bayar($id)
    {
        $upload_bukti = $_FILES['bukti']['name'];

        if (empty($upload_bukti)) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Bukti Pembayaran</strong> tidak valid
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('notifikasi');
        } else {
            // $config['upload_path'] = './assets/img/bukti/';
            // $config['allowed_types'] = 'gif|jpg|JPG|png|ico';
            // $config['max_size']     = '2048';

            // $this->load->library('upload', $config);
            // if ($this->upload->do_upload('bukti')) {
            //     $new_ktp = $this->upload->data('file_name');
            //     $this->db->set('bukti', $new_ktp);
            // } else {
            //     echo $this->upload->display_errors();
            // }

            $this->db->set('bukti', 'bukti-transfer.jpeg');
            $this->db->set('pay_at', time());
            $this->db->set('updated_at', time());
            $this->db->where('id_sewa', $id);
            $this->db->update('sewa');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bukti Pembayaran</strong> berhasil di upload
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('notifikasi');
        }
    }
}
