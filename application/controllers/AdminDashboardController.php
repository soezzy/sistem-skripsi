<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminDashboardController extends CI_Controller {

	 public function index(){

        $data = array('title' => 'Dashboard');
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
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