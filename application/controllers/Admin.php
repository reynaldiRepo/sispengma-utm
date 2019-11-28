<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Asrama_model", "am");
    }

    public function index()
    {
        $data['menu'] = 'Dashboard Admin';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        if ($this->session->userdata['id_level'] == 1337) {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $data['level'] = $this->session->userdata('id_level');
                $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
                $this->load->view('dash_header', $data);
                $this->load->view('Admin/dashboard_admin',$data);
                $this->load->view('dash_footer');
            } else {
                redirect('Asrama/');
            }
        } else {
            redirect('Asrama/');
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

    // gedung & kama4==========================================

    public function data_gedung(){
        $this->cek_session();
        $data['menu'] = "Data Gedung";
        $data['gedung'] = $this->am->get_gedung();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['list_ged'] = array();
        foreach ($data['gedung'] as $ged){
            array_push($data['list_ged'],$ged->id_gedung);
        }
        $this->load->view('dash_header', $data);
        $this->load->view("admin/dataGedung", $data);
        $this->load->view('dash_footer',$data);
    }

    public function add_gedung(){
        $this->cek_session();
        $this->am->add_gedung();
        $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Gedung')</script>");
        redirect($this->cek_level()."/data_gedung");
    }

    public function manage_gedung($id_gedung)
    {
        $this->cek_session();
        $data['menu'] = "Manage Gedung";
        $data['gedung'] = $this->am->get_detail_gedung($id_gedung);
        $data['gedung_all'] = $this->am->get_gedung();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username')); 
        $data['list_ged'] = array();
        foreach ($data['gedung_all'] as $ged){
            array_push($data['list_ged'],$ged->id_gedung);
        }
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_gedung", $data);
        $this->load->view('dash_footer',$data);
    }

    public function update_gedung($id_gedung){
        $this->cek_session();
        $update = $this->am->update_gedung($id_gedung);
        $this->session->set_flashdata('message', "<script>alert('Update Berhasil')</script>");
        redirect($this->cek_level()."/data_gedung");
    }

    public function delete_gedung($id_gedung){
        $this->cek_session();
        $this->db->where("id_Gedung", $id_gedung);
        $this->db->delete("tbl_gedung");
        $this->session->set_flashdata('message', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect($this->cek_level()."/data_gedung");
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

    public function update_kondisi($id_gedung,$id_kamar){
        $this->cek_session();
        $update = $this->am->update_kondisi($id_kamar);
        if($update){
            $this->session->set_flashdata('message', "<script>alert('Berhasil Update Kondisi Kamar')</script>");
        }else{
            $this->session->set_flashdata('message', "<script>alert('something wrong')</script>");
        }
        redirect ($this->cek_level()."/daftar_kamar/".$id_gedung);
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

    public function add_kamar($gedung){
        $add = $this->am->add_kamar($gedung);
        if($add){
            $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Kamar')</script>");
        }else{
            $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Kamar')</script>");
        }
        redirect($this->cek_level()."/daftar_kamar/".$gedung);
    }

    public function delete_kamar($gedung, $id_kamar){
        $this->db->where("id_kamar",$id_kamar);
        $delete = $this->db->delete("tbl_kamar");
        if($delete){
            $this->session->set_flashdata('message', "<script>alert('Berhasil Hapus Kamar')</script>");
        }else{
            $this->session->set_flashdata('message', "<script>alert('Berhasil Hapus Kamar')</script>");
        }
        redirect($this->cek_level()."/daftar_kamar/".$gedung);

    }

    // ================================================================

    public function edit_profile(){
        $this->cek_session();
        $data['menu'] = "Edit Profile";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/editProfile",$data);
        $this->load->view('dash_footer');
        
    }

    public function ManagePassword(){
        $this->cek_session();
        $data['menu'] = "Manage Password";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/managePassword",$data);
        $this->load->view('dash_footer');
    }

    public function reset_password(){
        $this->cek_session();
        $new = $this->input->post("new_pwd");
        $old = $this->input->post("old_pwd");
        $cek = $this->db->get_where('tbl_login', ['username' => $this->session->userdata("username"), 'password' => md5($old)])->row_array();
        var_dump($cek);
        if ($cek){
            $update = $this->am->reset_password($this->session->userdata("username"));
            if($update){
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Password updated</div>");
                redirect($this->cek_level()."/managePassword/");
            }
        }else{
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Old Password Is Wrong</div>");
            redirect($this->cek_level()."/managePassword/");
        }
        
    }

    public function data_penghuni(){
        $this->cek_session();
        $data['menu'] = "Data Penghuni";
        $data['penghuni'] = $this->am->get_penghuni();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_penghuni",$data);
        $this->load->view('dash_footer');
    }


    public function data_musahil(){
        $this->cek_session();
        $data['menu'] = "Data Musahil";
        $data['musahil'] = $this->am->get_musahil();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_musahil",$data);
        $this->load->view('dash_footer');
    }

    public function insert_musahil(){
        $this->cek_session();
        $data['menu'] = "Input Musahil Baru";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/insert_musahil",$data);
        $this->load->view('dash_footer',$data);
    }

    public function up_image($form_name, $file_name){
		$config['upload_path']   = './uploaded/photoProfile/'; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
		$config['max_size'] = 700;
		$config['file_name'] = $file_name ;
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

    public function add_musahil(){
        $password1 = $this->input->post("password1");
        $password2 = $this->input->post("password2");
        if($password1 != $password2){
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Password didnt Match</div>");
            redirect($this->cek_level()."/insert_musahil");            
        }else{
            $data['nim_musahil'] = $this->input->post("nimMus");
            $cekNim = $this->am->cek_NIM_musahil($this->input->post("nimMus"));
            if($cekNim == 0){
                $data['nim_musahil'] = $this->input->post("nimMus");
                echo "1";
                $data['username'] = "M".$this->input->post("nimMus");
                $dataMusahil = $this->db->get_where("tbl_pendaftaran", array("nim"=>$data['nim_musahil']))->row_array();
                $data['nama'] = $dataMusahil['nama'];
                $data2['username'] =  $data['username'];
                $data2['password'] = md5($password1);
                $data2['id_level'] = "999";
                $data2['user_created'] = date("Y-m-d h:i:s");
                $data2['photo'] = $this->up_image("file", $data['username']);
                $this->db->insert("tbl_login", $data2);
                $this->db->insert("tbl_musahil", $data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Tambah Musahil $cekNim</div>");
                redirect($this->cek_level()."/data_musahil"); 
            }else{
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Nim Sudah ada</div>");
                redirect($this->cek_level()."/insert_musahil");
            }
        }
    }

    public function manage_musahil($nim){
        $this->cek_session();
        $data['menu'] = "Manage Musahil";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['musahil'] = $this->am->get_musahil_detail($nim);
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_musahil",$data);
        $this->load->view('dash_footer',$data);
    }

    public function delete_musahil($nim, $uname){
        $this->cek_session();
        $delete = $this->am->delete_musahil($nim, $uname);
        if ($delete){
            $this->session->set_flashdata('message', "<div class='alert alert-warning'>Berhasil Hapus Musahil $cekNim</div>");
            redirect($this->cek_level()."/data_musahil");
        }
    }

    public function reset_password_mus($nim,$uname){
        $this->cek_session();
        $new = $this->input->post("new_pwd");
        $old = $this->input->post("old_pwd");
        $cek = $this->db->get_where('tbl_login', ['username' => $uname, 'password' => md5($old)])->row_array();
        var_dump($cek);
        if ($cek){
            $update = $this->am->reset_password($uname);
            if($update){
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Password updated</div>");
                redirect($this->cek_level()."/manage_musahil/".$nim);
            }
        }else{
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Old Password Is Wrong</div>");
            redirect($this->cek_level()."/manage_musahil/".$nim);
        }

    }

    public function data_admin(){
        $this->cek_session();
        $data['menu'] = "Data Admin";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_admin",$data);
        $this->load->view('dash_footer');
    }

    public function insert_penghuni(){
        $this->cek_session();
        $data['menu'] = "Input Penghuni Baru";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['kamar'] = $this->am->get_kamar_layak();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/insert_penghuni",$data);
        $this->load->view('dash_footer',$data);
    }

    public function manage_penghuni($nim){
        $this->cek_session();
        $data['menu'] = "Data Penghuni";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['penghuni'] = $this->am->get_penghuni_detail($nim);
        $data['kamar'] = $this->am->get_kamar_layak();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_penghuni",$data);
        $this->load->view('dash_footer',$data);
    }

    public function update_kamar_penghuni($nim){
        $this->cek_session();
        $this->db->where("nim", $nim);
        $this->db->update("tbl_penghuni_tetap", array("kamar"=>$this->input->post("kamar")));
        $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Update Kamar Pemghuni'</div>");
        redirect($this->cek_level()."/manage_penghuni/".$nim);
    }

    public function delete_penghuni($nim){
        $this->cek_session();
        $this->db->where("nim", $nim);
        $delete = $this->db->delete("tbl_penghuni_tetap");
        redirect($this->cek_level()."/data_penghuni");
    }

    public function get_pendaftar(){
        $data = $this->am->get_pendaftar();
        $output = array();
        foreach($data as $d){
            array_push($output, array('value' => $d->nim,));
        }
        if (! empty($output)) {
            // Encode ke format JSON.
            echo json_encode($output);
        }
    }

    public function get_penghuni_json(){
        $data = $this->am->get_penghuni();
        $output = array();
        foreach($data as $d){
            array_push($output, array('value' => $d->nim,));
        }
        if (! empty($output)) {
            // Encode ke format JSON.
            echo json_encode($output);
        }
    }

    public function add_penghuni(){
        $this->cek_session();
        $insert = $this->am->insert_penghuni();                  
        if($insert){
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Data Berhasil Ditambah Cetak <a href='#'>disini</a></div>");
        }else{
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Something Wrong</div>");
        }
        redirect($this->cek_level()."/insert_penghuni");

    }

    public function data_pendaftaran(){
        $this->cek_session();
        $data['menu'] = "Data Pendaftaran";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['pendaftar'] = $this->am->get_pendaftar_full();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_pendaftaran",$data);
        $this->load->view('dash_footer');
    }

    public function get_token(){
        $this->cek_session();
        $data['menu'] = "Get Token";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/get_token",$data);
        $this->load->view('dash_footer');
    }

    

   


}