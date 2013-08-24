<?
class Index extends Controller
{
        function __construct()
	{
		parent::__construct();
		//echo "We in index  (controllers/index.php)";		
	}
	        
        function index()
        {
            $this->view->title = 'Edit album';
            $this->view->js = array(
            'js/responsiveslides.js'
            ); 
            
            
            $page = $this->model->home_page();
            $this->view->page = $page[0];
            $navig = $this->model->navigation_menu();
            $this->view->navigation = $navig;
            echo '<pre>';   
            //print_r($page[0]);
            echo '</pre><br>';
            /*print_r($navig);*/
            $this->view->render('index');

        }	
        
}
?>