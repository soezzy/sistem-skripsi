<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BimbinganController extends CI_Controller {

	public function index(){
		$data = array('title' => 'Bimbingan Skripsi');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $data);
			$this->load->view('mhs-bimbingan/infomhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}
}