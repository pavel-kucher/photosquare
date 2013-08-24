<?php
class test_model extends Model
{
	function __construct ()	{
		parent::__construct();
	}
	
	public function xhrHorse()
	{
		$d = "лошадь";
                header("Content-Type: text/html; charset=utf-8");
                echo  json_encode($d);
                exit();
	}

        
        public function xhrLion()
	{
		
                $d = "лева";
                header("Content-Type: text/html; charset=utf-8");
                echo  json_encode($d);
                exit();
	}
        
        public function xhrBadger()
	{
		$d = "хомяк";
                header("Content-Type: text/html; charset=utf-8");
                echo  json_encode($d);
                exit();
	}
}
?>
