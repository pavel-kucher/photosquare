<?php

class Login extends Controller
{

	function __construct()
	{
            parent::__construct();
            //echo "We in index  (controllers/login.php)";
	}
        
        function index()
        {
           // require 'models/login_model.php';
            //$model = new Login_model();
			//echo Hash::create('md5', 'admin', HASH_PASSWORD_KEY);
            $this->view->render('login/index',TRUE);
        }		
	
        function run()
        {
            $this->model->run();
        }
        
        function forgot()
        {
           // require 'models/login_model.php';
            //$model = new Login_model();
			//echo Hash::create('md5', 'admin', HASH_PASSWORD_KEY);
            $this->view->render('login/forgot',TRUE);
        }        
        
}

?>