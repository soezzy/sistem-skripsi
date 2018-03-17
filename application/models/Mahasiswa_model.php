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
        	$subject = 'Verify email address';  //email subject
        
        	//sending confirmEmail($email) function calling link to the user, inside message body
        	$message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        	<a href=\'http://localhost/skripsi/signupcontroller/confirmemail/'.md5($email).'\'>http://localhost/skripsi/signupcontroller/confirmemail/'. md5($email) .'</a><br><br>Thanks';
        
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
		$query = $this->db->get_where('dt_mahasiswa', 
				 array('nim'		=> $login_nim, 
				  	   'password' 	=> $login_password,
				  	   'level'		=> 1,
				  	   'status'	  	=> 'aktif'
                    )); 
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[1] = $row->nim;
                $userArr[9] = $row->password;
                $userArr[10] = $row->level;
                
            }
            $userData = array(
                'iduser' 	=> $userArr[1],
                'password' 	=> $userArr[9],
                'level'		=> $userArr[10],
                'logged_in'	=> TRUE
            );
            $this->session->set_userdata($userData);
            
            return $query->result();
        }else{
            return false;
        }
	}
}
		
 ?>