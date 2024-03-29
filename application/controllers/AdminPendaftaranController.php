<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPendaftaranController extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmpendaftaran');
    }

	public function index(){

        $title = array('title' => 'Pengajuan Ujian Mahasiswa');
        $data['data'] = $this->madmpendaftaran->info();
        if(($_SESSION['level'])==4 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pendaftaran/infoadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function tambahpenguji($id){
        date_default_timezone_set('Asia/Jakarta');  
        $isi = '';
        $isi2 = '';
        $ids ='';
        $tittle = array('title' => 'Pengajuan Ujian Mahasiswa');
        $data['data'] = $this->madmpendaftaran->detail($id);
        if(($_SESSION['level'])==4 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $tittle);
			$this->load->view('adm-pendaftaran/editadm' ,$data);
            $this->load->view('admin/footer');

            if ($this->input->post('penguji1')!=NULL) {
                $ids = $this->input->post('idskripsi');
                $isi = $this->input->post('penguji1');

                $data = array(
                    'idskripsi' => $ids,
                    'idmhs' => $this->input->post('idmhs'),
                    'idpeg' => $isi,
                    'catatan' => '',
                    'statbimbingan' => 0,
                    'updated_at' => strftime('%Y-%m-%d %H:%M:%S'),
                );
        
            }

            if ($this->input->post('penguji2')!=NULL) {
                $ids = $this->input->post('idskripsi');
                $isi2 = $this->input->post('penguji2');
                $data2 = array(
                    'idskripsi' => $ids,
                    'idmhs' => $this->input->post('idmhs'),
                    'idpeg' => $isi2,
                    'catatan' => '',
                    'statbimbingan' => 0,
                    'updated_at' => strftime('%Y-%m-%d %H:%M:%S'),
                );
            }

            if ($isi != NULL && $ids != NULL) {
                if ($this->madmpendaftaran->uppenguji1($isi,$ids,$data)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Dosen penguji 1 telah berhasil ditambahkan.</div>');
                    $url = base_url('adm-daftar/penguji/'.$id);
                    redirect($url);
                }
            }

            if ($isi2 != NULL && $ids != NULL) {
                if ($this->madmpendaftaran->uppenguji2($isi2,$ids,$data2)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Dosen penguji 2 telah berhasil ditambahkan.</div>');
                    $url = base_url('adm-daftar/penguji/'.$id);
                    redirect($url);
                }
            }

        }else{
            redirect('/');
        }
    }

    public function validasi($idm,$ids)
    {
        date_default_timezone_set('Asia/Jakarta');

        $title = array('title' => 'Pengajuan Ujian Mahasiswa');
        $data['data'] = ['idm' =>$idm, 'ids'=>$ids];
        $isi = '';
        if(($_SESSION['level'])==4 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pendaftaran/validasiadm',$data);
            $this->load->view('admin/footer');

        if ($this->input->post('catatan')!=NULL) {
                $isi = array(
                    'idskripsi'   => $ids,
                    'validator'   => $_SESSION['idpeg'],
                    'statskripsi' => 6,
                    'catatan'     => $this->input->post('catatan'),
                    'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
                );
            }    

        if ($isi != NULL) {
                if ($this->madmpendaftaran->updateproposal($isi)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Validasi telah berhasil.</div>');
                   redirect('adm-daftar');
                }
            }

        }else{
            redirect('/');
        }
    }

    public function validasiskripsi($idm,$ids)
    {
        date_default_timezone_set('Asia/Jakarta');

        $title = array('title' => 'Pengajuan Ujian Mahasiswa');
        $data['data'] = ['idm' =>$idm, 'ids'=>$ids];
        $isi = '';
        if(($_SESSION['level'])==4 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pendaftaran/valskripsiadm',$data);
            $this->load->view('admin/footer');

        if ($this->input->post('catatan')!=NULL) {
                $isi = array(
                    'idskripsi'   => $ids,
                    'validator'   => $_SESSION['idpeg'],
                    'statskripsi' => 8,
                    'catatan'     => $this->input->post('catatan'),
                    'created_at'  => strftime('%Y-%m-%d %H:%M:%S'),
                );
            }    

        if ($isi != NULL) {
                if ($this->madmpendaftaran->updateskripsi($isi)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Validasi telah berhasil.</div>');
                   redirect('adm-daftar');
                }
            }

        }else{
            redirect('/');
        }
    }
}