<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmprofil extends CI_Model {

	public function info() {
        $nip = $this->session->userdata['iduser'];
        $query = $this->db->get_where('dt_pegawai', array('nip' => $nip));
        return $query->result();
    }

    public function edit($id) {
        $query = $this->db->get_where('dt_pegawai', array('idpeg' => $id));
        return $query->result();
    }

    public function update($data)
    {
    	$this->db->where('idpeg',$data['idpeg']);
    	return $this->db->update('pegawai', $data);
    }

     public function updateuser($iduser)
    {
    	$this->db->where('iduser',$iduser);
    	return $this->db->update('users', array('status' => 'nonaktif'));
    }


}