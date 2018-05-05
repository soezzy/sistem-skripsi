<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmpengajuan extends CI_Model {

	public function info($id) {
		$query = $this->db->get_where('dt_skripsi', array('stat' => 1, 'iddospem'=> $id));
        return $query->result();
    }

    public function detail($id) {
        $query = $this->db->get_where('dt_skripsi', array('idskripsi' => $id, 'stat' => 1));
        return $query->result();
    }

    public function terima($id,$data) {
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 2 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
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

    // public function updatepeg($id,$data)
    // {
    //     $this->db->where('idpeg', $id);
    //     return $this->db->update('pegawai', $data);
    // }
}