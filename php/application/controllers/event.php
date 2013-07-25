<?php

class Event extends CI_Controller 
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */
	private $expected_field_names = array('event_title_name',
										  'event_friend_name',
										  'event_date_name',
										  'event_location_name',
										  'event_meeting_point_name',
										  'event_description_name');
	
	private $field_id = array('event_title_name' => 'event_title',
							  'event_friend_name' => 'event_friend',
							  'event_date_name' => 'event_date',
							  'event_location_name' => 'event_location',
							  'event_meeting_point_name' => 'event_meeting_point',
							  'event_description_name' => 'event_description');
							  
	/* ============================================================== */
	/* PUBLIC FUNCTIONS */
	/* ============================================================== */	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Validation', '', TRUE);
		$this->load->model('Details');
		$this->load->model('Form_Processor');
		$this->load->model('Event_Content', '', TRUE);	
	}
	
	public function organize ()
	{
		if ($this->Validation->check_login())
		{			
			$data['page_title'] = 'Organize a happening | Event';
			$this->load->view('common/header', $data);
			$this->load->view('event/organise');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
	}
	
	public function view ()
	{
		if ($this->Validation->check_login())
		{			
			$data['page_title'] = 'Invitation | Event';
			$this->load->view('common/header', $data);
			$this->load->view('event/view_event');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
	}
	
	public function all ()
	{
		if ($this->Validation->check_login())
		{			
			$data['page_title'] = 'Happenings | All';
			$this->load->view('common/header', $data);
			$this->load->view('event/display_all_events');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
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
			echo json_encode($this->Event_Content->create($event_details));
		}
	}
	
	public function fetch_content ()
	{	
		echo json_encode($this->Event_Content->fetch_events($user_details));
	}
	
	/* Perform functions upon page load */
	public function init_event_page ()
	{
		$details = $this->Details->retrieve_get_details();
		$events_init_items['event_new'] = $this->Event_Content->check_new_event($details['e_id']);
		$events_init_items['events_all'] = $this->Event_Content->fetch_events($details['u_id']);
		
		echo json_encode($events_init_items);
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