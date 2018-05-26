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
    	$query = $this->db
               ->select('idpeg, namapeg, kuota')
               ->where('kelompok','dosen')
               ->where('kuota !=',0)
               ->order_by('namapeg','ASC')
               ->get('pegawai');
               

      return $query->result();
    }

    public function insert($data)
    {
      return $this->db->insert('skripsi', $data);
    }


}