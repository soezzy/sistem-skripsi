<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmpendaftaran extends CI_Model {

  public function info() {
    $query1 = $this->db->query('
        SELECT a.*, b.statskripsi, b.idskripsi
            FROM dt_mahasiswa a
            INNER JOIN dt_skripsi b ON b.idmhs=a.idmhs
            WHERE stat>=5');

    $query2 = $this->db->query('
        SELECT a.*, b.statskripsi, b.idskripsi
            FROM dt_mahasiswa a
            INNER JOIN dt_skripsi b ON b.idmhs=a.idmhs
            WHERE stat=7');

    $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
    ];

    return $data;
    }

    public function detail($id) {
        $query1 = $this->db->query('SELECT a.*, b.dospem, b.penguji1, b.penguji2, b.stat, b.idskripsi
                        FROM dt_mahasiswa a
                        LEFT JOIN dt_skripsi b on a.idmhs=b.idmhs
                        WHERE a.idmhs = '.$id);

        $query2 = $this->db->query("SELECT idpeg, namapeg
                        FROM dt_pegawai
                        WHERE kelompok = 'dosen'");

        $data = ['datamhs'=> $query1->result(), 
                 'datapenguji'=> $query2->result()
                ];
        return $data;
    }

    public function uppenguji1($isi,$ids)
    {
        return $this->db->query('UPDATE skripsi SET penguji1 = '.$isi.' WHERE idskripsi ='.$ids);
    }

    public function uppenguji2($isi2,$ids)
    {
        return $this->db->query('UPDATE skripsi SET penguji2 = '.$isi2.' WHERE idskripsi ='.$ids);
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
            , c.idmhs

              FROM bimbingan a
              LEFT JOIN mahasiswa b ON a.idmhs = b.idmhs
              INNER JOIN skripsi c ON a.idpeg = c.penguji1
              WHERE TRUE AND a.idpeg = '.$idpeg.'
              ORDER BY idbimbingan DESC
              LIMIT 1');

        $data = [
        'query1' => $query1->result(),
        'query2' => $query2->result(),
        ];

        return $data;
    }

    public function updateproposal($isi)
    {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 6 WHERE idskripsi ='.$isi['idskripsi']);
        $this->db->insert('detskripsi', $isi);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function updateskripsi($isi)
    {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 8 WHERE idskripsi ='.$isi['idskripsi']);
        $this->db->insert('detskripsi', $isi);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    
}