<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InfomhsController extends CI_Controller {

	public function index(){
        $data = array('title' => 'Profil Mahasiswa');

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header',$data);
			$this->load->view('mhs-profil/infomhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

	// public function AddMhs()
	// {
	// 	if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
 //            $this->load->view('outer/header');
	// 		$this->load->view('mhs-profil/addmhs');
 //            $this->load->view('outer/footer');
 //        }else{
 //            redirect('/');
 //        }
	// }

	public function editMhs()
	{
        $data = array('title' => 'Profil Mahasiswa');
        
		if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header',$data);
			$this->load->view('mhs-profil/editmhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}
}