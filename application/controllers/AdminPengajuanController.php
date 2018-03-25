<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPengajuanController extends CI_Controller {

	public function index(){

        $data = array('title' => 'Pengajuan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-pengajuan/infoadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function detailSkripsi()
    {
    	 $data = array('title' => 'Pengajuan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-pengajuan/detailskripsiadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function detailPengajuan()
    {
    	 $data = array('title' => 'Pengajuan Skripsi Mahasiswa');

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $data);
			$this->load->view('adm-pengajuan/detailpengajuanadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

}