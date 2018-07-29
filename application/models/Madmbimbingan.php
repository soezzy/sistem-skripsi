<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmbimbingan extends CI_Model {

  public function info($id) {
    $query1 = $this->db->get_where('dt_skripsi', array('stat >=' => 4, 'iddospem'=> $id));
    $query2 = $this->db->get_where('dt_skripsi', array('stat >=' => 4, 'idpenguji1'=> $id));
    $query3 = $this->db->get_where('dt_skripsi', array('stat >=' => 4, 'idpenguji2'=> $id));
    
    $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        'query3' => $query3->result(),
    ];
    return $data;
    }

    public function detail($id,$idpeg) {

        $query1 = $this->db
            ->select('*')
            ->where('iddospem', $idpeg)
            ->where('idskripsi', $id)
            ->where('stat >=', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

        $query2 = $this->db->query('

            SELECT idbimbingan
            , a.idskripsi
            , namamhs
            , statbimbingan
            , a.idpeg
            , a.catatan
            , a.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.dospem
              WHERE TRUE AND a.idpeg = '.$idpeg.' AND a.idskripsi = '.$id.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function detailuji1($id,$idpeg) {
        $query1 = $this->db
            ->select('*')
            ->where('idpenguji1', $idpeg)
            ->where('idskripsi', $id)
            ->where('stat >=', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

        $query2 = $this->db->query('

            SELECT idbimbingan
            , a.idskripsi
            , namamhs
            , statbimbingan
            , a.idpeg
            , a.catatan
            , a.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.penguji1
              WHERE TRUE AND a.idpeg = '.$idpeg.' AND a.idskripsi = '.$id.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function detailuji2($id,$idpeg) {
        $query1 = $this->db
            ->select('*')
            ->where('idpenguji2', $idpeg)
            ->where('idskripsi', $id)
            ->where('stat >=', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

        $query2 = $this->db->query('

            SELECT idbimbingan
            , a.idskripsi
            , namamhs
            , statbimbingan
            , a.idpeg
            , a.catatan
            , a.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.penguji2
              WHERE TRUE AND a.idpeg = '.$idpeg.' AND a.idskripsi = '.$id.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function detailpenguji1($id,$idpeg) {
        $query1 = $this->db
            ->select('*')
            ->where('idpenguji1', $idpeg)
            ->where('idskripsi', $id)
            ->where('stat >=', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

        $query2 = $this->db->query('

            SELECT idbimbingan
            , a.idskripsi
            , namamhs
            , statbimbingan
            , a.idpeg
            , a.catatan
            , a.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.penguji1
              WHERE TRUE AND a.idpeg = '.$idpeg.' AND a.idskripsi = '.$id.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function detailpenguji2($id,$idpeg) {
        $query1 = $this->db
            ->select('*')
            ->where('idpenguji2', $idpeg)
            ->where('idskripsi', $id)
            ->where('stat >=', 4)
            ->limit(1)
            ->order_by('idskripsi','DESC')
            ->get('dt_skripsi');

        $query2 = $this->db->query('

            SELECT idbimbingan
            , a.idskripsi
            , namamhs
            , statbimbingan
            , a.idpeg
            , a.catatan
            , a.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.penguji2
              WHERE TRUE AND a.idpeg = '.$idpeg.' AND a.idskripsi = '.$id.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function revisi($isi)
    {
      return $this->db->insert('bimbingan', $isi);
    }

    public function terima($id,$data,$data2) {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 4 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->insert('bimbingan', $data2);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function tolak($id,$data) {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 3 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ujiprop($id,$data)
    {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 5 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ujiskrip($id,$data)
    {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 7 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
        return $this->db->query('UPDATE skripsi SET statskripsi = 7 WHERE idskripsi ='.$id);
    }

    
}