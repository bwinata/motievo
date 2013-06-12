<?php

class Main_bd extends CI_Controller
{
	public function cover () 
	{
		$this->load->view('cover_page_bd');
		$this->load->view('common/footer');
	}
	
	public function test_dir ()
	{
		mkdir('images/u/winata', 0644, TRUE);
		echo 'Making directory';
	}
}
