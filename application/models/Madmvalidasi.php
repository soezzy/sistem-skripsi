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
            , b.iddospem
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
        $ambilemail = $this->db->query('SELECT email from dt_mahasiswa WHERE idmhs = '.$data2['idmhs']);
        $email = $ambilemail->row_array();
        $this->db->trans_start();
        $this->db->query('UPDATE skripsi SET statskripsi = 4 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->insert('bimbingan', $data2);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            $this->EmailTerima($email['email']);
            return TRUE;
        }
    }

    public function tolak($id,$data,$idm) {
        $ambilemail = $this->db->query('SELECT email from dt_mahasiswa WHERE idmhs = '.$idm);
        $email = $ambilemail->row();
        // var_dump($idm);die();
        $this->db->trans_start();
        $this->db->query('UPDATE pegawai SET kuota = kuota+1 WHERE idpeg='.$_SESSION['idpeg']);
        $this->db->query('UPDATE skripsi SET statskripsi = 3 WHERE idskripsi ='.$id);
        $this->db->insert('detskripsi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            $this->EmailTolak($email->email);
            return TRUE;
        }
    }

    protected function EmailTerima($email)
    {
        $from = "abuhakim45@gmail.com";    //senders email address
        $subject = 'Pemberitahuan Pengajuan';  //email subject
    
        $message = 'Dear mahasiswa,<br><br>Pengajuan skripsi anda telah diterima oleh dosen pembimbing yang anda pilih<br><br>
        Segera untuk melakukan bimbingan<br><br>Terimakasih.';
    
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

    protected function EmailTolak($email)
    {
        $from = "abuhakim45@gmail.com";    //senders email address
        $subject = 'Pemberitahuan Pengajuan';  //email subject
    
        $message = 'Dear mahasiswa,<br><br>Pengajuan skripsi anda telah ditolak oleh kaprodi<br><br>
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