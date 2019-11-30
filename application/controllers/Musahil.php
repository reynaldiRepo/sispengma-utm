<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Musahil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Asrama_model", "am");
    }

    public function index()
    {
        $data['menu'] = 'Dashboard Musahil';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        if ($this->session->userdata['id_level'] == 999) {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $data['level'] = $this->session->userdata('id_level');
                $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
                $this->load->view('dash_header', $data);
                $this->load->view('dashboard_musahil',$data);
                $this->load->view('dash_footer');
            } else {
                redirect('.');
            }
        } else {
            redirect('.');
        }
    }

    public function cek_session(){
        if ($this->session->userdata("username") !== null){
            return true;
        }else{
            redirect("Asrama/");
            return false;
        }
    }

    public function daftar_kamar($id_gedung){
        $this->cek_session();
        $data['gedung'] = $id_gedung;
        $data['menu'] = "Data Kamar";
        $data['kamar'] = $this->am->get_kamar($id_gedung);
        $data['kondisi'] = $this->am->get_kondisi();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_kamar", $data);
        $this->load->view('dash_footer',$data);
    }

    public function daftar_penghuni_kamar($gedung, $id_kamar){
        $this->cek_session();
        $data['id_kamar'] = $id_kamar;
        $data['menu'] = "Data Penghuni Kamar";
        $data['penghuni'] = $this->am->get_penghuni_kamar($id_kamar);
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_penghuni_kamar", $data);
        $this->load->view('dash_footer',$data);
        
    }

}