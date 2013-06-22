<?php

class Event extends CI_Controller 
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */
	private $expected_field_names = array('event_title_name',
										  'event_friend_name',
										  'event_date_name',
										  'event_time_name',
										  'event_location_name',
										  'event_meeting_point_name',
										  'event_description_name');
	
	private $field_id = array('event_title_name' => 'event_title',
							  'event_friend_name' => 'event_friend',
							  'event_date_name' => 'event_date',
							  'event_time_name' => 'event_time',
							  'event_location_name' => 'event_location',
							  'event_meeting_point_name' => 'event_meeting_point',
							  'event_description_name' => 'event_description');
							  
	/* ============================================================== */
	/* PUBLIC FUNCTIONS */
	/* ============================================================== */	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Details');
		$this->load->model('Form_Processor');
		$this->load->model('Event_Content', '', TRUE);	
	}
	
	public function organize ()
	{
		$data['page_title'] = 'Organize a happening | Event';
		$this->load->view('common/header', $data);
		$this->load->view('event/organise');
		$this->load->view('common/footer');
	}
	
	public function view ()
	{
		$data['page_title'] = 'Invitation | Event';
		$this->load->view('common/header', $data);
		$this->load->view('event/view_event');
		$this->load->view('common/footer');		
	}
	
	public function all ()
	{
		$data['page_title'] = 'Happenings | All';
		$this->load->view('common/header', $data);
		$this->load->view('event/display_all_events');
		$this->load->view('common/footer');
	}
	
	/* Handlers */
	public function create_event ()
	{	
		$event_details = $this->Details->get_details();
		$field_array = $this->combine_field_arrays($this->expected_field_names, $this->field_id);
		
		$error_check_result = $this->Form_Processor->check_errors($event_details, $field_array);
		
		if ($error_check_result['result'])
		{
			echo json_encode($error_check_result);
		}
		else
		{
			//echo json_encode(array('response' => 'event_organised', 'result' => 'Event has been created'));
			echo json_encode($this->Event_Organise->create($event_details));
		}
	}
	
	public function fetch_content ()
	{	
		echo json_encode($this->Event_Content->fetch_events($user_details));
	}
	
	/* ============================================================== */
	/* PRIVATE FUNCTIONS */
	/* ============================================================== */
	private function combine_field_arrays ($field_names, $field_id)
	{
		return array('names' => $field_names, 'id' => $field_id);
	}	
}

?>