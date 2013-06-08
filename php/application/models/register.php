<?php

class Register extends CI_Model
{
	public function create_user_account ($user_details)
	{
		$user_taken = $this->db->query("SELECT email FROM registration WHERE email = '$user_details[user_email]'");
		if ($user_taken->num_rows() > 0)
		{
			return array('response' => 'user_taken');
		}
		else
		{
			$encrypted_pword = sha1($user_details['password']);
			$identifier =  sha1(uniqid(rand(), true));
			$output = $this->db->query("INSERT INTO registration (full_name, username, email, password, user_identifier) VALUES
									('$user_details[full_name]',
									 '$user_details[username]',
									 '$user_details[user_email]',
									 '$encrypted_pword',
									 '$identifier')");
			
			if ($this->db->affected_rows() == 1)
			{
                /*$body = "Thanks so much for registering with PLACHOLDER. Click on the link below to activate your account:\n\n";
                $body .= base_url() . 'credentials/activate/' . urlencode($user_details['user_email']) . "/$act_code";
                mail($details['email'], 'Registration Confirmation', $body, 'From: registration@kreeos.com');*/				
				return array('response' => 'user_registered', 'result' => 'Some site');
			}
			else
			{
				return array('response' => 'critical_error', 'result' => 'Something went seriously wrong. Contact the web administrator');
			}
		}
	}

	public function activate_user ()
	{
		
	}
}

?>