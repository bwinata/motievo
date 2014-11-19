<?php

class Launch_Interest extends CI_Model
{
	public function register_interest ($email)
	{
		$check_entry = $this->db->query("SELECT email FROM interest WHERE (email = '$email[user_email]')");
		if ($check_entry->num_rows() > 0)
		{
			return array('response' => 'email_taken');
		}
		else 
		{
			$this->db->query("INSERT INTO interest (email) VALUES ('$email[user_email]')");
			if ($this->db->affected_rows() == 1)
			{
				$body = "Thanks for registering at Kreeos. To begin creating, sharing and learning, activate your account and please click on the link below:\n\n";
                $body .= base_url() . 'credentials/activate/' . urlencode($details['email']) . "/$act_code";
                mail($email['user_email'], 'Registration Confirmation', $body, 'From: registration@motievo.com');				
				return array('response' => 'registered');
			}			
		}
	}	   
}



?>