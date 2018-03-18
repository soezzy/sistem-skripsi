<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminProfilController extends CI_Controller {

	 public function index(){

        $data = array('title' => 'Profil Pegawai');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-profil/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function editAdm()
	{
        $data = array('title' => 'Profil Pegawai');
        
		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header',$data);
			$this->load->view('adm-profil/editadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
	}

}