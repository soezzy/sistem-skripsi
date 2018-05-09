<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mmhsbimbingan extends CI_Model {

	public function info($id) {
    $query = $this->db
            ->select('*')
            ->where('idmhs', $id)
            ->where('stat', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

    $query2 = $this->db->query('
      SELECT idbimbingan
        , a.idskripsi
        , namapeg
        , statbimbingan
        , a.idpeg
        , a.catatan
        , a.idmhs

      FROM bimbingan a
      LEFT JOIN pegawai b ON a.idpeg = b.idpeg
      INNER JOIN skripsi c ON a.idpeg = c.dospem
      WHERE TRUE AND a.idmhs = '.$id.'
      ORDER BY idbimbingan DESC
      LIMIT 1');

    $query3 = $this->db->query('
      SELECT idbimbingan
        , a.idskripsi
        , namapeg
        , statbimbingan
        , a.idpeg
        , a.catatan

      FROM bimbingan a
      LEFT JOIN pegawai b ON a.idpeg = b.idpeg
      INNER JOIN skripsi c ON a.idpeg = c.penguji1
      WHERE TRUE AND a.idmhs = '.$id.'
      ORDER BY idbimbingan DESC
      LIMIT 1');

    $query4 = $this->db->query('
     SELECT idbimbingan
        , a.idskripsi
        , namapeg
        , statbimbingan
        , a.idpeg
        , a.catatan

      FROM bimbingan a
      LEFT JOIN pegawai b ON a.idpeg = b.idpeg
      INNER JOIN skripsi c ON a.idpeg = c.penguji2
      WHERE TRUE AND a.idmhs = '.$id.'
      ORDER BY idbimbingan DESC
      LIMIT 1');

    $data = [
      'query1' => $query->result(),
      'query2' => $query2->result(),
      'query3' => $query3->result(),
      'query4' => $query4->result(),

    ];

    return $data;   
    }

    public function revisi($data)
    {
      return $this->db->insert('bimbingan', $data);
    }

    public function insert($id,$filepdf)
    {
      $this->db->set('fileupload', $filepdf);
      $this->db->where('idmhs',$id);
      return $this->db->update('skripsi'); 
    }


}