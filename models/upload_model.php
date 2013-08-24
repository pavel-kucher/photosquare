<?php

class upload_model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function image_size_site() {
		$properties = $this->db->select('SELECT max_height_img, max_width_img, max_height_prev, max_width_prev, max_width_med, max_height_med FROM settings_site');
		return $properties[0];
	}

	public function image_save_to_bd($_id_album, $_images_names) {
		$properties = $this->db->select('SELECT max_height_img, max_width_img, max_height_prev, max_width_prev, max_width_med, max_height_med FROM settings_site');
		return $properties[0];
	}

}

?>