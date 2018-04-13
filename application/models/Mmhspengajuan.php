<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mmhspengajuan extends CI_Model {

	public function info($id) {
    $query = $this->db->select('*')
                ->where('idmhs', $id)
                ->limit(1)
                ->order_by('idskripsi','DESC')
                ->get('dt_skripsi');
		// $this->db->select('*');
		// $this->db->from('dt_skripsi');
  //   $this->db->where('idmhs', $id);
		// $query = $this->db->get();

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
    public function insert($postpdf)
    {
      date_default_timezone_set('Asia/Jakarta');

      $this->db->set('kuota', 'kuota-1', FALSE);
      $this->db->where('idpeg',$this->input->post('dospem'));
      $this->db->update('pegawai'); 

      $data = array('judul'       => strtoupper($this->input->post('judul')),
                    'abstrak'     => $this->input->post('abstrak'),
                    'idmhs'       => $_SESSION['idmhs'],
                    'dospem'      => $this->input->post('dospem'),
                    'statskripsi' => 1,
                    'fileupload'  => $postpdf,
                    'created_at'  => strftime('%Y-%m-%d %H:%M:%S'));
      return $this->db->insert('skripsi', $data);
    }


}