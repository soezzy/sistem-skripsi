<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmpesan extends CI_Model {

	public function info($id) {
		$query = $this->db->query('
            SELECT idpesan, 
            a.idpeg, 
            namapeg, 
            a.idmhs, 
            namamhs, 
            subject, 
            konten, 
            a.statpesan, 
            created_at
            FROM pesan a
            LEFT JOIN pegawai b ON a.idpeg=b.idpeg 
            LEFT JOIN mahasiswa c ON a.idmhs=c.idmhs
            WHERE a.idpeg='.$id.' AND a.pengirim != '.$id.'
            ORDER BY statpesan asc
            ');

        $data = [
            'query1' => $query->result(),
        ];

        return $data;
    }

    public function infopesan($id) {
      $query = $this->db->query('
            SELECT idpesan, 
            a.idpeg, 
            namapeg, 
            a.idmhs, 
            namamhs, 
            subject, 
            konten, 
            a.statpesan, 
            created_at
            FROM pesan a
            LEFT JOIN pegawai b ON a.idpeg=b.idpeg 
            LEFT JOIN mahasiswa c ON a.idmhs=c.idmhs
            WHERE a.idpesan='.$id.'
            ');
      return $query->result();
    }

    public function read($id) {
      return $this->db->query('UPDATE pesan SET statpesan = 1 WHERE idpesan ='.$id);
    }

    public function balas($data) {
      return $this->db->insert('pesan', $data);
    }

    // public function updatepeg($id,$data)
    // {
    //     $this->db->where('idpeg', $id);
    //     return $this->db->update('pegawai', $data);
    // }
}