<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InfomhsController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mmhsprofil');
	}

	public function index(){
        $title 		  = array('title' => 'Profil Mahasiswa');
        $data['data'] = $this->mmhsprofil->info();  
		if(isset($_SESSION['iduser']) && ($_SESSION['level'])==1){
            $this->load->view('outer/header',$title);
			$this->load->view('mhs-profil/infomhs', $data);
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

	public function editMhs()
	{
		// var_dump($_SESSION);die();
		if ($this->session->userdata('logged_in')) { 
				$title = array('title' => 'Profil Mahasiswa');
				$data['data'] = $this->mmhsprofil->edit($_SESSION['idmhs']);

				$this->load->view('outer/header',$title);
				$this->load->view('mhs-profil/editmhs',$data);
	            $this->load->view('outer/footer');
			}else{
            redirect('/');
        }
	}

	public function update()
	{
		// validasi form
		$this->form_validation->set_rules('namamhs', 'namamhs', 'required',
			array('required' 	=> 'Nama harus terisi.'));

		$this->form_validation->set_rules('angkatan', 'angkatan', 'exact_length[4]',
			array('exact_length' => 'Harus tepat 4 karakter.'));

		$this->form_validation->set_rules('jurusan', 'jurusan', 'required',
			array('required'	=> 'Jurusan harus terisi.'));

		$this->form_validation->set_rules('email', 'email', 'required', 'valid_email',
            array('required'    => 'Email harus terisi.',
                  'valid_email' => 'Email tidak valid, Isi lagi dengan benar.'));

		$this->form_validation->set_rules('telepon', 'telepon', 'required|min_length[10]|max_length[13]',
			array('required'	=> 'nomor telepon harus terisi.',
				  'min_length'	=> 'nomor telepon harus lebih dari 10.',
				  'max_length'	=> 'nomor telepon harus kurang dari 13.',
		));

		$this->form_validation->set_rules('alamat', 'alamat', 'required',
			array('required'	=> 'alamat harus terisi.'));

		if ($this->form_validation->run()== false) {
		// jika salah
		return $this->editmhs($_SESSION['idmhs']);
			
		}else{
			 if($this->input->post('jeniskel')=="Laki-laki") {
                $jenis = 'L';
            }else{
                $jenis =  'P';
            }
			$data = array(
			'idmhs' 	=> $_SESSION['idmhs'],
			'namamhs' 	=> $this->input->post('namamhs'),
			'jeniskel'	=> $jenis,
			'angkatan' 	=> $this->input->post('angkatan'),
			'alamat' 	=> $this->input->post('alamat'),
			'telepon' 	=> $this->input->post('telepon'),
			'jurusan' 	=> $this->input->post('jurusan'),
		);
			$data2 = array(
                'iduser' => $_SESSION['iduser'],
                'email'  => $this->input->post('email'));
		// masuk model
			$this->mmhsprofil->update($data);
			$this->mmhsprofil->updateuser($data2);
			if ($this->mmhsprofil->update($data)==true && $this->mmhsprofil->updateuser($data2)==true) {
				$this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data anda sudah diperbarui.</div>');
				redirect('profil');
			}
		}

	}
}