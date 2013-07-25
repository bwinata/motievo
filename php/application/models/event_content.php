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

	/*public function fetch_events ()
	{
		$events = $this->db->query("SELECT * FROM events 
									INNER JOIN registration 
									ON events.friend_identifier = registration.user_identifier");
		if ($events->num_rows() > 0)
		{
			return 'Data available';
		}
		else 
		{
			return array('response' => 'no_events', 'result' => 'No events are available at this time');
		}
	}*/
	
	public function fetch_events ($id)
	{
		$events = $this->db->query("SELECT events.title,
										   registration.full_name,
										   events.date,
										   events.location,
										   events.status
									FROM events INNER JOIN registration 
									ON events.friend_identifier = registration.user_identifier
									WHERE events.user_identifier = '$id'");
									
		if ($events->num_rows () > 0)
		{
			return array('response' => 'events_avail', 'result' => $events->num_rows());
			
		}
		else
		{
			return array('response' => 'no_events', 'result' => 'No events are available at this time');
		}
	}

	public function check_new_event($id)
	{
		$available = $this->db->query("SELECT event_identifier FROM events WHERE (event_identifier = '$id')");
		if ($available->num_rows() == 1)
		{
			/* Clear cookie once confirmed */
			$this->input->set_cookie('_e_', ' ', 0, '.localhost', '/', '');
			return array('response' => 'event_new', 'result' => '<h2>Awesome!</h2>
      															 <p>Congratulations. You have successfully created an event.</p>');
		}
		/* else - Event is not new - Don't display message and don't return anything*/
	}
}

/*
			"<div class='container large-12 columns'>
				<div class='large-7 columns' style='margin-left: -15px;'>
					<span style='font-size: 12px;'><b>14 July 2013</b></span><br />
					<h6><a href='#' style='color: black;'>We're going bushwalking!</a></h6>
					<span class='subheader' style='margin-top: -10px; font-size: 14px;'><b>@ Lane Cove National Park</b></span><br />
					<span style='font-size: 13px;'>with </span><span class='subheader'><a href='#'><b>Jessica Tan</b></a></span><br />				
				</div>			
				<div class='large-5 columns' style='margin-top: 20px; margin-left: 15px;'>
					<input type='submit' class='tiny default button' style='font-size: 12px;' value='Send'>
					<input type='submit' class='tiny default success button' style='font-size: 12px;' value='Edit'>
					<input type='submit' class='tiny default alert button' style='font-size: 12px;' value='Delete''>
				</div>				
			</div>"
*/
?>