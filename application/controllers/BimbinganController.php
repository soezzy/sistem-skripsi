<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BimbinganController extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('mmhsbimbingan');
    }

	public function index(){

		if(isset($_SESSION['iduser']) && ($_SESSION['level'])=='1'){
		$title = array('title' => 'Pengajuan Skripsi');
     	$data['data'] = $this->mmhsbimbingan->info($_SESSION['idmhs']);
      $this->load->view('outer/header', $title);
		$this->load->view('mhs-bimbingan/infomhs',$data);
      $this->load->view('outer/footer');
      }else{
            redirect('/');
        }
		
	}

	public function revisi()
	{
		date_default_timezone_set('Asia/Jakarta');
			$isi = '';
			$title = array('title' => 'Pengajuan Skripsi');
	     	$data['data'] = $this->mmhsbimbingan->info($_SESSION['idmhs']);
	      	$this->load->view('outer/header', $title);
			$this->load->view('mhs-bimbingan/infomhs',$data);
	      	$this->load->view('outer/footer');

			if ($this->input->post('catatandospem')!=NULL) {
				$isi = array(
					'idskripsi' 		=> $this->input->post('idskripsi'),
					'idmhs'				=> $_SESSION['idmhs'],
					'idpeg'				=> $this->input->post('idpeg'),
					'catatan'			=> $this->input->post('catatandospem'),
					'statbimbingan'	=> 1,
					'updated_at'		=> strftime('%Y-%m-%d %H:%M:%S'),
				);
			}

			if ($this->input->post('catatanpenguji1')!=NULL) {
				$isi = array(
						'idskripsi' 		=> $this->input->post('idskripsi'),
						'idmhs'				=> $_SESSION['idmhs'],
						'idpeg'				=> $this->input->post('idpeg'),
						'catatan'			=> $this->input->post('catatanpenguji1'),
						'statbimbingan'	=> 1,
						'updated_at'		=> strftime('%Y-%m-%d %H:%M:%S'),
					);
			}

			if ($this->input->post('catatanpenguji2')!=NULL) {
				$isi = array(
						'idskripsi' 		=> $this->input->post('idskripsi'),
						'idmhs'				=> $_SESSION['idmhs'],
						'idpeg'				=> $this->input->post('idpeg'),
						'catatan'			=> $this->input->post('catatanpenguji2'),
						'statbimbingan'	=> 1,
						'updated_at'		=> strftime('%Y-%m-%d %H:%M:%S'),
					);
			}
			if ($isi != NULL) {
				if ($this->mmhsbimbingan->revisi($isi)) {
					$this->session->set_flashdata('success', '<div class="alert alert-success text-center">Catatan revisi anda telah berhasil diperbarui.</div>');
				   redirect('bimbingan');
				}
			}
	}

	public function tambah($id)
	{
		date_default_timezone_set('Asia/Jakarta');		

 		$config['upload_path'] 		= './pdf/'; 	// path folder
	   	$config['allowed_types'] 	= 'pdf'; 		// Allowing types
	   	$config['max_size']			= '100000';		// maximum size per file
	   	$config['detect_mime'] 		= TRUE;			// detect injection attacks
	   	$config['overwrite'] 		= TRUE;
	   	$this->upload->initialize($config);

		if(!empty($_FILES['fileupload']['name'])){
		   	$data['data'] = $this->mmhsbimbingan->info($_SESSION['idmhs']);

		   	if ($_FILES['fileupload']['name']== $data['data']['query1'][0]->fileupload) {
		   		if ($this->upload->do_upload('fileupload')){

			         $data    = $this->upload->data();
			    		$filepdf = $data['file_name']; //get file name

			    		if ($this->mmhsbimbingan->insert($id,$filepdf)) {
			    			$this->session->set_flashdata('success', '<div class="alert alert-success text-center">Data telah diperbarui.</div>');
			         	redirect('bimbingan');
			    		}
					}else{
						$this->session->set_flashdata('errorupload', '<div class="alert alert-danger text-center">Terjadi kesalahan saat proses upload. Silahkan coba lagi.</div>');
			            redirect('bimbingan');
			      }
		   	} else {
			    	$this->session->set_flashdata('error', '<div class="alert alert-danger text-center">File nama PDF anda tidak sesuai! Silahkan Cek kembali.</div>');
			      redirect('bimbingan');
	    		} 
		   	}
    }
}
