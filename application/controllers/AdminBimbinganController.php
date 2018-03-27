<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminBimbinganController extends CI_Controller {

	public function index(){

        $data = array('title' => 'Bimbingan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-bimbingan/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function detailBimbingan(){

        $data = array('title' => 'Bimbingan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-bimbingan/detailbimbingan');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

}