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
				return array('response' => 'registered');
			}			
		}
	}	   
}



?>