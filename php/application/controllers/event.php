<?php

class Event extends CI_Controller 
{
	public function organize ()
	{
		$data['page_title'] = 'Organize a happening';
		$this->load->view('common/header', $data);
		$this->load->view('event/organise');
		$this->load->view('common/footer');
	}
}

?>