<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPegawaiController extends CI_Controller {

	public function index(){

        $data = array('title' => 'Data Pegawai');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-pegawai/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

}