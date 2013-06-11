<?php

class Form_Processor extends CI_Model
{
	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */	
	private $empty_fields = array();
	private $valid_fields = array();
	
	/* ============================================================== */
	/* PUBLIC DEFINITIONS */
	/* ============================================================== */	
	public function check_errors ($details, $field_array)
	{
		if ($this->check_empty_fields($details, $field_array) == TRUE)
		{
			return array('response' => 'empty_fields', 'result' => $this->empty_fields);	
		}
		if ($this->check_valid_fields($details, $field_array) == TRUE)
		{
			return array('response' => 'invalid_fields', 'result' => $this->valid_fields);
		}
	}

	/* ============================================================== */
	/* PRIVATE DEFINITIONS */
	/* ============================================================== */	
	private function check_empty_fields ($details, $field_array)
	{
		foreach($field_array['names'] as $key)
		{
			if (array_key_exists($key, $details))
			{
				if (empty($details[$key]))
				{
					$this->empty_fields[$key] = $field_array['id'][$key];
				}
			}
			else
			{
				$this->empty_fields[$key] = $field_array['id'][$key];
			}
		}
		if (!empty($this->empty_fields))
		{
			return TRUE;
		}
	}
	
	private function check_valid_fields ($details, $field_array)
	{
		foreach($field_array['names'] as $field)
		{
			switch ($field)
			{
				case 'user_email':
					if (!filter_var($details[$field], FILTER_VALIDATE_EMAIL))
					{
						$this->valid_fields[$field] = $field_array['id'][$field];
					}					
					break;
				case 'password':
					if (!preg_match('/^[A-Za-z0-9_-]{8,20}$/', $details[$field]))
					{
						$this->valid_fields[$field] = $field_array['id'][$field];
					}
					break;
				case 'event_date_name':
					break;
				case 'event_time_name':
					break;
				default:
					if (!preg_match('/^[A-Z]/i', $details[$field]))
					{
						$this->valid_fields[$field] = $field_array['id'][$field];
					}
					break;
			}		
		}
		if (!empty($this->valid_fields))
		{
			return TRUE;
		}
	}
}

?>