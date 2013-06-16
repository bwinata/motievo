<?php

class Dashboard extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Details');
		$this->load->model('Dashboard_Content', '', TRUE);
	}
	
	public function me ()
	{
		$data['page_title'] = 'Barry Winata | Dashboard';
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
		$data['page_title'] = 'My Friends | Dashboard';
		$this->load->view('common/header', $data);
		$this->load->view('dashboard/friends_list');
		$this->load->view('common/footer');
	}
		
	/* Handlers */
	public function get_user_info ()
	{
		$user_details = $this->Details->get_details();
		echo json_encode($this->Dashboard_Content->fetch_content($user_details));
	}
	
}

?>