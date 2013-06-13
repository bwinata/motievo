<?php

class Search extends CI_Model
{
	public function find_friend ($friend_name) 
	{
		$user = $this->db->query("SELECT registration.full_name, registration.email, 
								 registration.username, user_settings.profile_image, 
								 user_setting.about_me FROM registration INNER JOIN user_settings ON
								 registration.user_identifier = user_settings.user_identifier
								 WHERE (registration.email = '$friend_name[friend]' OR registration.username = '$friend_name[friend]'");		
		if ($user->num_rows() == 1)
		{
			$friend_info['full_name'] = $user->row()->full_name;
			$friend_info['email'] = $user->row()->email;
		}
	}
}


?>