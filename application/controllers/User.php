<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Asrama_model", "am");
    }

    public function index()
    {
        $data['menu'] = 'Dashboard User';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        if ($this->session->userdata['id_level'] == 100) {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $data['level'] = $this->session->userdata('id_level');
                $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/dashboard_user',$data);
                $this->load->view('templates/dash_footer');
            } else {
                redirect('.');
            }
        } else {
            redirect('.');
        }
    }

}