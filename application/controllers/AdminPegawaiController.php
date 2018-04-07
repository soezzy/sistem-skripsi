<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPegawaiController extends CI_Controller {

     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('madmpegawai');
    }

	public function index(){

        $title = array('title' => 'Data Pegawai');
        $data['data'] = $this->madmpegawai->info(); 
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
			$this->load->view('adm-pegawai/infoadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function tambahpeg(){
        $title = array('title' => 'Data Pegawai');
        if(isset($_SESSION['status'])=="aktif" && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pegawai/tambahadm');
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function tambah()
    {
        // validasi form
        $this->form_validation->set_rules('nip', 'nip', 'required|is_unique[users.iduser]',
            array('required'    => 'Nomor Induk Pegawai harus terisi.',
                  'is_unique'   => 'Nomor Induk Pegawai sudah digunakan.'));

        $this->form_validation->set_rules('namapeg', 'namapeg', 'required',
            array('required'    => 'nama harus terisi.'));

        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required'    => 'password harus terisi.'));

        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]',
            array('required'    => 'konfirmasi password harus terisi',
                  'matches'     => 'konfirmasi anda tidak cocok'));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]',
            array('required'    => 'email wajib di isi.',
                  'valid_email' => 'format email anda salah.',
                  'is_unique'   => 'email anda sudah digunakan.'));


        $this->form_validation->set_rules('telepon', 'telepon', 'required|min_length[10]|max_length[13]',
            array('required'    => 'nomor telepon harus terisi.',
                  'min_length'  => 'nomor telepon harus lebih dari 10.',
                  'max_length'  => 'nomor telepon harus kurang dari 13.'));

        if($this->form_validation->run()==false) {
        // jika salah
        $title = array('title' => 'Data Pegawai');
        $this->load->view('admin/header', $title);
        $this->load->view('adm-pegawai/tambahadm');
        $this->load->view('admin/footer');
            
        }else{
            if($this->input->post('jeniskel')=="Laki-laki") {
                $jenis = 'L';
            }else{
                $jenis =  'P';
            }

            switch ($this->input->post('level')) {
                case 'Dosen':
                    $level = 2;
                    break;

                case 'Kaprodi':
                    $level = 3;
                    break;

                default:
                    $level = 4;
                    break;
            }
            $enc_password = md5($this->input->post('password'));
            $nip = $this->input->post('nip');
            $data = array(
                'namapeg'    => $this->input->post('namapeg'),
                'jeniskel'   => $jenis,
                'jabatan'    => $this->input->post('jabatan'),
                'pangkat'    => $this->input->post('pangkat'),
                'golongan'   => $this->input->post('golongan'),
                'telepon'    => $this->input->post('telepon'),
                'kelompok'   => $this->input->post('grup'),
                );
            $data2 = array(
                'iduser'       => $this->input->post('nip'),
                'email'        => $this->input->post('email'),
                'password'     => $enc_password,
                'level'        => $level,
                'status'       => "aktif",
                'created_at'   => date('Y-m-d'),
                'lastvisit_at' => date('Y-m-d H:i:s'),
                );
        // masuk model
            if ($this->madmpegawai->tambahuser($data2) && $this->madmpegawai->tambah($data,$nip)) {
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Data tersimpan.</div>');
                redirect('adm-pegawai');
            }
        }

    }

    public function detailpeg($id){

        $title = array('title' => 'Data Pegawai');
        $data['data'] = $this->madmpegawai->detail($id);
        if(isset($_SESSION['iduser']) && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pegawai/detailadm', $data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
        
    }

    public function banuser($id){
        if($this->madmpegawai->banuser($id)==true) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data anda sudah diperbarui.</div>');
            redirect('adm-pegawai');
        }
    }

     public function unbanuser($id){
        if($this->madmpegawai->unbanuser($id)==true) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data anda sudah diperbarui.</div>');
            redirect('adm-pegawai');
        }
    }

    public function editpeg($id){
        $title = array('title' => 'Data Pegawai');
        $data['data'] = $this->madmpegawai->edit($id);

        if(isset($_SESSION['status'])=="aktif" && ($_SESSION['level'])!=1){
            $this->load->view('admin/header', $title);
            $this->load->view('adm-pegawai/editadm',$data);
            $this->load->view('admin/footer');
        }else{
            redirect('/');
        }
    }

    public function edit($id){
         switch ($this->input->post('level')) {
                case 'Super Admin':
                    $level = 5;
                    break;

                case 'Staff Admin':
                    $level = 4;
                    break;

                case 'Kaprodi':
                    $level = 3;
                    break;

                default:
                    $level = 2;
                    break;
            }

        $data = array('kelompok' => $this->input->post('grup'));
        $data2 = array('level' => $level);
        ;
        if($this->madmpegawai->updateuser($data2,$id) && $this->madmpegawai->updatepeg($data,$id)) {
            $this->session->set_flashdata('sukses', '<div class="alert alert-success text-center">Data anda sudah diperbarui.</div>');
            redirect('adm-pegawai');
        }
    }

}