<?php

class Dashboard extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('Validation', '', TRUE);
		$this->load->model('Details');
		$this->load->model('Dashboard_Content', '', TRUE);
	}
	
	public function me ()
	{
		if ($this->Validation->check_login())
		{
			$data['page_title'] = 'Barry Winata | Dashboard';
			$this->load->view('common/header', $data);
			$this->load->view('dashboard/my_dashboard');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}
	}
	
	public function friend () 
	{
		if ($this->Validation->check_login())
		{		
			$data['page_title'] = 'Jessica Tan';
			$this->load->view('common/header', $data);
			$this->load->view('dashboard/friend_dashboard');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
	}
	
	public function contacts ()
	{
		if ($this->Validation->check_login())
		{		
			$data['page_title'] = 'My Friends | Dashboard';
			$this->load->view('common/header', $data);
			$this->load->view('dashboard/friends_list');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
	}
	
	public function conversations ()
	{
		if ($this->Validation->check_login())
		{
			$data['page_title'] = 'Barry Winata | Conversations';
			$this->load->view('common/header', $data);
			$this->load->view('friends/conversations');
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('main_bd/cover'));	
		}		
	}
		
	/* Handlers */
	public function get_user_info ()
	{
		$user_details = $this->Details->retrieve_get_details();
		echo json_encode($this->Dashboard_Content->fetch_content($user_details));
	}
	
	public function fetch_conversation ()
	{
		$this->load->model('Conversations', '', TRUE);
		$message_details = $this->Details->retrieve_get_details();
		echo json_encode($this->Conversations->fetch_content($message_details));
	}
	
	public function post_conversation ()
	{
		$this->load->model('Conversations', '', TRUE);
		$message_details = $this->Details->get_details();
		echo json_encode($this->Conversations->post_content($message_details));
	}
	
	public function fetch_convo_messages ()
	{
		$this->load->model('Conversations', '', TRUE);
		$message_details = $this->Details->retrieve_get_details();
		echo json_encode($this->Conversations->fetch_messages($message_details));		
	}
}
?>