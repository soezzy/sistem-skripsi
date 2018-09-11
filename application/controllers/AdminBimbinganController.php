<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminBimbinganController extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmbimbingan');
    }

	public function index(){

        $title = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmbimbingan->info($_SESSION['idpeg']);
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-bimbingan/infoadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    //fungsi untuk bimbingan sebagai dosen pembimbing
    public function detailBimbingan($id){

        date_default_timezone_set('Asia/Jakarta');
        $isi = '';
        $tittle = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmbimbingan->detail($id,$_SESSION['idpeg']);
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
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
                if ($this->madmbimbingan->revisi($isi)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Catatan revisi anda telah berhasil diperbarui.</div>');
                    $url = base_url('adm-bimbingan/detail/'.$id);
                   redirect($url);
                }
            }

        }else{
            redirect('/');
        }
    }

    //fungsi untuk bimbingan sebagai penguji 1
    public function detailBimuji1($id){
        date_default_timezone_set('Asia/Jakarta');
        $isi = '';
        $tittle = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmbimbingan->detailuji1($id,$_SESSION['idpeg']);
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $tittle);
            $this->load->view('adm-bimbingan/editadm1' ,$data);
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
                if ($this->madmbimbingan->revisi($isi)==TRUE) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Catatan revisi anda telah berhasil diperbarui.</div>');
                    $url = base_url('adm-bimbingan/detail-uji1/'.$id);
                   redirect($url);
                }else{
                    $this->session->set_flashdata('error', '<div class="alert alert-success text-center">Transactions error server occured!</div>');
                    $url = base_url('adm-bimbingan/detail-uji1/'.$id);
                    redirect($url);
                }
            }

        }else{
            redirect('/');
        }
    }

    //fungsi untuk bimbingan sebagai penguji 2
    public function detailBimuji2($id){

        date_default_timezone_set('Asia/Jakarta');
        $isi = '';
        $tittle = array('title' => 'Bimbingan Skripsi Mahasiswa');
        $data['data'] = $this->madmbimbingan->detailuji2($id,$_SESSION['idpeg']);
        if(($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $tittle);
            $this->load->view('adm-bimbingan/editadm2' ,$data);
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
                if ($this->madmbimbingan->revisi($isi)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Catatan revisi anda telah berhasil diperbarui.</div>');
                    $url = base_url('adm-bimbingan/detail-uji2/'.$id);
                   redirect($url);
                }
            }

        }else{
            redirect('/');
        }
    }

    //fungsi untuk pendaftaran ujian proposal skripsi 
    public function ujiprop($id)
    {
        date_default_timezone_set('Asia/Jakarta');  
        $data = array(
                'idskripsi'   => $id,
                'validator'   => $_SESSION['idpeg'],
                'statskripsi' => 5,
                'catatan'     => 'Daftar Ujian Proposal',
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
        );

        if ($this->madmbimbingan->ujiprop($id,$data)) {
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Skripsi telah didaftarkan ke Ujian Proposal.</div>');
            redirect('adm-bimbingan');
        }
    }

    //fungsi untuk pendaftaran ujian skripsi 
    public function ujiskrip($id)
    {
        date_default_timezone_set('Asia/Jakarta');  
        $data = array(
                'idskripsi'   => $id,
                'validator'   => $_SESSION['idpeg'],
                'statskripsi' => 7,
                'catatan'     => 'Daftar Ujian Skripsi',
                'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
        );
        if ($this->madmbimbingan->ujiskrip($id,$data)) {
            $this->session->set_flashdata('success1', '<div class="alert alert-success text-center">Skripsi telah didaftarkan ke Ujian Skripsi.</div>');
            redirect('adm-bimbingan');
        }
    }

}