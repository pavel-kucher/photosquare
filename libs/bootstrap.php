<?
class Bootstrap {
    
    private $_url = null;
    private $_controller = null;
    
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/'; 
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    private $_defaultFileModel = 'index';
    private $_defaulThremeFile = 'threme_page';
    //private $_defaultFile = THEME_PATH;

    //функция выполняется при загрузке любой страницы
    public function init()
    {   //получаяем url
        $this->_getUrl();

        //если пусто то загружаем дефолтный контроллер
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        //иначе указанный
        if ($this->_loadExistingController())        
            $this->_callControllerMethod();//вызываем метод контроллера
    }
    
    //установщик дефолтного файла для обработки
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }
    //установщик дефолтного файла для обработки
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }
    //установщик дефолтного файла для обработки
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }
    //установщик дефолтного файла для обработки
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }
    //разделяет строку на части для обработки контролером
    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    
    //загрузка дефолтного контроллера controllers/index
    private function _loadDefaultController()
    {
        require_once $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        
        $file = $this->_controllerPath . $this->_defaulThremeFile. '.php';
        //echo $file; 
        require_once $file;
        $this->_controller->loadModel($this->_defaultFileModel, $this->_modelPath);
        $this->_controller->index();
    }
    
    //если контроллер указан то загружаем его
    private function _loadExistingController()
    {
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else { /* Если страничка с темой то свой обработчик */
            $file = $this->_controllerPath . $this->_defaulThremeFile. '.php';
            //echo $file; 
            require_once $file;
            $this->_controller = new $this->_defaulThremeFile;
            //$file = $this->_modelPath.$this->_defaulThremeFile.'_model.php';
            //require $file;
            //echo $file; 
            $this->_controller->loadModel($this->_defaulThremeFile, $this->_modelPath);
            
            $bLoad  = $this->_controller->load_threme_pages($this->_url[0] ,$this->_url[1]);
            
            if(!$bLoad)
            {       
                $this->_error();
            }
            return FALSE;
        } 
        return TRUE;
    }
    
    private function _callControllerMethod()
    {
        $length = count($this->_url);
		
        if ($length > 1)
		{
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }
        
        switch ($length) {
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            
            case 4:
				//Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            
            case 3:
                
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            
            case 2:
                
                $this->_controller->{$this->_url[1]}();
                break;
            
            default:
                $this->_controller->index();
                break;
        }
    }
    
    private function _error() 
    {
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
		exit();
    }

   
}


////класс ответственне за разбивку url
//class Bootstrap 
//{
//	function __construct()
//	{
//		$url = isset($_GET['url']) ? $_GET['url'] : null;
//		$url = rtrim($url, '/');
//		$url = filter_var($url, FILTER_SANITIZE_URL);
//		$url = explode('/', $url);
//		//print_r($url);
//		
//		if ( empty($url[0]) )
//		{
//			require 'controllers/index.php';
//			$controller = new index();
//                        $controller->index();
//			return false;
//		}
//		
//		$file = 'controllers/'.$url[0].'.php';
//		if (file_exists($file))
//		{
//			require $file;
//		} else {
//			require('controllers/error.php');
//			$err =  new error;
//			return false;
//		}
//		$controller = new $url[0]; //блять как это работает охуеть дошло он создает класс одноименный к запросу пользователя, вместо url подставляется значение
//		$controller->loadModel($url[0]);
//		
//		if (isset($url[2]))
//		{
//                        if (method_exists($controller, $url[1]))
//                        {
//                            $controller->{$url[1]}($url[2]);	// типа вызов метода класса 
//                        } else {
//                            echo 'error url_1'.$url[1];
//                        }
//			
//			
//                } else {
//			if (isset($url[1]))
//			{
//                                if (method_exists($controller, $url[1]))
//                                {
//                                	//echo "inside yes".$url[1]."<br>";
//                                        $controller->{$url[1]}();	// типа вызов метода класса 
//                                } else {
//                                    echo 'error url_1 = '.$url[1];
//                                }
//                     	} else {
//                            $controller->index();
//                        }
//                        
//		}
//                
//	}
//}
	
?>