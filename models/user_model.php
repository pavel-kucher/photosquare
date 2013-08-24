<?php
class User_Model extends Model
{
	//*********************************************//
    public function __construct()
    {
		parent::__construct();
    }
	//*********************************************//
    public function userList()
    {
		return $stm = $this->db->select('SELECT * FROM users');
    }
	//*********************************************//
    public function userSingleList($id)
    {
		return $this->db->select('SELECT id, login, `role` FROM users WHERE id = :id', array('id' => $id));
    }
	//*********************************************//
    public function create($data)
    {
		$this->db->insert('users', array(
				'login' => $data['login'],
				'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
				'role' => $data['role']
				)
			);
    }  
	//*********************************************//
    public function select($sql, $array)
    {
		$this->db->select($sql, array(
				'login' => $array['login'],
				'password' => Hash::create('md5', $array['password'], HASH_PASSWORD_KEY),
				'role' => $array['role']
				)
			);
    }  
	//*********************************************//
    public function editSave($data)
    {
		$dataArr = array(
			'login' => $data['login'],
			'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		
		$this->db->update('users',$dataArr,
					'`id`='.$data['id'] 
			);
    }    
	//*********************************************//
    public function delete($id)
	{
		//не удалять владельцев
		$data = $this->db->select("SELECT `role` FROM users WHERE id = :id", array('id' => $id));
		if ($data[0]['role'] == 'owner')
		{			
			return FALSE;
		}
		$this->db->delete('users', ' id= '.$id);
	}
}
?>