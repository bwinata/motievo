<?php

class Details extends CI_Model
{
	public function get_details()
	{
		return array_map('trim', $_POST);
	}
	public function retrieve_get_details ()
	{
		return array_map('trim', $_GET);
	}
}


?>