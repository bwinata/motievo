<?php

class Validation extends CI_Model
{	
	public function check_login ()
	{
		$uid = $this->input->cookie('_u_');
		$sessid = $this->input->cookie('_sess_');
		
		$output = $this->db->query("SELECT session FROM registration WHERE (user_identifier = '$uid' AND session = '$sessid')");
		
		if ($output->num_rows() == 1)
		{
			return TRUE;
		}
		else 
		{
			return FALSE;	
		}
	}
}

?>