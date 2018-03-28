<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminDosenController extends CI_Controller {

	public function index(){

        $data = array('title' => 'Data Dosen');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-dosen/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

}