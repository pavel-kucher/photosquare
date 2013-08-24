<?php
class Login_model extends Model {

    public function __construct()
    {
		parent::__construct();
        //echo md5('admin');
    }

    public function run()
    {
                /*$sth = $this->db->query("SELECT * FROM users");
		$data = $sth->fetchAll();
		 print_r($data);*/ 
		//if (strlen($_POST['']))
        $sth = $this->db->prepare("SELECT  id, role  FROM user_information WHERE
            login = :login AND password = :password ");
        $sth->execute(array(
            'login' => $_POST['login'],
            'password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
          ));
        //$data = $sth->fetchAll();
		
		//роль пользователя
		$data = $sth->fetch();
		//print_r($data);
		//echo $data['role'];
		//die;
		$count = $sth->rowCount();
		if ($count > 0)
		{
			//login
			//echo 'prokatilo';
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', TRUE);
			Session::set('userid', $data['id']);
			header('location: '.URL.'admin');
			//session::destroy();
		} else
		{
			//echo 'figni';
			//show  an error;
			header('location: '.URL.'admin');
		}
		
        //print_r($data);
               
    }    
    
}

?>