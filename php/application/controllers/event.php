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
}

?>