<?php

class Login extends CI_Model
{
	public function login_user ($login_details)
	{
		$encrypted_pword = sha1($login_details['password']);		
		$user_available = $this->db->query("SELECT user_identifier FROM registration WHERE (email = '$login_details[user_email]' AND password = '$encrypted_pword')");
		if($user_available->num_rows() == 1)
		{
			/* Create session id */
			$session = $this->create_sessid($user_available->row()->user_identifier);
			/* Create temporary (only available while browser is active) session */
			$this->input->set_cookie('_u_', $user_available->row()->user_identifier, 0, '.localhost', '/', '');
			$this->input->set_cookie('_sess_', $session, 0, '.localhost', '/', '');
			
			/* User is available */
			return array('response' => 'logged_in', 'result' => site_url('dashboard/me'));		
		}
		else
		{
			/* User cannot be found or password is incorrect */
			return array('response' => 'login_error');
		}
	}
	
	private function create_sessid ($user_id)
	{
		do
		{
			$sessid = sha1(uniqid(rand(), true));
			$output = $this->db->query("SELECT session FROM registration WHERE session = '$sessid'");
			
		} while ($output->num_rows() == 1);
		
		$this->db->query("UPDATE registration SET session = '$sessid' WHERE (user_identifier = '$user_id')");
		return $sessid;
	}
	
}

?>