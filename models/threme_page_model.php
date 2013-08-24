<?php
class threme_page_model extends Model
{
	function __construct ()
        {
		parent::__construct();
	}
        
        /*     * ******************************************* */
        public function pages_load($_name_page)
        {
            return $this->db->select('SELECT * FROM paper 
                WHERE translit_name = :name_translite', array('name_translite' => $_name_page));
        }
        
        public function navigation_menu()
        {
            return $this->db->select('SELECT * FROM paper 
                WHERE publish = :publish ORDER BY st_num', array('publish' => '1'));
        }
       // ORDER BY 
 
}
?>