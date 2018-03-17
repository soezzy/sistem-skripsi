<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mahasiswa_model');
	}

	public function index()
	{
		if(isset($_SESSION['iduser'])){
			redirect('dashboard');
        }else{
            $this->load->view('welcome');
        }
		
	}

	public function login()
	{
		$this->form_validation->set_rules('login_nim','NIM Login', 'required|trim',
		array('required' => 'Nomor induk mahasiswa wajib di isi.',));

		$this->form_validation->set_rules('login_password','Password Login','required|trim',
		array('required' => 'Password harus diisi.'));

		if ($this->form_validation->run() == false) {
			redirect('/skripsi');
		}else{
			$login_nim = $this->input->post('login_nim');
			$login_password = md5($this->input->post('login_password'));

			if ($this->Mahasiswa_model->LoginUser($login_nim, $login_password)) {
					$userInfo = $this->Mahasiswa_model->loginUser($login_nim, $login_password);
					$this->session->set_flashdata('login_msg',
						'<div class="alert alert-success text-center">Login Sukses.</div>');
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('login_msg', 
						'<div class="alert alert-danger text-center">Login gagal! Silahkan coba lagi.</div>');
					redirect('/skripsi');

				}
		}
	}
}
