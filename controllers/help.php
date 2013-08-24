<?
class Help extends Controller
{

	function __construct()
	{
		parent::__construct();
		//echo "We in help(index.php)<br />";
       	}
        
        function index()
        {
              $this->view->render('help/index');
        }

        public function other( $arg = false )
	{
            //echo "we are inside other<br />";	
            //echo "arg -".$arg."<br />";
		require '/models/help_model.php';
		$model = new Help_model();
                $this->view->fr = $model->fr();
        }
	
}
?>