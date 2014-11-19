<?php

class Help extends CI_Controller
{
	public function faq ()
	{
		$data['page_title'] = 'FAQ | Help';
		$data['help_page'] = 'faq';
		$this->load->view('common/header', $data);
		$this->load->view('help/faq', $data);
		$this->load->view('common/footer');
	}
	
	public function about ()
	{
		$data['page_title'] = 'About | Help';
		$data['help_page'] = 'about';
		$this->load->view('common/header', $data);
		$this->load->view('help/about', $data);
		$this->load->view('common/footer');
	}
	
	public function privacy ()
	{
		$data['page_title'] = 'Privacy | Help';
		$data['help_page'] = 'privacy';
		$this->load->view('common/header', $data);
		$this->load->view('help/privacy', $data);
		$this->load->view('common/footer');
	}
}



?>
