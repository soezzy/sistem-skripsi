<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPendaftaranController extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmpendaftaran');
    }

	public function index(){

        $title = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmpendaftaran->info($_SESSION['idpeg']);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pendaftaran/infoadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function detailBimbingan($id){

        date_default_timezone_set('Asia/Jakarta');
        $isi = '';
        $tittle = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmpendaftaran->detail($id,$_SESSION['idpeg']);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $tittle);
			$this->load->view('adm-bimbingan/editadm' ,$data);
            $this->load->view('admin/footer');

        if ($this->input->post('catatandospem')!=NULL) {
                $isi = array(
                    'idskripsi'         => $this->input->post('idskripsi'),
                    'idmhs'             => $this->input->post('idmhs'),
                    'idpeg'             => $_SESSION['idpeg'],
                    'catatan'           => $this->input->post('catatandospem'),
                    'statbimbingan'     => $this->input->post('status'),
                    'updated_at'        => strftime('%Y-%m-%d %H:%M:%S'),
                );
            }
        if ($isi != NULL) {
                if ($this->madmpendaftaran->revisi($isi)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Catatan revisi anda telah berhasil diperbarui.</div>');
                    $url = base_url('adm-bimbingan/detail/'.$id);
                   redirect($url);
                }
            }

        }else{
            redirect('/');
        }
    }

    public function ujiprop($id)
    {
        if ($this->madmpendaftaran->ujiprop($id)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Skripsi telah didaftarkan ke Ujian Proposal.</div>');
            redirect('adm-bimbingan');
        }
    }

    public function ujiskrip($id)
    {
        if ($this->madmpendaftaran->ujiskrip($id)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Skripsi telah didaftarkan ke Ujian Skripsi.</div>');
            redirect('adm-bimbingan');
        }
    }

}