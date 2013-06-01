<?php

class Main_bd extends CI_Controller
{
	public function cover () 
	{
		$this->load->view('common/header');
		$this->load->view('cover_page_bd');
		$this->load->view('common/footer');
	}	
}
