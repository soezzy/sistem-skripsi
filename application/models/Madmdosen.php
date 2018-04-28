<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmdosen extends CI_Model {

	public function info() {
		$query = $this->db->get_where('pegawai', array('kelompok' => 'dosen'));
        return $query->result();
    }

    public function detail($id) {
        $query = $this->db->get_where('dt_pegawai', array('idpeg' => $id));
        return $query->result();
    }

    public function edit($id) {
        $query = $this->db->get_where('dt_pegawai', array('idpeg' => $id));
        return $query->result();
    }

    public function updatepeg($id,$data)
    {
        $this->db->where('idpeg', $id);
        return $this->db->update('pegawai', $data);
    }
}