<?php

class Credentials extends CI_Controller
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */
	private $expected_field_names = array('full_name',
										'username',
										'user_email',
										'password',
										're_password');
										
	private $field_id = array('full_name' => 'full_name_info',
							'username' => 'username_info',
							'user_email' => 'user_email_info',
							'password' => 'password_info',
							're_password' => 're_password_info');	

	/* ============================================================== */
	/* PUBLIC DEFINITIONS */
	/* ============================================================== */
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Details');
		$this->load->model('Form_Processor');
		$this->load->model('Register', '', TRUE);
	}
	
	public function register_user ()
	{
		$user_details = $this->Details->get_details();
		$field_array = $this->combine_field_arrays($this->expected_field_names, $this->field_id);
		
		$error_check_result = $this->Form_Processor->check_errors($user_details, $field_array);
		
		if ($error_check_result['result'])
		{
			echo json_encode($error_check_result);
		}
		else
		{
			echo json_encode($this->Register->create_user_account($user_details));
		}
	}

	public function activate ()
	{
		/* Retrieve email and activation code via URI */
		$this->Register->activate_user();
	}
	/* ============================================================== */
	/* PRIVATE FUNCTIONS */
	/* ============================================================== */
	private function combine_field_arrays ($field_names, $field_ids)
	{
		return array('names' => $field_names, 'id' => $field_ids);
	}	
}


?>