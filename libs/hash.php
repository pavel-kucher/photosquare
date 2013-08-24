<?

class Hash
{
	/*
	 * param string $algo	// алгоритм шифровки мд5
	 * param string $data	//данные для шифровки
	 * param string $salt  //соль доп значение для формирования соли
	 * return string  
	 */
	function __construct(){}
	
	/******************************************/
	//захешированный пароль
	public static function create($algo, $data, $salt)
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		
		return hash_final($context);
	}
	
}


?>
