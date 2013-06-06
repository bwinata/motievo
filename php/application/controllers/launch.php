<?php

class Launch extends CI_Controller 
{
	/* Event Handler */
	public function gauge_interest ()
	{
		//$this->load->model('Launch_Interest', '', TRUE);
		$sub_array['test'] = 'Hello';
		$test_array = array('result' => TRUE, 'string' => $sub_array);
		echo json_encode($test_array);
	}
}

?>