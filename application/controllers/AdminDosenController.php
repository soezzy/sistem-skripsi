<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminDosenController extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmdosen');
    }

	public function index(){

        $title = array('title' => 'Data Dosen');
        $data['data'] = $this->madmdosen->info(); 
        // var_dump($data);die();
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-dosen/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function detaildosen($id){

        $title = array('title' => 'Data Dosen');
        $data['data'] = $this->madmdosen->detail($id);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-dosen/detailadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function editdosen($id){
        $title = array('title' => 'Data Dosen');
        $data['data'] = $this->madmdosen->edit($id);

        if(isset($_SESSION['status'])=="aktif" && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-dosen/editadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function edit($id){
        // validasi kuota
         $this->form_validation->set_rules('kuota', 'kuota', 'max_length[3]',
            array('max_length'    => 'maksimal input 3 digit.'));

        if($this->form_validation->run()==false) {
        // jika salah
        return $this->editdosen($id);
        }else{
            $data = array('kuota'=> $this->input->post('kuota'));
            // var_dump($data);die();
            if ($this->madmdosen->updatepeg($id,$data)) {
                $this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data telah diperbarui.</div>');
                redirect('adm-dosen');
            }
        }
    }

}