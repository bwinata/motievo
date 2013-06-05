<?php

class Settings extends CI_Controller
{
	public function personal ()
	{
		$data['page_title'] = 'My Settings - Personal';
		$data['settings_page'] = 'personal';
		$this->load->view('common/header', $data);
		$this->load->view('settings/personal');
		$this->load->view('common/footer');
	}

	public function dashboard ()
	{
		$data['page_title'] = 'My Settings - Personal';
		$data['settings_page'] = 'dashboard';		
		$this->load->view('common/header', $data);
		$this->load->view('settings/dashboard');
		$this->load->view('common/footer');
	}
	
	public function privacy ()
	{
		$data['page_title'] = 'My Settings - Personal';
		$data['settings_page'] = 'privacy';		
		$this->load->view('common/header', $data);
		$this->load->view('settings/privacy');
		$this->load->view('common/footer');
	}
}

?>