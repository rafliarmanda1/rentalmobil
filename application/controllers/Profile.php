<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Profile_model', 'profil');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile ' . $data['user']['name'];

        // var_dump($data['user']); die;

        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('layout/user/header', $data);
            $this->load->view('user/profile/index', $data);
            $this->load->view('layout/user/footer', $data);
        } else {
            redirect('admin');
        }
    }

    public function update()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', "Name", 'required|trim', [
            'required' => 'Nama harus di isi!'
        ]);

        $this->form_validation->set_rules('number', "No hp", 'required|trim', [
            'required' => 'No hp harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> mengubah profile
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            
            if ($this->session->userdata('role_id') == 2) {
                redirect('profile');
            } else {
                redirect('admin/profile');
            }
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $number = $this->input->post('number');
            $alamat = $this->input->post('alamat');
            $upload_img = $_FILES['image']['name'];
            $upload_ktp = $_FILES['ktp']['name'];

            // upload foto profile
            if ($upload_img) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|JPG|png|ico';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_img = $data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // upload ktp
            if ($upload_ktp) {
                $config['upload_path'] = './assets/img/ktp/';
                $config['allowed_types'] = 'gif|jpg|JPG|png|ico';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ktp')) {
                    $new_ktp = $this->upload->data('file_name');
                    $this->db->set('ktp', $new_ktp);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->set('no_hp', $number);
            $this->db->set('alamat', $alamat);
            $this->db->set('updated_at', time());
			$this->db->where('id', $id);
			$this->db->update('user');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> mengubah profile
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    
            if ($this->session->userdata('role_id') == 2) {
                redirect('profile');
            } else {
                redirect('admin/profile');
            }
        }
    }

    public function changepass()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $passwordOld = $this->input->post('passwordOld');
        $password = $this->input->post('password');
        $user_password = $data['user'];

        $this->form_validation->set_rules('passwordOld', 'Password lama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password baru', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'trim|required|min_length[5]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> mengubah password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            
            if ($this->session->userdata('role_id') == 2) {
                redirect('profile');
            } else {
                redirect('admin/change');
            }
        } else {
            if (!password_verify($passwordOld, $user_password['password'])) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password</strong> lama salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                if ($this->session->userdata('role_id') == 2) {
                    redirect('profile');
                } else {
                    redirect('admin/change');
                }
            } else {
                if ($passwordOld == $password) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password</strong> baru tidak boleh sama dengan password lama!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    if ($this->session->userdata('role_id') == 2) {
                        redirect('profile');
                    } else {
                        redirect('admin/change');
                    }
                } else {
                    // password ok
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> mengubah password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    if ($this->session->userdata('role_id') == 2) {
                        redirect('profile');
                    } else {
                        redirect('admin/change');
                    }
                }
            }
        }
    }
}