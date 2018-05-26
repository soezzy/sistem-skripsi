<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPengajuanController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmpengajuan');
    }

	public function index(){
        $title = array('title' => 'Pengajuan Skripsi Mahasiswa');
        $data['data'] = $this->madmpengajuan->info($_SESSION['idpeg']);
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pengajuan/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function detail($id){

        $title = array('title' => 'Pengajuan Skripsi Mahasiswa');
        $data['data'] = $this->madmpengajuan->detail($id); 
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pengajuan/editadm', $data);
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
                'statskripsi' => 2,
                'catatan'     => $this->input->post('catatan'),
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
                'validator'   => $_SESSION['idpeg'],
        );

        if ($this->madmpengajuan->terima($id,$data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Proses validasi berhasil.</div>');
            redirect('adm-pengajuan');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Kuota anda telah mencapai batas maksimum. Tidak bisa menerima pengajuan skripsi baru.</div>');
            redirect('adm-pengajuan/detail/'.$id);
        }
       
    }

    public function tolakskripsi($id)
    {
        date_default_timezone_set('Asia/Jakarta');      
        $idm  = $this->input->post('idmhs');        
        $data = array(
                'idskripsi'   => $id,
                'statskripsi' => 3,
                'catatan'     => $this->input->post('catatan'),
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
                'validator'   => $_SESSION['idpeg'],
        );
        if ($this->madmpengajuan->tolak($id,$data,$idm)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Proses validasi berhasil.</div>');
            redirect('adm-pengajuan');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Terjadi kesalahan dalam proses validasi. Coba ulangi lagi</div>');
            redirect('adm-pengajuan/detail/'.$id);
        }
         
    }

}