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
	
	public function friend () 
	{
		$data['page_title'] = 'Jessica Tan';
		$this->load->view('common/header', $data);
		$this->load->view('dashboard/friend_dashboard');
		$this->load->view('common/footer');		
	}
	
	public function contacts ()
	{
		$data['page_title'] = 'My Friends';
		$this->load->view('common/header', $data);
		$this->load->view('dashboard/friends_list');
		$this->load->view('common/footer');
	}
	
}

?>