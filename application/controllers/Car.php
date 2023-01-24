<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
    public function __construct() {
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
        $data['car'] = $this->car->getAllCar();
        $data['title'] = 'Data Mobil';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/car', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function active()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['car'] = $this->car->getAllCar();
        $data['title'] = 'Aktif / Non Aktif Mobil';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/active', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['merk'] = $this->car->getAllMerk();
        $data['transmisi'] = $this->car->getAllTransmisi();
        $data['tnkb'] = $this->car->getAllTnkb();
        $data['title'] = 'Tambah Data Mobil';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/tambah_mobil', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function addCar()
    {
        $this->form_validation->set_rules('warna', "Warna", 'required|trim|max_length[50]', [
            'required' => 'Warna harus di isi!',
            'max_length' => 'Warna mobil terlalu panjang'
        ]);

        $this->form_validation->set_rules('plat_nomer', "Plat nomer", 'required|trim|min_length[4]|max_length[50]', [
            'required' => 'Plat nomer harus di isi!',
            'min_length' => 'Plat nomer terlalu pendek',
            'max_length' => 'Plat nomer mobil terlalu panjang'
        ]);

        $this->form_validation->set_rules('thn_mobil', "Tahun mobil", 'required|trim|min_length[4]|max_length[4]', [
            'required' => 'Tahun mobil harus di isi!',
            'min_length' => 'Tahun mobil terlalu pendek',
            'max_length' => 'Tahun mobil meleibihi'
        ]);

        $this->form_validation->set_rules('harga', "Harga", 'required|trim|max_length[6]', [
            'required' => 'Harga mobil harus di isi!',
            'max_length' => 'Harga mobil melebihi'
        ]);

        if ($this->form_validation->run() == false ) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['merk'] = $this->car->getAllMerk();
            $data['transmisi'] = $this->car->getAllTransmisi();
            $data['tnkb'] = $this->car->getAllTnkb();
            $data['title'] = 'Tambah Data Mobil';

            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/tambah_mobil', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            $id_merk = $this->input->post('merk');
            $warna = $this->input->post('warna');
            $jml_kursi = $this->input->post('jml_kursi');
            $plat_nomer = $this->input->post('plat_nomer');
            $thn_mobil = $this->input->post('thn_mobil');
            $id_transmisi = $this->input->post('transmisi');
            $id_tnkb = $this->input->post('tnkb');
            $harga = $this->input->post('harga');
            
            $this->car->tambahMobil($id_merk, $warna, $jml_kursi, $plat_nomer, $thn_mobil, $id_transmisi, $id_tnkb, $harga);

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> menambahkan data mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('car');   
        }
    }

    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['merk'] = $this->car->getAllMerk();
        $data['transmisi'] = $this->car->getAllTransmisi();
        $data['tnkb'] = $this->car->getAllTnkb();
        $data['title'] = 'Ubah Data Mobil';

        $data['car'] = $this->car->getCar($id);

        // var_dump($data['car']); die;

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/ubah_mobil', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function ubahMobil($id)
    {
        $this->form_validation->set_rules('warna', "Warna", 'required|trim|max_length[50]', [
            'required' => 'Warna harus di isi!',
            'max_length' => 'Warna mobil terlalu panjang'
        ]);

        $this->form_validation->set_rules('plat_nomer', "Plat nomer", 'required|trim|min_length[4]|max_length[50]', [
            'required' => 'Plat nomer harus di isi!',
            'min_length' => 'Plat nomer terlalu pendek',
            'max_length' => 'Plat nomer mobil terlalu panjang'
        ]);

        $this->form_validation->set_rules('thn_mobil', "Tahun mobil", 'required|trim|min_length[4]|max_length[4]', [
            'required' => 'Tahun mobil harus di isi!',
            'min_length' => 'Tahun mobil terlalu pendek',
            'max_length' => 'Tahun mobil meleibihi'
        ]);

        $this->form_validation->set_rules('harga', "Harga", 'required|trim|max_length[6]', [
            'required' => 'Harga mobil harus di isi!',
            'max_length' => 'Harga mobil melebihi'
        ]);

        if ($this->form_validation->run() == false ) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['merk'] = $this->car->getAllMerk();
            $data['transmisi'] = $this->car->getAllTransmisi();
            $data['tnkb'] = $this->car->getAllTnkb();
            $data['title'] = 'Ubah Data Mobil';

            $data['car'] = $this->car->getCar($id);

            $this->load->view('layout/admin/header', $data);
            $this->load->view('car/ubah_mobil', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            $data['car_row'] = $this->car->getCarRow($id);

            $id_merk = $this->input->post('merk');
            $warna = $this->input->post('warna');
            $jml_kursi = $this->input->post('jml_kursi');
            $plat_nomer = $this->input->post('plat_nomer');
            $thn_mobil = $this->input->post('thn_mobil');
            $id_transmisi = $this->input->post('transmisi');
            $id_tnkb = $this->input->post('tnkb');
            $harga = $this->input->post('harga');

            $upload_img = $_FILES['image']['name'];

            if ($upload_img) {
                $config['upload_path'] = './assets/img/car/';
                $config['allowed_types'] = 'gif|jpg|JPG|png|ico|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_img = $data['car_row']['image'];
                    if ($old_img != 'default_mobil.jpg') {
                        unlink(FCPATH . 'assets/img/car/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image_mobil', $new_img);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('merk_id', $id_merk);
            $this->db->set('warna', $warna);
            $this->db->set('jml_kursi', $jml_kursi);
            $this->db->set('plat_nomer', $plat_nomer);
            $this->db->set('thn_mobil', $thn_mobil);
            $this->db->set('transmisi_id', $id_transmisi);
            $this->db->set('nomor_tnkb_id', $id_tnkb);
            $this->db->set('harga', $harga);
            $this->db->set('updated_at', time());
            $this->db->where('id', $id);
            $this->db->update('car');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> mengubah data mobil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('car');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
		$this->car->delete_data($where,'car');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> menghapus data mobil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('car');
    }

    public function aktif($id)
    {
        $this->car->updateAktif($id);

        $this->session->set_flashdata('message_aktif', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> mengaktifkan data mobil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('car/active');
    }

    public function nonaktif($id)
    {
        $this->car->updateNonaktif($id);

        $this->session->set_flashdata('message_aktif', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> menonaktifkan data mobil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('car/active');
    }
}