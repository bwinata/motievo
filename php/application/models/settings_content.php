<?php

class Settings_Content extends CI_Model
{
	public function fetch_personal ($details)
	{
		$user_available = $this->db->query("SELECT registration.full_name, 
											registration.username, 
											registration.email,
											user_settings.about_me FROM registration INNER JOIN user_settings ON 
											registration.user_identifier = user_settings.user_identifier
											WHERE registration.user_identifier = '$details[uid]'");
		if ($user_available->num_rows() == 1)
		{
			$user_data['full_name'] = $user_available->row()->full_name;
			$user_data['username'] = $user_available->row()->username;
			$user_data['email'] = $user_available->row()->email;
			$user_data['about_me'] = $user_available->row()->about_me;
			
			return array('response' => 'data_retrieved', 'result' => $user_data);
		}
		else
		{
			return array('response' => 'data_error');
		}
	}
	
	public function fetch_dashboard ($details)
	{
		
	}
	
	public function fetch_privacy ($details)
	{
		
	}
	
	public function update_personal ($details)
	{
		$user_available = $this->db->query("SELECT * FROM registration WHERE user_identifier = '$details[uid]'");
		if ($user_available->num_rows() == 1)
		{
			$pword = sha1($details['current_pw_settings_name']);
			$username_taken = $this->db->query("SELECT username FROM registration WHERE username = '$details[username_settings_name]'");
			if ($username_taken->num_rows() == 1)
			{
				$update_result['username_settings_name'] = 'username_settings'; 
				return array('response' => 'username_taken', 'result' => $update_result);
			}
			$email_taken = $this->db->query("SELECT email FROM registration WHERE email = '$details[email_settings_name]'");
			if ($email_taken->num_rows() == 1)
			{
				$update_result['email_settings_name'] = 'email_settings';
				return array('response' => 'email_taken', 'result' => $update_result);				
			}
			if ($pword != sha1($user_available->row()->password)) 
			{
				$update_result['current_pw_settings_name'] = 'current_pw_settings';
				return array('response' => 'incorrect_pw', 'result' => $update_result);				
			}
			if (sha1($details['new_pw_settings_name']) == $pword)
			{
				$update_result['new_pw_settings_name'] = 'new_pw_settings';
				return array('response' => 'identical_new_pw', 'result' => $update_result);				
			}
			if (sha1($details['new_pw_settings_name']) != sha1($details['re_pw_settings_name']))
			{
				$update_result['new_pw_settings_name'] = 'new_pw_settings';
				$update_result['re_pw_settings_name'] = 're_pw_settings';
				return array('response' => 'new_re_pw_not_match', 'result' => $update_result);				
			}
		}
		else
		{
			return array('response' => 'no_user_found');
		}
		
		/* Update full name */
		//$this->db->query("UPDATE registration SET full_name")
	}
	
	public function udpate_dashboard ($details)
	{
		
	}
	
	public function update_privacy ($details)
	{
		
	}
	
}


?>