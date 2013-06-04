<?php

class Friends extends CI_Controller
{
	public function find ()
	{
		$data['page_title'] = 'Find Friends';
		$this->load->view('common/header', $data);
		$this->load->view('friends/find');
		$this->load->view('common/footer');
	}
}

?>