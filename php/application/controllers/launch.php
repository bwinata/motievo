<?php

class Launch extends CI_Controller 
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */
	private $expected_field_names = array('user_email');
	private $field_id = array('user_email' => 'email');
	
	/* ============================================================== */
	/* PUBLIC FUNCTIONS */
	/* ============================================================== */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Details');
		$this->load->model('Form_Processor');
		$this->load->model('Launch_Interest', '', TRUE);
	}
	
	public function gauge_interest()
	{
		$email = $this->Details->get_details();
		$field_array = $this->combine_field_arrays($this->expected_field_names, $this->field_id);
		
		$error_check_result = $this->Form_Processor->check_errors($email, $field_array);
		
		if ($error_check_result['result'])
		{
			/* If any field error is created then send alert immediately */
			echo json_encode($error_check_result);	
		}
		else
		{
			echo json_encode(array('response' => 'registered', 'result' => 'User has been registerd'));
			//echo json_encode($this->Launch_Interest->gauge_interest());
		}
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