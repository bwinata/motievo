<?php

class Main_bd extends CI_Controller
{
	public function cover () 
	{
		$this->load->model('Validation', '', TRUE);
		if ($this->Validation->check_login())
		{
			header("Location:".site_url('dashboard/me'));		
		}	
		else 
		{
			$this->load->view('cover_page_bd');
			$this->load->view('common/footer');				
		}
	}
}
