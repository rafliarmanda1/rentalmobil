<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('status') == 'login') {
            redirect(base_url('home'));
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('email', "Email", 'required|trim|valid_email', [
            'required' => 'Email harus di isi!',
            'valid_email' => 'Email tidak valid!',
        ]);

        $this->form_validation->set_rules('password', "Password", 'required|trim|min_length[5]', [
            'required' => 'Password harus di isi!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page - Admin';
            $this->load->view('layout/auth/header', $data);
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_activate']) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'status' => 'login',
                    ];

                    $this->session->set_userdata($data);

                    if ($data['role_id' == 2]) {
                        redirect('home');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum dikonfirmasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', "Email", 'required|trim|valid_email', [
            'required' => 'Email harus di isi!',
            'valid_email' => 'Email tidak valid!',
        ]);

        $this->form_validation->set_rules('password', "Password", 'required|trim|min_length[5]', [
            'required' => 'Password harus di isi!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page - User';
            $this->load->view('auth/login_user', $data);
        } else {
            $this->_login_user();
        }
    }

    private function _login_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_activate']) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'status' => 'login',
                    ];

                    $this->session->set_userdata($data);

                    if ($data['role_id' == 2]) {
                        redirect('home');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum dikonfirmasi</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', "Name", 'required|trim|max_length[50]', [
            'required' => 'Nama harus di isi!',
            'max_length' => 'Nama terlalu panjang!'
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


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Page - User';
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_activate' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat akun</div>');
            redirect('auth/login');
        }
    }
}
