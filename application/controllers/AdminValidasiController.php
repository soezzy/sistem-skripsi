<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminValidasiController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmvalidasi');
    }

    public function index(){
        $title = array('title' => 'Validasi Pengajuan Skripsi');
        $data['data'] = $this->madmvalidasi->info(); 
        if(isset($_SESSION['iduser']) && ($_SESSION['level']) != 1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-validasi/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function detail($id){

        $title = array('title' => 'Validasi Pengajuan Skripsi');
        $data['data'] = $this->madmvalidasi->detail($id); 
        if(isset($_SESSION['iduser']) && ($_SESSION['level']) != 1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-validasi/editadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function terimaskripsi($id)
    {
        date_default_timezone_set('Asia/Jakarta');  
        $data = array(
                'idskripsi'   => $id,
                'validator'   => $_SESSION['idpeg'],
                'statskripsi' => 4,
                'catatan'     => $this->input->post('catatan'),
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
        );

        $data2 = array(
                'idskripsi' => $id,
                'idmhs' => $this->input->post('idmhs'),
                'idpeg' => $_SESSION['idpeg'],
                'catatan' => '',
                'statbimbingan' => 0,
                'updated_at' => strftime('%Y-%m-%d %H:%M:%S'),
        );
        
        if ($this->madmvalidasi->terima($id,$data,$data2)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Proses validasi berhasil.</div>');
            redirect('adm-validasi');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Terjadi kesalahan dalam proses validasi. Coba ulangi lagi</div>');
            redirect('adm-validasi/detail/'.$id);
        }
       
    }

    public function tolakskripsi($id)
    {
        date_default_timezone_set('Asia/Jakarta');      

        $data = array(
                'idskripsi'   => $id,
                'validator'   => $_SESSION['idpeg'],
                'statskripsi' => 3,
                'catatan'     => $this->input->post('catatan'),
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
        );

        if ($this->madmvalidasi->tolak($id,$data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Proses validasi berhasil.</div>');
            redirect('adm-validasi');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Terjadi kesalahan dalam proses validasi. Coba ulangi lagi</div>');
            redirect('adm-validasi/detail/'.$id);
        }
         
    }

}