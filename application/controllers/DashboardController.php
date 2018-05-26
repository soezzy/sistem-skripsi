<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{
    
    public function index(){
        $data = array('title' => 'Dashboard');
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])==1 && ($_SESSION['status']=='aktif')){
            $this->load->view('outer/header', $data);
			$this->load->view('dashboard');
            $this->load->view('outer/footer');
        }else if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $data);
            $this->load->view('admin-dashboard');
            $this->load->view('admin/footer');
        }else{
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Akun anda belum melalui verifikasi email. Silahkan verifikasi terlebih dahulu.</div>');
            redirect('/');
        }
        
    }
    
    public function logout(){
        
        if($this->session->has_userdata('iduser')){
            $this->session->sess_destroy();
            redirect('/');
        }
        
        
    }
}

 ?>