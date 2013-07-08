<?php

define('MAX_TRUNCATE_STR_LENGTH', 14);

class Conversations extends CI_Model
{
	public function fetch_content ($details)
	{
		$loader_link = base_url() . 'images/animators/loader-white.gif';
									   
		$available = $this->db->query("SELECT conversation_identifiers.id, 
											   conversation_identifiers.user_id, 
											   conversation_identifiers.friend_id,
											   conversations.date_time,
											   conversations.message FROM 
											   conversation_identifiers INNER JOIN conversations ON id = convo_id WHERE 
											   (conversations.date_time = (SELECT MAX(date_time) FROM conversations) OR
											   (conversation_identifiers.user_id = '$details[uid]' OR conversation_identifiers.friend_id = '$details[uid]'))");									   
									   
		if ($available->num_rows() > 0)
		{
			for ($i = 0; $i < $available->num_rows(); $i++)
			{
				if ($available->row($i)->user_id == $details['uid'])
					/* Retrieve friend from friend_id */
					$friend_id = $available->row($i)->friend_id;
				else 
					/* Retrieve friend from user_id */
					$friend_id = $available->row($i)->user_id;					
				
				$friend_details = $this->db->query("SELECT full_name, username FROM registration
								  WHERE user_identifier = '$friend_id'");
								  
				if ($friend_details->num_rows() == 1)
				{
					$name = $friend_details->row()->full_name;
					$username = $friend_details->row()->username;
					$date_time = $available->row($i)->date_time;
					$message = $this->truncate_string($available->row($i)->message);
					$id = $available->row($i)->id;
					$loader_id = 'loader_'.$id;
					$message_container_id = 'message_container_'.$id;
					$friend_array[$i] = "<div id=$id class='container large-12 columns' style='margin-bottom: 15px;'>
											<div class='large-12 columns' style='margin-left: -15px;'>
												<span style='margin-top: -10px; font-size: 16px;'><a href='#'><b>$name</b></a></span><br />
												<span style='margin-top: -10px; font-size: 13px;'><b>$username</b></span><br />
												<span class='subheader' style='font-size: 12px;'>Last message received on $date_time</span><br />
												<span style='font-size: 13px;'>$message</span>		
											</div>				
											<hr style='margin-bottom: 0px;'></hr>
											<img id=$loader_id style='display:none; margin-left: 47%;' src=$loader_link>				
											<div id=$message_container_id style='margin-top: 10px; display: none;'></div>																	
											<span class='messages_expand_btn' style='font-size: 11px; margin-left: 42%;'>Messages</span>					
										</div>";
				}
									
								  		
				/* Place friend details into html and store into array */
			}
			return array('response' => 'retrieved', 'result' => $friend_array);			
		}
		else 
		{
			$result = "<div class='container large-12 columns' style='margin-bottom: 15px;'>
					   		<div class='large-12 columns' style='margin-left: -15px;'>
							<p>No Conversations available</p>
							</div>								
					   </div>";
			return array('response' => 'no_convos', 'result' => $result);
		}
	}
	
	public function fetch_messages ($details)
	{
		$message = $this->db->query("SELECT message, date_time, full_name, username 
									 FROM conversations INNER JOIN registration ON sender = user_identifier
									 WHERE convo_id = '$details[c_id]'");
		if ($message->num_rows() > 0)
		{
			for ($i = 0; $i < $message->num_rows(); $i++)
			{
				$name = $message->row($i)->full_name;
				$username = $message->row($i)->username;
				$msg = $message->row($i)->message;
				$date_time = $message->row($i)->date_time;
				
				$message_box = '';
				
				if ($i == $message->num_rows() - 1)
				{
					$send_msg_id = 'send_msg_id_' . $details['c_id'];
					$message_box = "<input type='text' id=$send_msg_id class='comment_input_field' name='comment_input_field_name' placeholder='Type a quick message'>
								   <input type='submit' style='float: right;' class='send_msg_btn tiny default button' value='Send'>";
				}
				$messages_array[$i] = "<div class='message' style='margin-left: -15px;'>
									  	<div class='large-1 columns'><div class='comment_profile_pic' style='width: 40px; height: 40px; background: black;'></div></div>
									  	<div class='large-11 columns'><p class='message_text' style='font-size: 12px; margin-bottom: -0px;'><b>$name</b></p></div>
									  	<div class='large-11 columns'><p class='message_text' style='font-size: 13px;'>$msg</div>
									  	<br />
									  </div>" . $message_box;
			}	
		}
		else 
		{
			return array('response' => 'fail', 'result' => 'Messages could not be retrieved right now.');
		}
		return array('response' => 'success', 'result' => $messages_array);
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
	
				$this->db->query("INSERT INTO conversations (convo_id, user_id, friend_id, message, date_time, sender)
								  VALUES ('$id', '$details[uid]', '$f_uid', '$details[new_convo_textarea_name]', NOW(), '$details[uid]')");
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
				return array('response' => 'slot_taken', 'result' => 'This conversation already exists.');
			}						 
		}
		else 
		{
			return array('response' => 'friend_error', 'result' => 'Friend does not exist');
		}
	}

	private function truncate_string ($string)
	{
		$new_string = '';
		$string_array = explode(" ", $string);
		if (count($string_array) > MAX_TRUNCATE_STR_LENGTH)
		{
			for ($i = 0; $i < MAX_TRUNCATE_STR_LENGTH; $i++)
			{
				$new_string .= $string_array[$i] . ' '; 
			}
			$new_string .= '...';
			return $new_string;
		}
		return $string;
	}
	
}


?>