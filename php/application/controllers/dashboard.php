<?php

class Dashboard extends CI_Controller
{
	public function me ()
	{
		$data['page_title'] = 'Barry Winata';
		$this->load->view('common/header', $data);
		$this->load->view('dashboard/my_dashboard');
		$this->load->view('common/footer');
	}
}

?>