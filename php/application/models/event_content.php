<?php

class Event_Content extends CI_Model
{
	public function create ($event_details)
	{
		do
		{
			$event_identifier =  sha1(uniqid(rand(), true));
			$event_available = $this->db->query("SELECT event_identifier FROM events WHERE event_identifier = '$event_identifier'");
			
		} while($event_available->num_rows() == 1);
		
		$friend_found = $this->db->query("SELECT user_identifier FROM registration WHERE (full_name = '$event_details[event_friend_name]' OR username = '$event_details[event_friend_name]')");
		if ($friend_found->num_rows() == 1)
		{
			$datetime = DateTime::createFromFormat("m/d/Y @ H:i a", $event_details['event_date_name']);
			$format_datetime = $datetime->format("Y-m-d H:i:s");
			
			$friend_id = $friend_found->row()->user_identifier;
			$this->db->query("INSERT INTO events (event_identifier,
												  user_identifier,
												  title,
												  friend_identifier,
												  date,
												  location,
												  meeting_point,
												  details) VALUES ('$event_identifier',
												  				   '$event_details[uid]',
												  				   '$event_details[event_title_name]',
												  				   '$friend_id',
												  				   '$format_datetime',
												  				   '$event_details[event_location_name]',
												  				   '$event_details[event_meeting_point_name]',
												  				   '$event_details[event_description_name]')");
			
		}
		else 
		{
			return array('response' => 'event_error', 'result' => 'Sorry, your friend could not be found. Choose another.');
		}
		if ($this->db->affected_rows() == 1)
		{
			$this->input->set_cookie('_e_', $event_identifier, 0, '.localhost', '/', '');
			return array('response' => 'event_organised', 'result' => site_url('event/view'));
		}
		else
		{
			return array('response' => 'event_error', 'result' => 'Event could not be created');
		}	
	}

	public function fetch_events ()
	{
		$events = $this->db->query("SELECT * FROM events INNER JOIN registration ON events.friend_identifier = registration.user_identifier");
		if ($events->num_rows() > 0)
		{
			return 'Data available';
		}
		else 
		{
			return array('response' => 'no_events', 'result' => 'No events are available at this time');
		}
		
		
	}
}

?>