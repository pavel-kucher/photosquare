<?php
class Dashboard_model extends Model
{
	function __construct ()	{
		parent::__construct();
	}
	
	public function xhrInsert()
	{
		//echo $_POST['text'];
		$text = $_POST['text'];
		//statment
		$this->db->insert('data', array('text' => $text));
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());		
		echo json_encode($data);
	}
	
	function xhrGetListings()
	{
		
		$data = $this->db->select('SELECT * FROM data');
		//echo $data;
		echo  json_encode($data);
		// json_encode($data);
	}
	
	function xhrDeleteListing()
	{
		$id = (int)$_POST['id'];
		$this->db->delete('data', ' id = '.$id);
	}
}
?>
