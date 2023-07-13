<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
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

    public function print($id)
    {

        function kirimsms($no_tujuan, $pesan)
        {
            //ID dan PIN terdapat pada aplikasi SMS GATEWAY pada Android
            $id_mesin = "134";
            $pin = "104226";

            //Replace Space in message to %20
            $pesan = str_replace(" ", "%20", $pesan);

            //Init CURL
            $ch = curl_init();

            //Setup URL
            curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$id_mesin&pin=$pin&to=$no_tujuan&text=$pesan");

            //Active transfer value function which is string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            //Setting for running on localhost , deactive ssl verify (https)
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            //Final
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sending = kirimsms('085720855835', 'Terimakasih Sudah Melakukan Reservasi Di Instansi Dehavihan Rental Car! Pada Saat Melakukan Pengambilan Unit Mobil Harap Membawa Kartu Identitas Asli!');
        //$sending = kirimsms($data['user']['no_hp'], 'Terimakasih Sudah Melakukan Reservasi Di Instansi Dehavihan Rental Car! Pada Saat Melakukan Pengambilan Unit Mobil Harap Membawa Kartu Identitas Asli!');
        //$sending = kirimsms('085720855835', 'Terimakasih Sudah Melakukan Reservasi Di Instansi Dehavihan Rental Car! Pada Saat Melakukan Pengambilan Unit Mobil Harap Membawa Kartu Identitas Asli!');

        // var_dump($sending);
        // die();

        $data['sewa'] = $this->notifikasi->getAllSewaById($id);

        $this->load->view('notifikasi/print', $data);
    }
}
