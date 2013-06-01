<?php

class Settings extends CI_Controller
{
	public function personal ()
	{
		$data['page_title'] = 'My Settings - Personal';
		$this->load->view('common/header', $data);
		$this->load->view('settings/personal');
		$this->load->view('common/footer');
	}
}

?>