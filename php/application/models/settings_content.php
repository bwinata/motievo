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
		
	}
	
	public function udpate_dashboard ($details)
	{
		
	}
	
	public function update_privacy ($details)
	{
		
	}
	
}


?>