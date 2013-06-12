<?php

class Register extends CI_Model
{
	public function create_user_account ($user_details)
	{
		$user_taken = $this->db->query("SELECT email FROM registration WHERE (email = '$user_details[user_email]' OR username = '$user_details[username]')");
		if ($user_taken->num_rows() > 0)
		{
			return array('response' => 'user_taken');
		}
		else
		{
			$encrypted_pword = sha1($user_details['password']);
			$identifier = $this->generate_identifier();
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
                $this->initialise_user_portfolio($identifier);
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
	
	private function initialise_user_portfolio ($identifier)
	{
		
		$this->db->query("INSERT INTO user_settings (user_identifier,
													 bg_image,
													 profile_image,
													 about_me) VALUES ('$identifier', '' , '', 'Hi there, Im using this app!')");
													 
		$this->create_dir($identifier);
	}
	
	private function create_dir ($identifier)
	{
		$dir_path = 'images/u/' . $identifier;
		mkdir($dir_path, 0644, TRUE);
	}	
	
	private function generate_identifier()
	{
		do
		{
			$identifier =  sha1(uniqid(rand(), true));
			$id_available = $this->db->query("SELECT user_identifier FROM registration WHERE user_identifier = '$identifier'");
		} while ($id_available->num_rows() == 1);
	
		return $identifier;
	}
}

?>