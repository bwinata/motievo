<?php

class Conversations extends CI_Model
{
	public function fetch_content ($details)
	{
		$available = $this->db->query("SELECT id, user_id, friend_id FROM 
									   conversation_identifiers WHERE 
									   (user_id = '$details[uid]' OR friend_id = '$details[uid]')");
		if ($available->num_rows() > 0)
		{
			for ($i = 0; $i < $available->num_rows(); $i++)
			{
				if ($available->row($i)->user_id == $details['uid'])
				{
					/* Retrieve friend from friend_id */
					$friend_id = $available->row($i)->friend_id;
				}
				else 
				{
					/* Retrieve friend from user_id */
					$friend_id = $available->row($i)->user_id;					
				}
				$friend_details = $this->db->query("SELECT full_name, username FROM registration
								  WHERE user_identifier = '$friend_id'");		
								  		
				/* Place friend details into html and store into array */
			}
		}
		else 
		{
			return array('response' => 'no_convos', 'result' => 'No Conversations available');
		}
	}
	
	public function post_content ($details)
	{
		$friend = $this->db->query("SELECT user_identifier FROM registration WHERE full_name = '$details[message_friend_field_name]'");
		if ($friend->num_rows() == 1)
		{
			$f_uid = $friend->row()->user_identifier;
			$convo_available = $this->db->query("SELECT user_id, friend_id FROM conversations 
						 WHERE (('$details[uid]' = user_id AND '$f_uid' = friend_id)
						 OR ('$details[uid]' = friend_id AND '$f_uid' = user_id))");
						 
			if($convo_available->num_rows() < 1)
			{
				$id = sha1(uniqid(rand(), true));
	
				$this->db->query("INSERT INTO conversations (convo_id, user_id, friend_id, message, date_time)
								  VALUES ('$id', '$details[uid]', '$f_uid', '$details[new_convo_textarea_name]', NOW())");
				if ($this->db->affected_rows() == 1)
				{
					$this->db->query("INSERT INTO conversation_identifiers (id, user_id, friend_id)
									  VALUES ('$id', '$details[uid]', '$f_uid')");
				}
				else 
				{
					return array('response' => 'db_error', 'result' => 'Database error. Please try again later');
				}
				return array('response' => 'slot_opened', 'result' => 'New conversation has been added');
			}
			else
			{
				return array('response' => 'slot_taken', 'result' => 'Conversation does exist');
			}						 
		}
		else 
		{
			return array('response' => 'friend_error', 'result' => 'Friend does not exist');
		}
	}
	
}


?>