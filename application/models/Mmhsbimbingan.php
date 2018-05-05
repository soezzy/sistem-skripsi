<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mmhsbimbingan extends CI_Model {

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
    	$query = $this->db
               ->select('idpeg, namapeg, kuota')
               ->where('kelompok','dosen')
               ->where('kuota !=',0)
               ->order_by('namapeg','ASC')
               ->get('pegawai');
               
		  // $this->db->from('pegawai');
    //   $this->db->where('kelompok','dosen');
    //   $this->db->where('kuota !=',0);
    //   $query = $this->db->get();

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