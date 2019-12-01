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
                $this->load->view('Musahil/dashboard_musahil',$data);
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

    public function cek_level(){
        if($this->session->userdata("id_level") == 100){
            $mylevel = "User";
            }
            if($this->session->userdata("id_level") == 999){
            $mylevel = "Musahil";
            }
            if($this->session->userdata("id_level") == 1337){
            $mylevel = "Admin";
            }

            return $mylevel;
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

    public function edit_profile(){
        $this->cek_session();
        $data['menu'] = "Edit Profile";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $nim = substr($this->session->userdata('username'),1);
        $data['data'] = $this->am->get_profile($nim);
        $data['jur'] = $this->db->get("tbl_jurusan")->result();
        $data['nim'] = $nim;
        $this->load->view('dash_header', $data);
        $this->load->view("Musahil/edit_profile", $data);
        $this->load->view('dash_footer',$data);
    }

    public function update_profile(){
        $this->cek_session();
        $data["nama"] = $this->input->post("nama");
        $data["tanggal_lahir"] = $this->input->post("tgl");
        $data["tempat_lahir"] = $this->input->post("lahir");
        $data["alamat"] = $this->input->post("alamat");
        $data["id_jurusan"] = $this->input->post("jurusan");
        $nim = substr($this->session->userdata('username'),1);
        $this->db->where("nim",$nim);
        $update = $this->db->update("tbl_pendaftaran",$data);
        if($update){
            $this->session->set_flashdata('message', "
            <script>alert('Data Berhasil Diupdate')</script>
            <div class='alert alert-success'>Data Berhasil Diupdate</div>
            ");
            redirect($this->cek_level()."/edit_profile");
        }else{
            $this->session->set_flashdata('message', "
            <script>alert('Data Gagal Diupdate')</script>
            <div class='alert alert-danger'>Data gagal Diupdate</div>
            ");
            redirect($this->cek_level()."/edit_profile");
        }

    }

    public function up_image($form_name, $file_name){
		$config['upload_path']   = './uploaded/photoProfile/'; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
		$config['max_size'] = 700;
		$config['file_name'] = $file_name.uniqid() ;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
		if ( !$this->upload->do_upload($form_name)) { 
            return false;	
        }else{
			$array = explode('.', $_FILES[$form_name]['name']);
			$extension = end($array);  
            return $config['file_name'].'.'.$extension;
        }
    }

    public function update_pp(){
        $this->cek_session();
        $data= $this->up_image("file",$this->session->userdata("username"));
        if($data != false){
        $nim = substr($this->session->userdata('username'),1);
        $update = $this->db->query("update tbl_login set photo = '$data' where username like '%".$nim."'");
        if($update){
            $this->session->set_flashdata('message', "
            <script>alert('Data Berhasil Diupdate')</script>
            <div class='alert alert-success'>Data Berhasil Diupdate</div>
            ");
            redirect($this->cek_level()."/edit_profile");
            }
        }else{
            $this->session->set_flashdata('message', "
            <script>alert('Data Terlalu Besar Maksimal 700kb')</script>
            <div class='alert alert-danger'>Data Terlalu Besar Maksimal 700kb</div>
            ");
            redirect($this->cek_level()."/edit_profile");
        }
    }



}