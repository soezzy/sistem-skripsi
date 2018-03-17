<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PengajuanController extends CI_Controller {

	public function index(){
		$data = array('title' => 'Pengajuan Skripsi');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('mhs-pengajuan/infomhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

	public function editSkripsi()
	{
		$data = array('title' => 'Pengajuan Skripsi');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('mhs-pengajuan/editmhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}
}