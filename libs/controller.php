<?
class Controller 
{
    function __construct()
    {
		$this->view = new View();
    }
    
    public function  loadModel($name, $modelPath = 'models/')
    {
        $path = $modelPath.$name.'_model.php';  
        if(file_exists($path))
        {
             require 'models/'.$name.'_model.php';  
             $modelName = $name.'_model';
             $this->model = new $modelName();
        }    
    }
                 
                 
                
                 
}
?>