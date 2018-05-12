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
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pendaftaran/infoadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function tambahpenguji($id){
        $isi = '';
        $isi2 = '';
        $ids ='';
        $tittle = array('title' => 'Pengajuan Ujian Mahasiswa');
        $data['data'] = $this->madmpendaftaran->detail($id);

        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
            $this->load->view('admin/header', $tittle);
			$this->load->view('adm-pendaftaran/editadm' ,$data);
            $this->load->view('admin/footer');

            if ($this->input->post('penguji1')!=NULL) {
                $ids = $this->input->post('idskripsi');
                $isi = $this->input->post('penguji1');
            }

            if ($this->input->post('penguji2')!=NULL) {
                $ids = $this->input->post('idskripsi');
                $isi2 = $this->input->post('penguji1');
            }

            if ($isi != NULL && $ids != NULL) {
                if ($this->madmpendaftaran->uppenguji1($isi,$ids)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Dosen penguji 1 telah berhasil ditambahkan.</div>');
                    $url = base_url('adm-daftar/penguji/'.$id);
                    redirect($url);
                }
            }

            if ($isi2 != NULL && $ids != NULL) {
                if ($this->madmpendaftaran->uppenguji2($isi2,$ids)) {
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
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])){
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
}