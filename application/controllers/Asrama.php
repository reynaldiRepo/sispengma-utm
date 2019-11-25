<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asrama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Asrama_model", "am");
    }

    public function index()
    {
        if ($this->session->has_userdata('username')) {
            $this->_islogin();
        } else {
            $data['title'] = 'SISPENGMA Login';
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run()) {
                // validasi success
                $this->_login();
            } else {
                $this->load->view("templates/auth_header", $data);
                $this->load->view("templates/login");
                $this->load->view("templates/auth_footer");
            }
        }
    }

    private function _islogin()
    {
        $data['user'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password'), 'id_level' => $this->session->userdata('id_level')])->row_array();
        if ($data['user']) {
            if ($data['user']['id_level'] == 1337) {
                redirect('Admin');
            } else if ($data['user']['id_level'] == 999) {
                redirect('Musahil');
            } else if ($data['user']['id_level'] == 100) {
                redirect('User');
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('tbl_login', ['username' => $username, 'password' => $password])->row_array();
        if ($user) {
            $data = [
                'username' => $user['username'],
                'password' => $user['password'],
                'id_level' => $user['id_level']
            ];
            $this->session->set_userdata($data);
            if ($data['id_level'] == 1337) {
                redirect('Admin');
            } else if ($data['id_level'] == 999) {
                redirect('Musahil');
            } else if ($data['id_level'] == 100) {
                redirect('User');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username or Password not matches. Please enter valid Login.</div>');
            redirect('.');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_level');
        $this->session->destroy;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
        redirect('.');
    }

    


    
   
}
