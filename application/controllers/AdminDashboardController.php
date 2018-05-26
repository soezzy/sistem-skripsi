<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminDashboardController extends CI_Controller {

	 public function index(){
        $title = array('title' => 'Admin Dashboard');
        if(($_SESSION['level'])!=1 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
			$this->load->view('admin-dashboard');
            $this->load->view('admin/footer');
        }else{
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