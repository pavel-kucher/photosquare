<?
class View 
{
	function __construct (){}
	
	public function render($name, $IncludeAdmin = false )
	{
            if ($IncludeAdmin == true)
            {
                require 'views/'.$name.'.php';
            } else {
                require 'views/theme/'.THEME.'/header.php';
		require 'views/theme/'.THEME.'/'.$name.'.php';
                require 'views/theme/'.THEME.'/footer.php';
            }
	}
}
?>