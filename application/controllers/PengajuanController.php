<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PengajuanController extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('mmhspengajuan');
    }

	public function index(){
		$title = array('title' => 'Pengajuan Skripsi');
        $data['data'] = $this->mmhspengajuan->info($_SESSION['idmhs']);

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])=='1'){
            $this->load->view('outer/header', $title);
			$this->load->view('mhs-pengajuan/infomhs',$data);
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

	public function editSkripsi()
	{
		$title = array('title' => 'Pengajuan Skripsi');
        $data['data'] = $this->mmhspengajuan->DataDosen();
		if(isset($_SESSION['iduser']) && ($_SESSION['level'])=='1'){
            $this->load->view('outer/header', $title);
			$this->load->view('mhs-pengajuan/editmhs', $data);
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
	}

	public function tambah()
	{
		date_default_timezone_set('Asia/Jakarta');		

		$this->form_validation->set_rules('judul', 'judul', 'required|is_unique[skripsi.judul]',
            array('required'    => 'Judul harus terisi.',
                  'is_unique'   => 'Judul sudah digunakan.'));

        $this->form_validation->set_rules('abstrak', 'abstrak', 'required',
            array('required'    => 'Abstrak harus terisi.'));

        $this->form_validation->set_rules('dospem', 'dospem', 'required',
            array('required'    => 'Wajib memilih dosen pembimbing.'));

        if($this->form_validation->run()== FALSE) {

	        // jika salah
	        $data['data'] = $this->mmhspengajuan->DataDosen();

	        $title = array('title' => 'Data Pegawai');
	        $this->load->view('outer/header', $title);
			$this->load->view('mhs-pengajuan/editmhs', $data);
	        $this->load->view('outer/footer');

    	}else{
    		$config['upload_path'] 		= './pdf/'; 	//path folder
		    $config['allowed_types'] 	= 'pdf'; 		//Allowing types
		    $config['max_size']			= '100000';		// maximum size per file
		    $config['encrypt_name'] 	= TRUE; 		//encrypt file name 
		    $config['detect_mime'] 		= TRUE;			// detect injection attacks
		    $this->upload->initialize($config);

		    if(!empty($_FILES['fileupload']['name'])){
		    	// var_dump($_FILES['fileupload']['name']);die();

		        if ($this->upload->do_upload('fileupload')){

		            $data    = $this->upload->data();
		            $filepdf = $data['file_name']; //get file name
					$data = array(
		                'judul'    	 => strtolower($this->input->post('judul')),
		                'abstrak'    => $this->input->post('abstrak'),
		                'idmhs' 	 => $_SESSION['idmhs'],
		                'dospem'     => $this->input->post('dospem'),
		                'statskripsi'=> 1,
		                'fileupload' => $filepdf,
		                'created_at' => strftime('%Y-%m-%d %H:%M:%S'),
	                );
					// var_dump($data);die();
					if ($this->mmhspengajuan->insert($data)) {
						$this->session->set_flashdata('success', '<div class="alert alert-success text-center">Data tersimpan.</div>');
		            	redirect('pengajuan');
					}

				}else{
					$this->session->set_flashdata('errorupload', '<div class="alert alert-danger text-center">Terjadi kesalahan saat proses upload. Silahkan coba lagi.</div>');
		            redirect('pengajuan/edit');
		        }
	    	} else {
	    		$this->session->set_flashdata('error', '<div class="alert alert-danger text-center">File PDF pengajuan skripsi wajib di upload!</div>');
		            redirect('pengajuan/edit');
	    	}
        }
    }
}