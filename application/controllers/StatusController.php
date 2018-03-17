<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StatusController extends CI_Controller {

	public function index(){
		$data = array('title' => 'Status Skripsi');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('mhs-status/infomhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

}