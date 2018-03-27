<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPesanController extends CI_Controller {

	public function index(){

        $data = array('title' => 'Bimbingan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-pesan/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

}