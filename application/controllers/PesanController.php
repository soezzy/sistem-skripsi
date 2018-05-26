<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PesanController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mmhspesan');
    }

    public function index(){

        $title = array('title' => 'Perpesanan');
        $data['data'] = $this->mmhspesan->info($_SESSION['idmhs']);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $title);
            $this->load->view('mhs-pesan/infomhs', $data);
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
        
    }

    public function TambahPesan(){

        $title = array('title' => 'Perpesanan');
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $title);
            $this->load->view('mhs-pesan/tambahmhs');
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
        
    }

    public function DetailPesan($id){
        $this->mmhspesan->read($id);

        $title = array('title' => 'Perpesanan');
        $data['data'] = $this->mmhspesan->infopesan($id);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('outer/header', $title);
            $this->load->view('mhs-pesan/editmhs', $data);
            $this->load->view('outer/footer');
        }else{
            redirect('/');
        }
        
    }

    public function PesanBaru(){
        date_default_timezone_set('Asia/Jakarta');
        $nip = $this->input->post('nik');
        $idpeg = $this->mmhspesan->ambilid($nip);
        $data = array(
            'idmhs'     => $_SESSION['idmhs'],
            'idpeg'     => $idpeg[0]['idpeg'],
            'subject'   => $this->input->post('subject'),
            'konten'    => $this->input->post('pesan'),
            'created_at'=> strftime('%Y-%m-%d %H:%M:%S'),
            'statpesan' => 0,
            'pengirim'  => $_SESSION['idmhs'],
        );

        if ($this->mmhspesan->pesanbaru($data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Pesan telah terkirim.</div>');
            redirect('pesan');
        }
    }

    public function BalasPesan(){
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'idmhs'     => $_SESSION['idmhs'],
            'idpeg'     => $this->input->post('idpeg'),
            'subject'   => $this->input->post('subject'),
            'konten'    => $this->input->post('pesan'),
            'created_at'=> strftime('%Y-%m-%d %H:%M:%S'),
            'statpesan' => 0,
            'pengirim'  => $_SESSION['idmhs'],
        );

        if ($this->mmhspesan->balas($data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Pesan telah terkirim.</div>');
            redirect('pesan');
        }
    }

}