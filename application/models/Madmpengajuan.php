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
        $kuota = $this->cekKuota($data['validator']);
        if ($kuota['kuota'] != 0) {
            $this->db->trans_start();
            $this->db->query('UPDATE pegawai SET kuota = kuota-1 WHERE idpeg='.$_SESSION['idpeg']);
            $this->db->query('UPDATE skripsi SET statskripsi = 2 WHERE idskripsi ='.$id);
            $this->db->insert('detskripsi', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
        
    }

    public function tolak($id,$data,$idm) {
        $ambilemail = $this->db->query('SELECT email from dt_mahasiswa WHERE idmhs = '.$idm);
        $email = $ambilemail->row_array();
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 3 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            $this->EmailTolak($email['email']);
            return TRUE;
        }
    }

    protected function cekKuota($id)
    {
        $query = $this->db->query('SELECT kuota FROM pegawai WHERE idpeg='.$id);
        return $query->row_array();
    }

    protected function EmailTolak($email)
    {
        $from = "abuhakim45@gmail.com";    //senders email address
        $subject = 'Pemberitahuan Pengajuan';  //email subject
    
        $message = 'Dear mahasiswa,<br><br>Pengajuan skripsi anda telah ditolak oleh dosen pembimbing yang anda pilih<br><br>
        Segera untuk melakukan pengajuan kembali<br><br>Terimakasih.';
    
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'smtp.mailtrap.io';
        $config['smtp_port']    = 2525;
        $config['smtp_user']    = '55ecb8e0a2c776';
        $config['smtp_pass']    = 'df39b3f1aa4a2e';  //sender's password
        $config['mailtype']     = 'html';
        $config['charset']      = 'iso-8859-1';
        $config['wordwrap']     = 'TRUE';
        $config['newline']      = "\r\n"; 

        $this->email->initialize($config);

        $this->email->from($from, 'Abu Rizal');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()){
            return true;
        }else{
            echo "email send failed";
            return false;
        }
    }
}