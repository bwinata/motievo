<?php

class Launch extends CI_Contoller 
{
	/* Event Handler */
	public function gauge_interest ()
	{
		$this->load->model('Launch_Interest', '', TRUE);
		$sub_array('Hello');
		$test_array = array('data' => TRUE, 'string' => $sub_array);
		echo json_encode($test_array);
	}
}

?>