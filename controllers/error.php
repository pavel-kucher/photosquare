<?
class error extends Controller 
{
    function __construct()
    {
            parent::__construct();
            //echo "Error";
            //$this->view->msg = 'This page doesnt exist';
    }
	        
    function index()
    {
        //$this->view->msg = 'This page doesnt exist';
        $this->view->render('error');
    }        
}
?>