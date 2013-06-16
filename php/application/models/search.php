<?php

class Search extends CI_Model
{
	private $not_found = 
			"<div class='container'>
				<h5>Sorry. Nothing to be displayed.</h5><br />
				<span style='font-size: 12px;'></span>
				<br /><br />	
			</div>";
	
	
	public function find_friend ($friendship) 
	{							 
		$user = $this->db->query("SELECT * FROM registration 
								 WHERE (email = '$friendship[friend]' 
								 OR username = '$friendship[friend]')");
										 		
		if ($user->num_rows() == 1)
		{
			$user_data['friend_identifier'] = $user->row()->user_identifier;
			$user_settings = $this->db->query("SELECT * FROM user_settings WHERE user_identifier = '$user_data[friend_identifier]'");
			
			if ($user_settings->num_rows() == 1)
			{
				$user_data['full_name'] = $user->row()->full_name;
				$user_data['about_me'] = $user_settings->row()->about_me;
				$user_data['username'] = $user->row()->username;
				$user_data['profile_img'] = $user_settings->row()->profile_image;
								
				$friendship_status = $this->check_friendship($friendship['my_uid'], $user_data['friend_identifier']);
				
				$user_data['status'] = $friendship_status['status'];
				$user_data['type'] = $friendship_status['type'];
				$user_data['colour'] = $friendship_status['colour'];

				$found = $this->generate_friend_container($user_data);
				
				return array('response' => 'friend_found', 'result' => $found);
			}
			else
			{				
				return array('response' => 'friend_not_found', 'result' => $this->not_found);
			}
		}
		else 
		{
			return array('response' => 'friend_not_found', 'result' => $this->not_found);
		}
	}
	
	public function send_friend_request ($details)
	{
		$this->db->query("INSERT INTO contacts (friend_1, friend_2, status) VALUES ('$details[my_uid]', '$details[friend_uid]', 'Request Sent')");
		
		if ($this->db->affected_rows() == 1)
		{
			return array('response' => 'request_sent');
		}
		else 
		{
			return array('response' => 'request_error');
		}
	}

	public function fetch_requests ($id)
	{
		$request_type = array('sent_requests', 'received_requests');
		
		foreach($request_type as $type)
		{
			if ($type == 'sent_requests')
			{
				$you = 'contacts.friend_1'; 
				$mate = 'contacts.friend_2';
				$requestee = 'friend_2';
			}
			else if ($type == 'received_requests')
			{
				$you = 'contacts.friend_2'; 
				$mate = 'contacts.friend_1';
				$requestee = 'friend_1';				
			} 
			
			$requests = $this->db->query("SELECT $mate, registration.full_name, registration.username,
											  registration.email, user_settings.about_me, user_settings.profile_image
											  FROM contacts INNER JOIN registration 
											  ON $mate = registration.user_identifier
											  INNER JOIN user_settings ON $mate = user_settings.user_identifier
											  WHERE ($you = '$id[my_uid]' AND contacts.status != 'Connected')");
											  
			if ($requests->num_rows() > 0)
			{
				for ($j = 0; $j < $requests->num_rows(); $j++)
				{
					$requests_array['friend_identifier'] = $requests->row($j)->$requestee;
					$requests_array['full_name'] = $requests->row($j)->full_name; 
					$requests_array['username'] = $requests->row($j)->username;
					$requests_array['profile_img'] = $requests->row($j)->profile_image;
					$requests_array['about_me'] = $requests->row($j)->about_me;
					
					$friendship_status = $this->check_friendship($id['my_uid'], $requests_array['friend_identifier']);
					
					if ($type == 'received_requests')
					{
						$requests_array['status'] = "Lets connect";
						$requests_array['type'] = 'enabled';
						$requests_array['colour'] = '';						
					}
					else
					{
						$requests_array['status'] = $friendship_status['status'];
						$requests_array['type'] = $friendship_status['type'];
						$requests_array['colour'] = $friendship_status['colour'];
					}
					$all_requests[$j] = $this->generate_friend_container($requests_array);
				}
			}
			else 
			{
				$all_requests = $this->not_found;
			}
			$total_requests[$type] = $all_requests;
			unset($all_requests);
		}
		return array('response' => 'requests_available', 'result' => $total_requests);
	}

	public function connect_to_friend ($details)
	{
		$this->db->query("UPDATE contacts SET status = 'Connected' WHERE (friend_1 = '$details[friend_uid]' AND friend_2 = '$details[my_uid]')");
		
		if ($this->db->affected_rows() == 1)
		{
			return array('response' => 'connected');
		}
		else
		{
			return array('response' => 'connected_error');	
		} 
	}
	
	private function check_friendship ($my_identifier, $friend_identifier)
	{
		$friendship_available = $this->db->query("SELECT status FROM contacts WHERE ((friend_1 = '$my_identifier' 
						 						AND friend_2 = '$friend_identifier') OR (friend_1 = '$friend_identifier' AND friend_2 = '$my_identifier'))");
		
		if ($friendship_available->num_rows() == 1)
		{
			switch ($friendship_available->row()->status)
			{
				case 'Request Sent':
					$state['status'] = 'Request Sent';
					$state['type'] = 'disabled';
					$state['colour'] = '00F';
					break;
				case 'Connected':
					$state['status'] = 'Already Friends';
					$state['type'] = 'disabled';
					$state['colour'] = '';
					break;
				default:
					break;
			}
		}
		else
		{
			$state['status'] = 'Connect';
			$state['type'] = 'enabled';
			$state['colour'] = '';
		}
		return $state;
	}
	
	private function generate_friend_container ($data)
	{
		return	"<div class='container'>
					<div style='float: left; margin-right: 10px;' class='friend_profile_pic'><img src=$data[profile_img] /></div>
					<h5>$data[full_name]</h><br />
					<span style='font-size: 12px;'>$data[about_me]</span>
					<input style='float: right; background-color: #$data[colour];' id=$data[friend_identifier] type='submit' class='small success button connect' value='$data[status]' $data[type]>
					<br /><br />	
				</div>";
	}

}
?>