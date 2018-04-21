<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mmhspengajuan extends CI_Model {

	public function info($id) {
    $query = $this->db
    ->select('*')
    ->where('idmhs', $id)
    ->limit(1)
    ->order_by('idskripsi','DESC')
    ->get('dt_skripsi');
    return $query->result();   
    }

    public function DataDosen()
    {
    	$this->db->select('idpeg, namapeg');
		  $this->db->from('pegawai');
      $this->db->where('kelompok','dosen');
      $this->db->where('kuota !=',0);
      $query = $this->db->get();

      return $query->result();
    }

    public function insert($data)
    {
      $this->db->set('kuota', 'kuota-1', FALSE);
      $this->db->where('idpeg',$data['dospem']);
      $this->db->update('pegawai'); 

      return $this->db->insert('skripsi', $data);
    }


}