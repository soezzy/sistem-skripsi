<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mmhsprofil extends CI_Model {

	public function info() {
        $nim = $this->session->userdata['iduser'];
        $query = $this->db->get_where('dt_mahasiswa', array('nim' => $nim));
        return $query->result();
    }

    public function edit($id) {
        $query = $this->db->get_where('dt_mahasiswa', array('idmhs' => $id));
        return $query->result();
    }

    public function update($data)
    {
    	$this->db->where('idmhs',$data['idmhs']);
    	return $this->db->update('mahasiswa', $data);
    }

    public function updateuser($data2)
    {
        $this->db->where('iduser',$data2['iduser']);
        return $this->db->update('users', $data2);
    }

}