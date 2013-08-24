<?php
class Session
{
	public static  function  init()
	{
		session_start();// еще есть вариант с @session_start(); - хз как работет но помогает
	}
	public static function  set($key, $value)
	{
		
		$_SESSION[$key] = $value;
	}
	
	public static function  get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function destroy()
	{
		//unset session
		session_destroy();
		
	}

}
?>