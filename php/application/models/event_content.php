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
		
		$this->db->query("INSERT INTO events (event_identifier,
											  user_identifier,
											  title,
											  friend_identifier,
											  date,
											  time,
											  location,
											  meeting_point,
											  details) VALUES ('$event_identifier',
											  				   '$event_details[uid]',
											  				   '$event_details[event_title_name]',
											  				   '$event_details[f_uid]',
											  				   '$event_details[event_date_name]',
											  				   '$event_details[event_time_name]',
											  				   '$event_details[event_location_name]',
											  				   '$event_details[event_meeting_point_name]',
											  				   '$event_details[event_description_name]')");
		
		if ($this->db->affected_rows() == 1)
		{
			return array('response' => 'event_organised', 'result' => 'Event has been created');
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