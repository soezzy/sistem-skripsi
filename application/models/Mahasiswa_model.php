<?php 
	/**
	* 
	*/
	class Mahasiswa_model extends CI_Model
	{
		
		function register($data)
		{
			return $this->db->insert('users', $data);
		}

		function kirimEmail($email)
		{
			$from = "abuhakim45@gmail.com";    //senders email address
        	$subject = 'Verifikasi alamat email';  //email subject
        
        	//sending confirmEmail($email) function calling link to the user, inside message body
        	$message = 'Bagi pengguna,<br><br> Silahkan klik alamat link dibawah ini untuk mengaktifkan akun anda<br><br>
        	<a href=\'http://localhost/skripsi/signupcontroller/confirmemail/'.md5($email).'\'>http://localhost/skripsi/signupcontroller/confirmemail/'. md5($email) .'</a><br><br>Terimakasih.';
        
        	$config['protocol'] 	= 'smtp';
        	$config['smtp_host'] 	= 'smtp.mailtrap.io';
        	$config['smtp_port'] 	= 2525;
        	$config['smtp_user'] 	= '55ecb8e0a2c776';
        	$config['smtp_pass'] 	= 'df39b3f1aa4a2e';  //sender's password
        	$config['mailtype'] 	= 'html';
        	$config['charset'] 		= 'iso-8859-1';
        	$config['wordwrap'] 	= 'TRUE';
        	$config['newline'] 		= "\r\n"; 

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
	// aktivasi user
	function verifyEmail($key) {
		$data = array('status' => 'aktif'); //ubah data menjadi aktif ketika user klik verifikasi
		$this->db->where('md5(email)',$key);
        return $this->db->update('users', $data);
	}

	public function loginUser($login_nim, $login_password)
	{
        date_default_timezone_set('Asia/Jakarta');      

		$query = $this->db->get_where('dt_mahasiswa', 
				 array('nim'		=> $login_nim, 
				  	   'password' 	=> $login_password,
				  	   'level'		=> 1,
				  	   'status'	  	=> 'aktif'
                    )); 
        $datauser = $query->result_array();

        if($query->num_rows() == 1){

            $lastvisit = array('lastvisit_at' => strftime('%Y-%m-%d %H:%M:%S'));

            $this->db->where('iduser',$datauser[0]['nim']);
            $this->db->update('users', $lastvisit);

            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->idmhs;
                $userArr[1] = $row->nim;
                $userArr[10] = $row->level;
                $userArr[11] = $row->status;
                
            }
            $userData = array(
                'idmhs'     => $userArr[0],
                'iduser' 	=> $userArr[1],
                'level'		=> $userArr[10],
                'status'    => $userArr[11],
                'logged_in'	=> TRUE
            );
            $this->session->set_userdata($userData);
            
            return $query->result();
        }else{
            return false;
        }
	}

    public function loginAdmin($email_admin, $pass_admin)
    {
        date_default_timezone_set('Asia/Jakarta');      

        $query = $this->db->get_where('dt_pegawai', 
                 array('nip'    => $email_admin, 
                       'password' => $pass_admin,
                       'status'   => 'aktif'
                    )); 

        $datauser = $query->result_array();

        if($query->num_rows() == 1){
        
            $lastvisit = array('lastvisit_at' => strftime('%Y-%m-%d %H:%M:%S'));

            $this->db->where('iduser',$datauser[0]['nip']);
            $this->db->update('users', $lastvisit);

            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0]  = $row->idpeg;
                $userArr[1]  = $row->nip;
                $userArr[12] = $row->level;
                $userArr[13] = $row->status;
                
            }
            $userData = array(
                'idpeg'     => $userArr[0],
                'iduser'    => $userArr[1],
                'level'     => $userArr[12],
                'status'    => $userArr[13],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userData);
            
            return $query->result();
        }else{
            return false;
        }
    }
}
		
 ?>