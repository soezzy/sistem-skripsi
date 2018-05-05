<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmvalidasi extends CI_Model {

  public function info() {
    $query = $this->db->get_where('dt_skripsi', array('stat' => 2));
        return $query->result();
    }

    public function detail($id) {
         $query = $this->db->query('
            SELECT b.idskripsi
            , b.idmhs
            , b.judul
            , b.abstrak
            , b.dospem
            , b.statskripsi
            , b.created_at
            , b.fileupload
            , a.catatan
            , c.namapeg as validator
            , a.created_at as tglterima
            FROM detskripsi a
            LEFT JOIN dt_skripsi b ON a.idskripsi = b.idskripsi
            LEFT JOIN pegawai c ON a.validator = c.idpeg
            WHERE TRUE AND a.statskripsi = 2 AND a.idskripsi = '.$id.'
        ');
        return $query->result();
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
}