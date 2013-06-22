<?php

class Friends extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Search', '', TRUE);
		$this->load->model('Details');
	}
	
	public function find ()
	{
		if (isset($_GET['search']) && (strlen($_GET['search']) > 0))
		{		
			$data['page_title'] = 'Find Friends';
			$data['friend_name'] = $_GET['search'];
			$this->load->view('common/header', $data);
			$this->load->view('friends/find', $data);
			$this->load->view('common/footer');
		}
		else 
		{
			header("Location:".site_url('dashboard/me'));
		}			
	}
	
	public function requests ()
	{
		$data['page_title'] = 'My Requests | Dashboard';
		$this->load->view('common/header', $data);
		$this->load->view('friends/my_requests');
		$this->load->view('common/footer');
	}

	/* Handlers */
	public function search_friends ()
	{	
		$friendship = $this->Details->get_details();
		
		echo json_encode($this->Search->find_friend($friendship));
	}
	
	public function make_friends ()
	{
		$details = $this->Details->get_details();
		
		echo json_encode($this->Search->send_friend_request($details));
	}
	
	public function connect ()
	{
		$details = $this->Details->get_details();
		
		echo json_encode($this->Search->connect_to_friend($details));		
	}
	
	public function get_requests ()
	{
		$id = $this->Details->get_details();
		
		echo json_encode($this->Search->fetch_requests($id));
	}
	
	public function fetch_friends_list ()
	{
		$id = $this->Details->get_details();
		
		echo json_encode($this->Search->fetch_current_friends($id));
	}
}

?>