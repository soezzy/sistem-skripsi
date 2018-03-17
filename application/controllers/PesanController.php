<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PesanController extends CI_Controller {

	public function index(){
		$data = array('title' => 'Perpesanan');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('mhs-pesan/infomhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

}