<?php

class contacts_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function info_contacts()
	{
		return $this->db->select('SELECT name_admin, famaly_admin, telephone, email  FROM site_info');
	}
	
}

?>