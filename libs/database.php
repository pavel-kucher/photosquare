<?php
class Database  extends PDO //php object for connect and using mysql database
{
    public function __construct ($DB_TYPE, $DB_NAME, $DB_HOST, $DB_USER, $DB_PASS)
    {
		///try
		//{
                //parent::__construct('mysql:dbname=mvs;host=127.0.0.1', 'root', '');
				parent::__construct($DB_TYPE.':dbname='.$DB_NAME.';host='.$DB_HOST, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
				
				//parent::setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
				
		//} catch (PDOException $e) 
		//{
		//	echo 'Подключение не удалось: ' . $e->getMessage();
		//}		
			
    }
	
    //*********************************************//
    public function insert($table, $data)
	{
		ksort($data);
		$fieldNames = implode('`,`', array_keys($data));
		$fieldValues = ':'.implode(', :', array_keys($data));
		//echo "INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)"."<br />";
                $query = "INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues) ";
		$stm = $this->prepare($query);
		//$stm->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		foreach ($data as $key => &$value)
		{
			//echo "   :".$key." - ".$value."<br />";
			$stm->bindParam(":".$key, $value);
		}
		if (!$stm->execute())
		{
			echo 'error insert in database';
		}
		//print_r($stm->errorInfo());
	}
	
	//*********************************************//
	
	public function update($table, $data, $where)
	{
		ksort($data);
		$fieldDetails = NULL;
		foreach ($data as $key => $value)
		{
                    $fieldDetails = $fieldDetails.'`'.$key.'`=:'.$key.',';
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		//print_r($fieldDetails);
		//print_r($where);
		$query = "UPDATE $table SET $fieldDetails WHERE $where";
		$stm = $this->prepare($query);
		//$stm->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		//echo "<br />";
		foreach ($data as $key => &$value)
		{
			//echo "   :".$key." - ".$value."<br />";
			$stm->bindParam(":".$key, $value);
		}
		
		if (!$stm->execute())
		{
			echo 'error insert in database';
			print_r($stm->errorInfo());
		}
	}
    
	
	//*********************************************//
    public function select($query, $dataArray = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
		/*mysql_query("SET CHARACTER SET 'utf-8'");
		mysql_query("SET NAMES 'utf-8");*/
		
		$sth = $this->prepare($query);
		foreach ($dataArray as $key => &$value)
		{
			//echo "   :".$key." - ".$value."<br />";
			$sth->bindParam(":".$key, $value);
		}
		if (!$sth->execute())
		{
			echo 'error select in database';
			print_r($sth->errorInfo());
		}
		return $sth->fetchAll($fetchMode);
    }   
		
    //*********************************************//
    public function delete($query, $where = array(), $limit = 1)
    {
		return $this->exec('DELETE FROM '.$query.' WHERE '.$where.' LIMIT '.$limit);
    }  
	
    //*********************************************//
    public function delete_unlim($query, $where = array())
    {
		return $this->exec('DELETE FROM '.$query.' WHERE '.$where);
    }  
}

/*
 * короткий вариант вставки множества сток через 1 запрос потестировать
 * 	$values = array();
      for ($i = 0; $i < count($this->steps); $i++)
         $values[] = '(:goal_id'.$i.', :name'.$i.', :descr'.$i.')';
      $command = $db->createCommand("   INSERT INTO `goal_steps` (
                                 `goal_id`,
                                 `name`,
                                 `descr`
                              ) VALUES ".implode(', ', $values));
      for ($i = 0; $i < count($this->steps); $i++) {
         $command->bindParam(':goal_id'.$i, $goal_id, PDO::PARAM_INT);
         $command->bindParam(':name'.$i, $this->steps[$i], PDO::PARAM_STR);
         $command->bindParam(':descr'.$i, $this->steps_descr[$i], PDO::PARAM_STR);
      }
      $command->execute();
	  
 * 
 * 
 */
?>
