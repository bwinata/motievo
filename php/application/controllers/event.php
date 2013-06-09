<?php

class Event extends CI_Controller 
{	
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
	
	/* Handlers */
	public function create_event ()
	{
		$this->load->model('Details');
		$this->load->model('Form Processor');
		$this->load->model('Event_Organise', '', TRUE);
		
		$event_details = $this->Details->get_details();
		
		$this->Form_Processor->check_errors($event_details);
		
		$this->Event_Organise->create($event_details);
		
	}
}

?>