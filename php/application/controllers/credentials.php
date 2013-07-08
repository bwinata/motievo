<?php

class Credentials extends CI_Controller
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */
	private $expected_field_names_reg = array('full_name',
										'username',
										'user_email',
										'password',
										're_password');
										
	private $field_id_reg = array('full_name' => 'full_name_info',
							'username' => 'username_info',
							'user_email' => 'user_email_info',
							'password' => 'password_info',
							're_password' => 're_password_info');	

	private $expected_field_names_login = array('user_email',
												'password');
	
	private $field_id_login = array('user_email' => 'email_login',
									'password' => 'password_login');
	
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
		$field_array = $this->combine_field_arrays($this->expected_field_names_reg, $this->field_id_reg);
		
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

	public function signin_user ()
	{
		$this->load->model('Login', '', TRUE);
		
		$login_details = $this->Details->get_details();
		$field_array = $this->combine_field_arrays($this->expected_field_names_login, $this->field_id_login);
		
		$error_check_result = $this->Form_Processor->check_errors($login_details, $field_array);
		
		if ($error_check_result['result'])
		{
			echo json_encode($error_check_result);
		}
		else
		{
			echo json_encode($this->Login->login_user($login_details));
		}
	}

	public function activate ()
	{
		/* Retrieve email and activation code via URI */
		$this->Register->activate_user();
	}
	
	public function logout ()
	{
		$this->input->set_cookie('_u_', '', 0, '.localhost', '/', '');
		$this->input->set_cookie('_sess_', '', 0, '.localhost', '/', '');
		header("Location:".site_url('main_bd/cover'));
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