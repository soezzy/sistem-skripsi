<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{
    
    public function index(){
        $data = array('title' => 'Dashboard');
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('dashboard');
            $this->load->view('outer/footer');
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

 ?>