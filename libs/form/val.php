<?php
class Val
{

	function __construct()
	{
		
	}
	public function minLenght($data, $arg)
	{
		if (strlen($data) < $arg)
		{
			return 'Минимальная длинна строки должна быть '.$arg;
		}
		return FALSE;
	}
	public function maxLenght($data, $arg)
	{
		if (strlen($data) > $arg)
		{
			return 'максимальная длинна строки должна быть '.$arg;
		}
		return FALSE;
	}
	public function _digit($data)
	{
		if (!ctype_digit($data))
		{
			return 'ваша строка должна быть из цифр';
		}
		return FALSE;
	}
}
?>