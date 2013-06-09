<?php

class Login extends CI_Model
{
	public function login_user ($login_details)
	{
		$encrypted_pword = sha1($login_details['password']);		
		$user_available = $this->db->query("SELECT email, password, user_identifier FROM registration WHERE (email = '$login_details[user_email]' AND password = '$encrypted_pword')");
		if($user_available->num_rows() == 1)
		{
			/* Create temporary session */
			$this->input->set_cookie('_u_', $user_available->row()->user_identifier, 0, '.localhost', '/', '');			
			
			/* User is available */
			return array('response' => 'logged_in', 'result' => site_url('dashboard/me'));		
		}
		else
		{
			/* User cannot be found or password is incorrect */
			return array('response' => 'login_error');
		}
	}
}

?>