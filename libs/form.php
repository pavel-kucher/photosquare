<?php

require 'form/Val.php';



class Form
{
	/*	пост данные	*/
	private $_postDate = array();
	/*	валидатор	*/
	private $_val =  null;
	/*	текущий введенный элемент	*/	
	private $_currentItem = null;
	/*	обработка ошибок	*/	
	private $_error = array();
			
	/**********************************************/
	function __construct()
	{
		$this->_val = new Val();
	}
	
	public function post($field)
	{
		$this->_postDate[$field] = $_POST[$field];
		$this->_currentItem = $field;
		return $this;
	}
	
	/**********************************************/
	public function fetch($fieldName = false)
	{
		if ($fieldName)
		{
			if (isset($this->_postDate[$fieldName]))
			{
				return $this->_postDate[$fieldName];
			} else {
				return FALSE;
			}
			
		} else {
			return $this->_postDate;
		}
	}
	
	/**********************************************/
	/**	служит для валидации данных форм путем подстановки типа валидации к последнему считаному аргументу
	 *	проверка осуществляется черезвложенный обьект val 
	 */
	 
	public function val($typeOfValids, $arg = NULL)
	{
		if ($arg == NULL)
		{
			$error = $this->_val->{$typeOfValids}($this->_postDate[$this->_currentItem]);
		} else {
			$error = $this->_val->{$typeOfValids}($this->_postDate[$this->_currentItem], $arg);
		}
		
		//echo $error.'brgrgrgrg';
		if($error)
		{
			$this->_error[$this->_currentItem] = $error;
		}
		return $this;
	}
	/**********************************************/
	public function submit()
	{
		if (empty($this->_error))
		{
			return TRUE;
		} else {
			$str = '';
			foreach ($this->_error as $key => $value)
			{
				$str .= $key.' => '.$value."\n";
			}
			echo 'ERROR '.$str.'  ';
			//throw new Exception($str);
		}
	}
	
	
	
	
	
}

?>