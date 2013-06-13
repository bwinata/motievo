<?php

class Settings extends CI_Controller
{
	
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */	
	private $expected_field_names = array('full_name_settings_name',
										  'username_settings_name',
										  'email_settings_name',
										  'current_pw_settings_name',
										  'new_pw_settings_name',
										  're_pw_settings_name',
										  'about_me_settings_name');
	
	private $field_ids = array('full_name_settings_name' => 'full_name_settings',
							   'username_settings_name' => 'username_settings',
							   'email_settings_name' => 'email_settings',
							   'current_pw_settings_name' => 'current_pw_settings',
							   'new_pw_settings_name' => 'new_pw_settings',
							   're_pw_settings_name' => 're_pw_settings',
							   'about_me_settings_name' => 'about_me_settings');
	
	/* ============================================================== */
	/* PUBLIC FUNCTIONS */
	/* ============================================================== */	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Details');
		$this->load->model('Settings_Content', '', TRUE);
	}
	
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
	
	/* Handlers */
	public function fetch_data ()
	{
		$details = $this->Details->get_details();
		
		switch($details['setting'])
		{
			case 'personal':
				echo json_encode($this->Settings_Content->fetch_personal($details));		
				break;
			case 'dashboard':
				echo json_encode($this->Settings_Content->fetch_dashboard($details));
				break;
			case 'privacy':
				echo json_encode($this->Settings_Content->fetch_privacy($details));
				break;
		}		
	}
	
	public function update_details ()
	{
		$this->load->model('Form_Processor');
		$details = $this->Details->get_details();
		
		$field_array = $this->combine_field_arrays($this->expected_field_names, $this->field_ids);
		
		$error_check_result = $this->Form_Processor->check_errors($details, $field_array);
		
		if ($error_check_result['result'])
		{
			echo json_encode($error_check_result);
		}
		else
		{
			//echo json_encode(array('response' => 'details_updated', 'result' => 'Fields are all not empty and are valid'));
			switch($details['setting'])
			{
				case 'personal':
					echo json_encode($this->Settings_Content->update_personal($details));
					break;
				case 'dashboard':
					echo json_encode($this->Settings_Content->update_dashboard($details));
					break;
				case 'privacy':
					echo json_encode($this->Settings_Content->update_privacy($details));
					break;
				default:
					break;
			}		
		}
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