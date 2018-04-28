<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignupController extends CI_Controller {
	
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
           	$this->load->view('templates/header');
			$this->load->view('create');
			$this->load->view('templates/footer');
        }
		
	}
	public function create()
	{
		date_default_timezone_set('Asia/Jakarta');		

		if(isset($_SESSION['iduser'])){
			redirect('dashboard');
        }
		    // validasi form
		$this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[users.iduser]',
			array('required' 	=> 'nomor induk mahasiswa wajib di isi.',
				  'is_unique' 	=> 'nomor induk mahasiswa sudah digunakan.'));

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]',
			array('required' 	=> 'email wajib di isi.',
				  'valid_email' => 'format email anda salah.',
				  'is_unique' 	=> 'email anda sudah digunakan.'));

		$this->form_validation->set_rules('password', 'Password', 'required',
			array('required'	=> 'password harus terisi.'));

		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]',
			array('required' 	=> 'konfirmasi password harus terisi',
				  'matches'		=> 'konfirmasi anda tidak cocok'));

		if ($this->form_validation->run()== false) {
		// jika salah
			$this->load->view('templates/header');
			$this->load->view('create');
			$this->load->view('templates/footer');
		}else{
		// jika benar, enkripsi password
			$enc_password = md5($this->input->post('password'));

			$data = array(
			'iduser' 		=> $this->input->post('nim'),
			'email' 		=> $this->input->post('email'),
			'password' 		=> $enc_password,
			'level' 		=> 1,
			'status' 		=> 'nonaktif',
			'created_at' 	=> strftime('%Y-%m-%d'),
			'lastvisit_at' 	=> strftime('%Y-%m-%d %H:%M:%S'),
		);
		// masuk model
			if ($this->Mahasiswa_model->register($data)) {
				if ($this->Mahasiswa_model->kirimEmail($this->input->post('email'))) {

				$this->load->view('templates/header');
				$this->load->view('sukses');
				$this->load->view('templates/footer');
				}
				
			}
		}

	}

	public function confirmEmail($hash)
	{
		if($this->Mahasiswa_model->verifyEmail($hash)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email anda sudah diverifikasi, silahkan login di halaman beranda.</div>');
            redirect('/');
        }else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email anda tidak terkonfirmasi oleh kami, silahkan verifikasi ulang.</div>');
            redirect('/');
        }
	}
}
