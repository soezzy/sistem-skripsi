<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminProfilController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmprofil');
    }

	 public function index(){

        $title = array('title' => 'Profil Pegawai');
        $data['data'] = $this->madmprofil->info(); 
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-profil/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function editAdm($id)
	{
		if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $title = array('title' => 'Profil Pegawai');
            $data['data'] = $this->madmprofil->edit($id);
            $this->load->view('admin/header',$title);
			$this->load->view('adm-profil/editadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
	}

    public function update()
    {
        // validasi form
        $this->form_validation->set_rules('namapeg', 'namapeg', 'required',
            array('required'    => 'nama harus terisi.'));

         $this->form_validation->set_rules('email', 'email', 'required', 'valid_email',
            array('required'    => 'email harus terisi.',
                  'valid_email' => 'Email tidak valid, Isi lagi dengan benar.'));


        $this->form_validation->set_rules('telepon', 'telepon', 'required|min_length[10]|max_length[13]',
            array('required'    => 'nomor telepon harus terisi.',
                  'min_length'  => 'nomor telepon harus lebih dari 10.',
                  'max_length'  => 'nomor telepon harus kurang dari 13.'));

        if($this->form_validation->run()==false) {
        // jika salah
        return $this->editAdm($_SESSION['idpeg']);
            
        }else{
            if($this->input->post('jeniskel')=="Laki-laki") {
                $jenis = 'L';
            }else{
                $jenis =  'P';
            }
            $data = array(
            'idpeg'      => $_SESSION['idpeg'],
            'namapeg'    => $this->input->post('namapeg'),
            'jeniskel'   => $jenis,
            'jabatan'    => $this->input->post('jabatan'),
            'pangkat'    => $this->input->post('pangkat'),
            'golongan'   => $this->input->post('golongan'),
            'telepon'    => $this->input->post('telepon'),
        );
            $data2 = array(
                'iduser' => $_SESSION['iduser'],
                'email'  => $this->input->post('email'));
        // masuk model
            $this->madmprofil->update($data);
            $this->madmprofil->updateuser($data2);
            if ($this->madmprofil->update($data)==true && $this->madmprofil->updateuser($data2)==true) {
                $this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data anda sudah diperbarui.</div>');
                redirect('adm-profil');
            }
        }

    }

}