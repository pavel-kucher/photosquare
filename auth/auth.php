<?php
/**
 * 
 */
class Auth
{	
	public static function handleLogin()
	{
		//@session_start();
		session_start();
		$logged = $_SESSION['loggedIn'];
                //echo "fefefefweffffffffffffffffffffff";
                //die;
		if ($logged == false)
                {
			session_destroy();
			header('location: '.URL.'login');
			exit;
		}
	}
}