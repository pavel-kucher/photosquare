<?
class threme_page extends Controller
{
        function __construct()
	{
		parent::__construct();		
	}
	      
        /* загрузчик темы */
        function load_threme_pages($_url_1)
        {            
            
            $page = $this->model->pages_load($_url_1);
            $this->view->page = $page[0];
            $navig = $this->model->navigation_menu();
            $this->view->navigation = $navig;
            if ( count($page) == 0 )
                return FALSE;                //   echo '  '.$_url_1.'<br/>'; print_r($page);
           //  $this->view->render('album');
            
            $this->view->title = 'Edit album';
            $this->view->js = array('js/responsiveslides.js'); 
            echo '<pre>';    
            /*print_r($page[0]);*/
            echo '</pre><br>';
            /*print_r($navig);*/
            
            
            switch ($page[0]['type_state'])
            {     
                case 'album':   //альбом
                    $this->view->render('album');
                    return TRUE;
                case 'page':    //страница
                    $this->view->render('page');
                    return TRUE;
                case 'category':    //категория
                    $this->view->render('category');
                    return TRUE;
                default:
                    return TRUE;
            }
            
            return TRUE;
        }
}        
?>