<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmpegawai extends CI_Model {

	public function info() {
		$this->db->select('idpeg, nip, namapeg, telepon, kelompok, level, status');
		$this->db->from('dt_pegawai');
		$query = $this->db->get();

        return $query->result();
    }

   public function detail($id) {
        $query = $this->db->get_where('dt_pegawai', array('nip' => $id));
        return $query->result();
    }

    public function banuser($id)
    {
        $data = array('status' => 'nonaktif');
        $this->db->where('iduser', $id);
        return $this->db->update('users', $data);
    }

    public function unbanuser($id)
    {
        $data = array('status' => 'aktif');
        $this->db->where('iduser', $id);
        return $this->db->update('users', $data);
    }

    public function tambah($data,$nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->update('pegawai', $data);
    }

    public function tambahuser($data2)
    {
        return $this->db->insert('users', $data2);
    }

    public function edit($id) {
        $query = $this->db->get_where('dt_pegawai', array('idpeg' => $id));
        return $query->result();
    }

    public function updatepeg($data,$id)
    {
        $this->db->where('nip', $id);
        return $this->db->update('pegawai', $data);
    }

    public function updateuser($data2,$id)
    {
        $this->db->where('iduser', $id);
        return $this->db->update('users', $data2);
    }
}