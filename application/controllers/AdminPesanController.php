<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPesanController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmpesan');
    }

	public function index(){

        $title = array('title' => 'Perpesanan');
        $data['data'] = $this->madmpesan->info($_SESSION['idpeg']);
        if(($_SESSION['level'])!=1 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pesan/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function TambahPesan(){

        $title = array('title' => 'Perpesanan');
        if(($_SESSION['level'])!=1 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pesan/tambahadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function DetailPesan($id){
        $this->madmpesan->read($id);

        $title = array('title' => 'Perpesanan');
        $data['data'] = $this->madmpesan->infopesan($id);
        if(($_SESSION['level'])!=1 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pesan/editadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function PesanBaru(){
        date_default_timezone_set('Asia/Jakarta');
        $nim = $this->input->post('nim');
        $idmhs = $this->madmpesan->ambilid($nim);

        $data = array(
            'idmhs'     => $idmhs[0]['idmhs'],
            'idpeg'     => $_SESSION['idpeg'],
            'subject'   => $this->input->post('subject'),
            'konten'    => $this->input->post('pesan'),
            'created_at'=> strftime('%Y-%m-%d %H:%M:%S'),
            'statpesan' => 0,
            'pengirim'  => $_SESSION['idpeg'],
        );

        if ($this->madmpesan->pesanbaru($data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Pesan telah terkirim.</div>');
            redirect('adm-pesan');
        }
    }

    public function BalasPesan(){
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'idpeg'     => $_SESSION['idpeg'],
            'idmhs'     => $this->input->post('idmhs'),
            'subject'   => $this->input->post('subject'),
            'konten'    => $this->input->post('pesan'),
            'created_at'=> strftime('%Y-%m-%d %H:%M:%S'),
            'statpesan' => 0,
            'pengirim'  => $_SESSION['idpeg'],
        );

        if ($this->madmpesan->balas($data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Pesan telah terkirim.</div>');
            redirect('adm-pesan');
        }
    }

}