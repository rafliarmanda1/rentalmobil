<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profile_model', 'profil');
        $this->load->model('Car_model', 'car');
        $this->load->model('Admin_model', 'admin', TRUE);
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_user'] =  $this->profil->total_user_rows();
        $data['total_admin'] =  $this->profil->total_admin_rows();
        $data['total_car_nonactive'] =  $this->car->total_car_nonactive();
        $data['total_car_active'] =  $this->car->total_car_active();
        $data['total_pesanan'] =  $this->car->total_pesanan();
        $data['total_harga'] =  $this->car->total_harga();

        // var_dump($data['total_harga']); die;
        $data['title'] = 'Dashboard';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        };
    }

    public function change()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Password';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        };
    }

    public function kelola()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->admin->getAdmin();
        // var_dump($data['admin']); die;
        $data['title'] = 'Kelola Admin';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/kelola', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        };
    }

    public function adminBaru()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Admin';

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/tambah_admin', $data);
            $this->load->view('layout/admin/footer', $data);
        } else {
            redirect('home');
        };
    }

    // Tambah Admin
    public function create()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah admin';

        $this->form_validation->set_rules('name', "Name", 'required|trim', [
            'required' => 'Nama harus di isi!'
        ]);
        $this->form_validation->set_rules('email', "Email", 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus di isi!',
            'valid_email' => 'Email tidak valid!',
            'is_unique' => 'email sudah terdaftar!'
        ]);

        $this->form_validation->set_rules('password', "Password", 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password harus di isi!',
            'min_length' => 'Password terlalu pendek!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', "Password", 'required|trim|matches[password]');


        if ($this->form_validation->run() == false ) {
            if ($this->session->userdata('role_id') == 1) {
                $this->load->view('layout/admin/header', $data);
                $this->load->view('admin/tambah_admin', $data);
                $this->load->view('layout/admin/footer', $data);
            } else {
                redirect('home');
            }
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_activate' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ];

            $this->db->insert('user', $data);
            // Message ganti flash data ganti
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> membuat admin baru
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/adminBaru');
        }
    }

    // delete admin
    function delete($id){
		$where = array('id' => $id);
		$this->admin->delete_data($where,'user');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> menghapus akun
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('admin/kelola');
	}
}