<?php

class Dashboard_Content extends CI_Model
{
	public function fetch_content($user_details)
	{
		$user_available = $this->db->query("SELECT full_name, username FROM registration WHERE user_identifier = '$user_details[uid]'");
		if ($user_available->num_rows() == 1)
		{
			$user_content['full_name'] = $user_available->row()->full_name;
			$user_content['username'] = $user_available->row()->username;
			$user_content['my_happenings'] = $this->fetch_past_happenings($user_details);

			return array('response' => 'data_retrieved', 'result' => $user_content);
		}
	}
	
	private function fetch_past_happenings ($user_details)
	{
		$posts_available = $this->db->query("SELECT * FROM user_posts WHERE user_identifier = '$user_details[uid]'");
		if ($posts_available->num_rows() > 0)
		{
			return 'Data available';
		}
		else
		{
			$none = "<div class='container' style='text-align: center;'>
						<p>No happenings right now.</p>
					</div>";
			return $none;
		}
	}
}
?>